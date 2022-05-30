<?php

namespace App\Http\Controllers;

use App\Models\strip;
use Illuminate\Http\Request;

class StripController extends Controller
{
    public function invoice_num(){
        $record = strip::latest()->first();
        $expNum = explode('-', $record->invoiceno);

        //check first day in a year
        if ( date('l',strtotime(date('Y-01-01'))) ){
            $nextInvoiceNumber = date('Y').'-0001';
        } else {
            //increase 1 with last invoice number
            $nextInvoiceNumber = $expNum[0].'-'. $expNum[1]+1;
        }
    }

    public function insert_data(){

    }
}
