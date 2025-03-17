<?php

namespace App\Http\Livewire\Main\Cards;

use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\Project as ModelsProject;

class Project extends Component
{
    use Actions;
    
    public $title;
    public $highlighted;
    public $isFeatured;
    public $pid;
    public $slug;
    public $description;
    public $status;
    public $total_bids;
    public $budget_type;
    public $created_at;
    public $budget_min;
    public $budget_max;
    public $urgent;
    public $category = [];
    public $skills   = [];

    /**
     * Init component
     *
     * @param object $project
     * @return void
     */
    public function mount($id)
    {
        // Set allowed status
        $status  = ['active', 'completed', 'under_development', 'pending_final_review', 'closed', 'incomplete'];

        // Get project
        $project = ModelsProject::where('uid', $id)
                                ->whereIn('status', $status)
                                ->with(['category' => function($query) {
                                    return $query->with('translation');
                                }, 'skills'])
                                ->withCount('bids')
                                ->firstOrFail();
        
        // Fill data
        $this->title             = $project->title;
        $this->highlighted       = $project->is_highlighted;
        $this->isFeatured        = $project->is_featured;
        $this->pid               = $project->pid;
        $this->slug              = $project->slug;
        $this->status            = $project->status;
        $this->description       = add_3_dots($project->description, 430);
        $this->category['title'] = $this->getCategoryTitle($project->category);
        $this->category['slug']  = $project->category->slug;
        $this->skills            = $project->skills;
        $this->total_bids        = $project->bids_count;
        $this->budget_type       = $project->budget_type;
        $this->created_at        = format_date($project->created_at, 'ago');
        $this->budget_min        = money($project->budget_min, settings('currency')->code, true)->format();
        $this->budget_max        = money($project->budget_max, settings('currency')->code, true)->format();
        $this->urgent            = $project->is_urgent;

    }

    /**
     * Render component
     *
     * @return void
     */
    public function render()
    {
        return view('livewire.main.cards.project');
    }


    /**
     * Get category name based on app locale
     *
     * @param object $category
     * @return string
     */
    private function getCategoryTitle($category)
    {
        try {
        
            // Get current locale
            $locale = strtolower(app()->getLocale());
    
            // Check if category has translations
            if ($category->translation()->count()) {
                    
                // Get category translations
                $trans = $category->translation;

                // Set empty name value
                $name  = $category->name;

                // Loop through translations
                foreach ($trans as $t) {
                    
                    // Check if there is translation for current locale
                    if (strtolower($t->language_code) == $locale) {
                        
                        // Set name
                        $name = $t->language_value;
                        break;

                    }

                }

                // Return category name
                return $name;

            } else {

                // Has no translations
                return $category->name;

            }
    
        } catch (\Throwable $th) {
    
            // Something went wrong
            return $category->name;
    
        }
    }
}
