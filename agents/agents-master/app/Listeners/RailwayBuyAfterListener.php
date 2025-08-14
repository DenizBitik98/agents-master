<?php

namespace App\Listeners;

use App\Events\RailwayBuyAfter;
use App\Models\Country;
use App\Models\Profile;
use App\Models\SaleRailwayDocument;
use App\ViewModels\Sale\Railway\Buy\BlankForm;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RailwayBuyAfterListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param \App\Events\RailwayBuyAfter $event
     * @return void
     */
    public function handle(RailwayBuyAfter $event)
    {
        try {
            $agentId = $event->getAgent()->id;

            /**
             * @var $blank BlankForm
             */
            foreach ($event->getBuyForm()->getBlanks() as $blank) {
                if ($blank->getSavePassenger() === true) {
                    $profile = new Profile();

                    $document = SaleRailwayDocument::where('dcts_code', '=', $blank->getDocumentType())->first();
                    $country = Country::where('dcts_code', '=', $blank->getCitizenship())->first();

                    $profile->tariff_type = $blank->getTariffType();
                    $profile->document_type_id = $document->id;
                    $profile->document = $blank->getDocument();
                    $profile->surname = $blank->getSurname();
                    $profile->name = $blank->getName();
                    $profile->last_name = $blank->getLastName();
                    $profile->passenger_iin = $blank->getPassengerIin();
                    $profile->birthday = $blank->getBirthday();
                    $profile->sex = $blank->getSex();
                    $profile->phone = $blank->getPhone();
                    $profile->citizenship_id = $country->id;
                    $profile->external_id = '';
                    $profile->note = '';
                    $profile->agent_id = $agentId;

                    $profile->save();
                }
            }
        } catch (\Exception $e) {

        }
    }
}
