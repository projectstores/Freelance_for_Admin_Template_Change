<?php

namespace App\Http\Livewire\Admin\Withdrawals;

use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithPagination;
use App\Models\UserWithdrawalHistory;
use App\Notifications\User\Everyone\PaymentApproved;
use App\Notifications\User\Everyone\PaymentRejected;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;

class WithdrawalsComponent extends Component
{
    use WithPagination, SEOToolsTrait, Actions;

    /**
     * Render component
     *
     * @return Illuminate\View\View
     */
    public function render()
    {
        // Seo
        $this->seo()->setTitle( setSeoTitle(__('messages.t_withdrawals_history'), true) );
        $this->seo()->setDescription( settings('seo')->description );

        return view('livewire.admin.withdrawals.withdrawals', [
            'withdrawals' => $this->withdrawals
        ])->extends('livewire.admin.layout.app')->section('content');
    }


    /**
     * Get list of withdrawals
     *
     * @return object
     */
    public function getWithdrawalsProperty()
    {
        return UserWithdrawalHistory::latest()->paginate(42);
    }


    /**
     * Approve payment
     *
     * @param integer $id
     * @return void
     */
    public function approve($id)
    {
        // Get payment
        $payment = UserWithdrawalHistory::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Send notification to user
        $payment->user->notify( (new PaymentApproved($payment))->locale(config('app.locale')) );

        // Mark it as approved
        $payment->status = 'paid';
        $payment->save();

        // Send notification
        notification([
            'text'    => 't_withdrawal_amount_paid',
            'action'  => url('seller/withdrawals'),
            'user_id' => $payment->user_id
        ]);

        // success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_payment_approved_successfully'),
            'icon'        => 'success'
        ]);
    }


    /**
     * Reject payment
     *
     * @param integer $id
     * @return void
     */
    public function reject($id)
    {
        // Get payment
        $payment = UserWithdrawalHistory::where('id', $id)->where('status', 'pending')->firstOrFail();

        // Send notification to user
        $payment->user->notify( (new PaymentRejected($payment))->locale(config('app.locale')) );

        // Mark it as rejectd
        $payment->status = 'rejected';
        $payment->save();

        // Set amount
        $amount          = convertToNumber($payment->amount) + convertToNumber($payment->fee);

        // Give user his money back on his account
        $payment->user->balance_withdrawn = convertToNumber($payment->user->balance_withdrawn) - convertToNumber($amount);
        $payment->user->balance_available = convertToNumber($payment->user->balance_available) + convertToNumber($amount);
        $payment->user->save();

        // Send notification
        notification([
            'text'    => 't_withdrawal_amount_rejected',
            'action'  => url('seller/withdrawals'),
            'user_id' => $payment->user_id
        ]);

        // success
        $this->notification([
            'title'       => __('messages.t_success'),
            'description' => __('messages.t_payment_rejectd_successfully'),
            'icon'        => 'success'
        ]);
    }

}
