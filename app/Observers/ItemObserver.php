<?php

namespace App\Observers;

use App\Item;

class ItemObserver
{
    public function deleting(Item $event)
    {
        //dd($event);
    }

    public function deleted(Item $event)
    {
        //  dd($event);
    }
}