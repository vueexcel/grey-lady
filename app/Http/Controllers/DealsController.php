<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Deals;
use App\Models\Scenario;
use Validator;

class DealsController extends Controller
{
    public function deal($id)
    {
        $userid = auth()->id();
        $deal = Deals::where('id', $id)->where('user_id', $userid)->get()->toArray();
        if( sizeof($deal) > 0 ){
            $scenarios = Scenario::where('deal_id', $id)->get()->toArray();
        }        
        return view('deals.dealdetails')->with([
            'deal' => $deal,
            'scenarios' => $scenarios
        ]);
    }
}
