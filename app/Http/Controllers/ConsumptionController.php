<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ConsumptionController extends Controller
{
    public function retrieve(Request $request){
        $today = date('Y-m-d');
        $consumption = Consumption::find(Consumption::max('id'));
//        $consumption_low = Consumption::where('')
        $result = 'Your todays consumption is: '. $consumption->unit;
        return $result;
    }

    public function store(Request $request){
        $data = explode(':', $request->data);
        $consumption = new Consumption();
        $consumption->current_high = $data[0];
        $consumption->voltage_high = $data[1];
        $consumption->power_high = $data[2];
        $consumption->unit = $data[3];

//        $consumption->data = $request->data;
        $consumption->save();
    }

    public function index(){
//        $consumpiton = Consumption::max('id');
//        return $consumpiton;
        $consumptions = Consumption::all();
        return View::make('consumption', compact('consumptions'));
    }
}
