<?php

namespace App\Exports;

use App\Models\NewsletterList;
use Maatwebsite\Excel\Concerns\FromCollection;

class NewsletterExport implements FromCollection
{

    protected $type;

    public function __construct(string $type)
    {
        $this->type = $type;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        switch ($this->type) {

            // All
            case 'all':
                return NewsletterList::all();
                break;

            // Pending
            case 'pending':
                return NewsletterList::where('status', 'pending')->get();
                break;

            // Verified
            case 'verified':
                return NewsletterList::where('status', 'verified')->get();
                break;
            
            default:
                return NewsletterList::all();
                break;
        }
    }
}
