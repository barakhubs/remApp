<?php

namespace App\SMS;
use AfricasTalking\SDK\AfricasTalking;
use App\Models\Patient;
use Carbon\Carbon;

class SendSms
{

    public function sendAtSix(){
        $AT       = new AfricasTalking(env('SMS_USERNAME'), env('SMS_API_KEY'));

        // Get one of the services
        $sms      = $AT->sms();

        // get all upcoming appoints on the same date
        $appointments = Patient::whereDate('return_visit_date', Carbon::today())->get();

        foreach ($appointments as $key => $appointment) {
            // send sms
            $sms->send([
                'to'      => '+256'.$appointment->telephone_number,
                'message' => "Hello ".$appointment->given_name. ", \n This is a remainder that you have an appointment at " .$appointment->hiv_clinic_no. " on ".$appointment->return_visit_date ."\n We are looking forward to seeing you \n\n".
                             "Mi ngoni ".$appointment->given_name. ", Ma mi enga oti ta mivu mi ni ba le an\'draa " .$appointment->hiv_clinic_no. " aro jo\'a risi o\'mba o\'du " .$appointment->return_visit_date
            ]);
        }

    }

    public function sendOneDayRemainder (){
        $AT       = new AfricasTalking(env('SMS_USERNAME'), env('SMS_API_KEY'));

        // Get one of the services
        $sms      = $AT->sms();

        // get all upcoming

        $appointments = Patient::whereDate('return_visit_date', Carbon::now()->addDay())->get();

        foreach ($appointments as $key => $appointment) {
            // send sms
            $sms->send([
                'to'      => '+256'.$appointment->telephone_number,
                'message' => "Hello ".$appointment->given_name. ", \n This is a remainder that you have an appointment at " .$appointment->hiv_clinic_no. " on ".$appointment->return_visit_date ."\n We are looking forward to seeing you \n\n".
                             "Mi ngoni ".$appointment->given_name. ", Ma mi enga oti ta mivu mi ni ba le an\'draa " .$appointment->hiv_clinic_no. " aro jo\'a risi o\'mba o\'du " .$appointment->return_visit_date
            ]);

        }
    }
}
