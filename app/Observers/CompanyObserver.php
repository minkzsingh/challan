<?php

namespace App\Observers;

use App\Company;

class CompanyObserver
{
    public function deleting(Company $event)
    {
        \App\Challan::where('company_id', $event->id)->delete();
    }
}