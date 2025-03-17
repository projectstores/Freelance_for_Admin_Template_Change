<?php

namespace App\Jobs\Main\Project;

use App\Models\Project;
use App\Models\ProjectVisit;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class Track implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $data;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            
            // Get user data
            $data             = $this->data;

            // First let's check if user already visited this project before
            // So we only increment impression
            $isAlreadyVisited = ProjectVisit::where('project_id', $data['project_id'])
                                                ->where('ip_address', $data['ip'])
                                                ->where('user_agent', $data['ua'])
                                                ->first();

            // Check if already visited
            if ($isAlreadyVisited) {
                
                // Update impressions and last visit
                $isAlreadyVisited->increment('impressions');
                $isAlreadyVisited->last_visit = now();
                $isAlreadyVisited->save();

                // Increment gig impressions
                Project::where('id', $data['project_id'])->increment('counter_impressions');

                // Return 
                return;

            }

            // Get user ip address
            $ip_address        = $data['ip'];

            // Get user agent
            $user_agent        = $data['ua'];

            // Save visit
            $visit             = new ProjectVisit();
            $visit->uid        = uid();
            $visit->project_id = $data['project_id'];
            $visit->ip_address = $ip_address;
            $visit->user_agent = $user_agent;
            $visit->save();

            // Increment visits
            Project::where('id', $data['project_id'])->update([
                'counter_impressions' => DB::raw( 'counter_impressions + 1' ),
                'counter_views'       => DB::raw( 'counter_views + 1' )
            ]);

        } catch (\Throwable $th) {

            // Log error
            \Log::debug($th);

            // Return
            return;

        }
    }
}
