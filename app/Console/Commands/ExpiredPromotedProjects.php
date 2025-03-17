<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Console\Command;

class ExpiredPromotedProjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:projects';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checking expired promoted projects.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        try {
            
            // Get promoted projects
            $promoted_projects = Project::where(function($query) {
                                            return $query->whereNotNull('expiry_date_featured')
                                                        ->orWhereNotNull('expiry_date_urgent')
                                                        ->orWhereNotNull('expiry_date_highlight');
                                        })
                                        ->whereIn('status', ['active', 'completed', 'under_development', 'pending_final_review', 'incomplete', 'closed'])
                                        ->get();

            // Set current date
            $current_date     = now();

            // Loop through projects
            foreach ($promoted_projects as $project) {

                // Get expiry date for featured plan
                $expiry_date_featured  = $project->expiry_date_featured;

                // Get expiry date for urgent plan
                $expiry_date_urgent    = $project->expiry_date_urgent;

                // Get expiry date for highlighted plan
                $expiry_date_highlight = $project->expiry_date_highlight;

                // Check if featured plan expired
                if ($expiry_date_featured && Carbon::parse($expiry_date_featured)->lessThanOrEqualTo(Carbon::now())) {
                    
                    // Update project
                    $project->is_featured = false;
                    $project->save();

                }

                // Check if urgent plan expired
                if ($expiry_date_urgent && Carbon::parse($expiry_date_urgent)->lessThanOrEqualTo(Carbon::now())) {
                    
                    // Update project
                    $project->is_urgent = false;
                    $project->save();

                }

                // Check if highlighted plan expired
                if ($expiry_date_highlight && Carbon::parse($expiry_date_highlight)->lessThanOrEqualTo(Carbon::now())) {
                    
                    // Update project
                    $project->is_highlighted = false;
                    $project->save();

                }

            }

        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
