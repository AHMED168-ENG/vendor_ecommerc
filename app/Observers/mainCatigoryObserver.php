<?php

namespace App\Observers;

use App\models\main_catigory\catigors_models;

class mainCatigoryObserver
{
    /**
     * Handle the catigors_models "created" event.
     *
     * @param  \App\catigors_models  $catigorsModels
     * @return void
     */
    public function created(catigors_models $catigorsModels)
    {
        //
    }

    /**
     * Handle the catigors_models "updated" event.
     *
     * @param  \App\catigors_models  $catigorsModels
     * @return void
     */
    public function updated(catigors_models $catigorsModels )
    {
            $catigorsModels->vindower()->update([
                "active" => $catigorsModels -> active,
            ]);
    }

    /**
     * Handle the catigors_models "deleted" event.
     *
     * @param  \App\catigors_models  $catigorsModels
     * @return void
     */
    public function deleted(catigors_models $catigorsModels)
    {

    }

    /**
     * Handle the catigors_models "restored" event.
     *
     * @param  \App\catigors_models  $catigorsModels
     * @return void
     */
    public function restored(catigors_models $catigorsModels)
    {
        //
    }

    /**
     * Handle the catigors_models "force deleted" event.
     *
     * @param  \App\catigors_models  $catigorsModels
     * @return void
     */
    public function forceDeleted(catigors_models $catigorsModels)
    {
        //
    }
}
