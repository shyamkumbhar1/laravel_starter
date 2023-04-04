<?php

namespace App\Observers;

use App\Models\Product2;

class Product2Observer
{
    /**
     * Handle the Product2 "created" event.
     *
     * @param  \App\Models\Product2  $product2
     * @return void
     */
    public function creating(Product2 $product2)
    {
        $product2->slug = \Str::slug($product2->name);
    }
    public function created(Product2 $product2)
    {
   
        $product2->unique_id = 'PR-'.$product2->id;
        $product2->save();
    }

    /**
     * Handle the Product2 "updated" event.
     *
     * @param  \App\Models\Product2  $product2
     * @return void
     */
    public function updated(Product2 $product2)
    {
        //
    }

    /**
     * Handle the Product2 "deleted" event.
     *
     * @param  \App\Models\Product2  $product2
     * @return void
     */
    public function deleted(Product2 $product2)
    {
        //
    }

    /**
     * Handle the Product2 "restored" event.
     *
     * @param  \App\Models\Product2  $product2
     * @return void
     */
    public function restored(Product2 $product2)
    {
        //
    }

    /**
     * Handle the Product2 "force deleted" event.
     *
     * @param  \App\Models\Product2  $product2
     * @return void
     */
    public function forceDeleted(Product2 $product2)
    {
        //
    }
}
