<?php

namespace App\Http\Livewire\Admin\Users\Trash;

use DB;
use File;
use App\Models\Gig;
use App\Models\User;
use App\Models\Order;
use App\Models\Project;
use Livewire\Component;
use App\Models\Favorite;
use App\Models\OrderItem;
use WireUi\Traits\Actions;
use App\Models\ReportedGig;
use App\Models\Conversation;
use App\Models\Notification;
use App\Models\ReportedUser;
use App\Models\UserPortfolio;
use App\Models\DepositWebhook;
use App\Models\ProjectMilestone;
use App\Models\DepositTransaction;
use App\Models\ProjectReportedBid;
use App\Models\ProjectSubscription;
use App\Models\ProjectRequiredSkill;
use App\Models\UserWithdrawalHistory;
use App\Models\UserWithdrawalSettings;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Schema;

class TrashComponent extends Component
{
    use SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_trashed_users'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.users.trash.trash', [
            'users' => $this->users
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get Users
     *
     * @return object
     */
    public function getUsersProperty()
    {
        return User::onlyTrashed()->paginate(40);
    }
    

    /**
     * Confirm restoration
     *
     * @param int $id
     * @return void
     */
    public function confirmRestore($id)
    {
        // Get user
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();

        // Confirm restore
        $this->dialog()->confirm([
            'title'       => __('messages.t_confirm_restore'),
            'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_restore_this_user') . "<br>". $user->username . "</div>",
            'icon'        => 'error',
            'accept'      => [
                'label'  => __('messages.t_restore'),
                'method' => 'restore',
                'params' => $user->id,
            ],
            'reject' => [
                'label'  => __('messages.t_cancel')
            ],
        ]);
    }


    /**
     * Restore user
     *
     * @param int $id
     * @return void
     */
    public function restore($id)
    {
        // Get user
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();

        // Restore user
        $user->restore();

        // Success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_toast_operation_success'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Confirm delete
     *
     * @param int $id
     * @return void
     */
    public function confirmDelete($id)
    {
        // Get user
        $user = User::onlyTrashed()->where('id', $id)->firstOrFail();

        // Confirm delete
        $this->dialog()->confirm([
            'title'       => __('messages.t_confirm_delete'),
            'description' => "<div class='leading-relaxed'>" . __('messages.t_are_u_sure_u_want_to_prmtly_delete_usr') . "<br>". $user->username ."<br>" . __('messages.t_all_records_related_to_user_will_erased') . "</div>",
            'icon'        => 'error',
            'accept'      => [
                'label'  => __('messages.t_delete'),
                'method' => 'delete',
                'params' => $user->id,
            ],
            'reject' => [
                'label'  => __('messages.t_cancel')
            ],
        ]);
    }


    /**
     * Permanently delete this user
     *
     * @param int $id
     * @return void
     */
    public function delete($id)
    {
        try {
            
            // Get user
            $user = User::onlyTrashed()->where('id', $id)->firstOrFail();
            
            // Disable foreign key check
            Schema::disableForeignKeyConstraints();

            // Get conversations from this user
            $conversations = Conversation::where('from_id', $user->id)->orWhere('to_id', $user->id)->get();

            // Loop through conversations
            foreach ($conversations as $conversation) {
                
                // Delete messages inside this conversation
                $conversation->messages()->delete();

                // Delete conversation
                $conversation->delete();

            }

            // Delete deposit transactions made by this user
            DepositTransaction::whereUserId($user->id)->delete();

            // Delete deposit webhook responses
            DepositWebhook::whereUserId($user->id)->delete();

            // Delete favorite gigs
            Favorite::whereUserId($user->id)->delete();

            // Get order made by this user (In case his a buyer)
            $orders = Order::whereBuyerId($user->id)->get();

            // loop through orders (In case his a buyer)
            foreach ($orders as $order) {
                
                // Delete order invoice
                $order->invoice()->delete();

                // Get items inside this order
                $order_items = $order->items;

                // Loop through items inside this order
                foreach ($order_items as $item) {
                    
                    // Check item status
                    if (in_array($item->status, ['pending', 'proceeded']) && !$item->is_finished) {
                        
                        // Update order in queue
                        if ($item->gig->total_orders_in_queue() > 0) {
                            $item->gig()->decrement('orders_in_queue');
                        }

                    }

                    // Delete requirements
                    $item->requirements()->delete();

                    // Delete upgrades
                    $item->upgrades()->delete();

                    // Delete delivered work
                    $item->delivered_work()->delete();

                    // Delete conversation in this delivered work
                    $item->conversation()->delete();

                    // Get refund for this item is exists
                    $refund = $item->refund;

                    // Check if refund exists
                    if ($refund) {
                        
                        // Delete refund conversation
                        $refund->conversation()->delete();
    
                        // Delete refund
                        $refund->delete();

                    }

                }

                // Delete this order
                $order->delete();

            }

            // Get gigs created by this user
            $gigs = Gig::withTrashed()->whereUserId($user->id)->get();

            // Loop through gigs
            foreach ($gigs as $gig) {
                
                // Delete gig faqs
                $gig->faqs()->delete();

                // Get gig pdf documents
                $documents = $gig->documents;

                // Loop through documents
                foreach ($documents as $doc) {
                    
                    // Delete this file from local storage first
                    if (File::exists(public_path('storage/gigs/documents/' . $doc->name))) {
                        
                        // File exists, delete it
                        File::delete(public_path('storage/gigs/documents/' . $doc->name));

                    }

                    // Now delete it from database
                    $doc->delete();

                }

                // Get gig images
                $images = $gig->images;

                // loop through images
                foreach ($images as $img) {
                    
                    // Delete large image
                    deleteModelFile($img->large);

                    // Delete medium image
                    deleteModelFile($img->medium);

                    // Delete small image
                    deleteModelFile($img->small);

                    // Delete this record from database
                    $img->delete();

                }

                // Delete thumbnail
                deleteModelFile($gig->thumbnail);

                // Delete gig medium thumbnail
                deleteModelFile($gig->imageMedium);

                // Delete gig large thumbnail
                deleteModelFile($gig->imageLarge);

                // Delete gig seo
                $gig->seo()->delete();

                // Delete upgrades
                $gig->upgrades()->delete();

                // Delete visits for this gig
                $gig->visits()->delete();

                // Get gig requirements
                $requirements = $gig->requirements;

                // loop through requirements
                foreach ($requirements as $req) {
                    
                    // Delete options
                    $req->options()->delete();

                    // Delete requirement
                    $req->delete();

                }

                // Delete reviews
                $gig->reviews()->delete();

                // If this gig is reported delete this report
                ReportedGig::whereGigId($gig->id)->delete();

                // Get order items that belongs to this gig
                $order_items = OrderItem::whereGigId($gig->id)->get();

                // Loop through items
                foreach ($order_items as $item) {
                    
                    // Delete requirements
                    $item->requirements()->delete();

                    // Delete upgrades
                    $item->upgrades()->delete();

                    // Delete delivered work
                    $item->delivered_work()->delete();

                    // Delete conversation in this delivered work
                    $item->conversation()->delete();

                    // Get refund for this item is exists
                    $refund = $item->refund;

                    // Check if there is a refund
                    if ($refund) {
                        
                        // Delete refund conversation
                        $refund->conversation()->delete();

                        // Delete refund
                        $refund->delete();

                    }


                }

                // Now force deleting this gig
                $gig->forceDelete();

            }

            // Delete notifications for this user
            Notification::whereUserId($user->id)->delete();

            // Get projects created by this user
            $projects = Project::whereUserId($user->id)->get();

            // Loop through projects
            foreach ($projects as $project) {
                
                // Delete required skills
                ProjectRequiredSkill::whereProjectId($project->id)->delete();

                // Delete milestones
                ProjectMilestone::whereProjectId($project->id)->delete();

                // Delete project subscription
                ProjectSubscription::whereProjectId($project->id)->delete();

                // Get bids for this project
                $bids = $project->bids;

                // loop through bids
                foreach ($bids as $bid) {
                    
                    // If bid reported delete it
                    ProjectReportedBid::whereBidId($bid->id)->delete();

                    // Delete upgrades for this bid
                    $bid->upgrades()->delete();

                    // Delete this bid
                    $bid->delete();

                }

                // Delete project now
                $project->delete();

            }

            // If this user already reported, delete that report
            ReportedUser::whereReportedId($user->id)->delete();

            // Delete sessions by this user
            DB::table('sessions')->whereUserId($user->id)->delete();

            // Delete user availability
            $user->availability()->delete();

            // Delete user billing info
            $user->billing()->delete();

            // Delete user languages
            $user->languages()->delete();

            // Delete user linked accounts
            $user->accounts()->delete();

            // Get user portfolio
            $portfolio = UserPortfolio::whereUserId($user->id)->get();

            // Lopp through his works 
            foreach ($portfolio as $p) {
                
                // Get gallery
                $gallery = $p->gallery;

                // Loop through gallery
                foreach ($gallery as $g) {
                    
                    // Delete image
                    deleteModelFile($g->image);

                    // Delete this record
                    $g->delete();

                }

                // Delete thumbnail
                deleteModelFile($p->thumbnail);

                // Delete work
                $p->delete();

            }

            // Delete user skills
            $user->skills()->delete();

            // Delete withdrawal history
            UserWithdrawalHistory::whereUserId($user->id)->delete();

            // Delete user withdrawal settings
            UserWithdrawalSettings::whereUserId($user->id)->delete();

            // Delete user verification
            $user->verification()->delete();

            // Delete user avatar
            deleteModelFile($user->avatar);

            // Finally force delete for this user
            $user->forceDelete();

            // Enable foreign key check
            Schema::enableForeignKeyConstraints();

            // Success
            $this->notification([
                'title'       => __('messages.t_success'),
                'description' => __('messages.t_toast_operation_success'),
                'icon'        => 'success'
            ]);

        } catch (\Throwable $th) {
            throw $th;
            // Error
            $this->notification([
                'title'       => __('messages.t_error'),
                'description' => $th->getMessage(),
                'icon'        => 'error'
            ]);

        }
    }

}