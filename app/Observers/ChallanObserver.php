<?php

namespace App\Observers;

use App\Challan;

class ChallanObserver
{
    public function deleting(Challan $event)
    {
        \App\ChallanItem::where('challan_id', $event->id)->delete();
    }

    public function deleted(Challan $event)
    {
        //  dd($event);
    }
}