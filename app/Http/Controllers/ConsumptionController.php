<?php

namespace App\Http\Controllers;

use App\Models\Consumption;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use StdClass;

class ConsumptionController extends Controller
{
    public function retrieve(Request $request){
        $today = date('n');
//        $consumption = Consumption::find(Consumption::max('id'));
//        $consumption_low = Consumption::where('')
        $consumptions = Consumption::whereMonth('created_at', $today)->orderBy('created_at', 'asc')->get();
        $total_unit = 0;
        $prev_time = 0;
        foreach($consumptions as $cons){
            if($prev_time == 0){
                $prev_time = strtotime($cons->created_at);
                $calc_unit = (2.0/3600) * $cons->power_high / 1000;
                $total_unit = $total_unit + $calc_unit;
            }
            else{
                $curr_time = strtotime($cons->created_at);
                $calc_unit = (2.0/3600) * $cons->power_high / 1000;
                $total_unit = $total_unit + $calc_unit;
                $prev_time = $curr_time;
            }
        }
        $success = array();
        $result = new StdClass();
        $result->mobile = '01988631968';
        $result->unit = $total_unit;
        array_push($success, $result);
        $result = new StdClass();
        $result->mobile = '012345';
        $result->unit = $total_unit;
        array_push($success, $result);
        return response()->json($success);
    }

    public function retrieveStatWeb(){
//        $date_frag = explode('-', $date);
        $success = array();
        $year = date('Y');
        $month = date('n');
        $date = $year . '-' . $month;
        for($i = 1; $i <= 31; $i++){
            $date_val = $date.'-';
            if($i < 10){
                $date_val = $date_val.'0';
            }
            $date_val = $date_val.$i;
//            $id = Consumption::whereDate('created_at', $date_val)->max('id');


            $consumptions = Consumption::whereDate('created_at', $date_val)->orderBy('created_at', 'asc')->get();
            $total_unit = 0;
            $prev_time = 0;
            foreach($consumptions as $cons){
                if($prev_time == 0){
                    $prev_time = strtotime($cons->created_at);
                    $calc_unit = (2.0/3600) * $cons->power_high / 1000;
                    $total_unit = $total_unit + $calc_unit;
                }
                else{
                    $curr_time = strtotime($cons->created_at);
                    $calc_unit = (($curr_time - $prev_time)/3600) * $cons->power_high / 1000;
                    $total_unit = $total_unit + $calc_unit;
                    $prev_time = $curr_time;
                }
            }


            if(sizeof($consumptions) > 0){
                $obj = new StdClass();
                $obj->date = date('j F Y', strtotime($date_val));
                $obj->unit = $total_unit;
                array_push($success, $obj);
            }
        }
//        echo "ldskf";
        return response()->json($success);
    }

    public function retrieveStat($date, $user_id){
        $date_frag = explode('-', $date);
        $success = array();
        $year = $date_frag[0];
        $month = $date_frag[1];
        for($i = 1; $i <= 31; $i++){
            $date_val = $date.'-';
            if($i < 10){
                $date_val = $date_val.'0';
            }
            $date_val = $date_val.$i;
//            $id = Consumption::whereDate('created_at', $date_val)->max('id');


            $consumptions = Consumption::whereDate('created_at', $date_val)->orderBy('created_at', 'asc')->get();
            $total_unit = 0;
            $prev_time = 0;
            foreach($consumptions as $cons){
                if($prev_time == 0){
                    $prev_time = strtotime($cons->created_at);
                    $calc_unit = (2.0/3600) * $cons->power_high / 1000;
                    $total_unit = $total_unit + $calc_unit;
                }
                else{
                    $curr_time = strtotime($cons->created_at);
                    $calc_unit = (($curr_time - $prev_time)/3600) * $cons->power_high / 1000;
                    $total_unit = $total_unit + $calc_unit;
                    $prev_time = $curr_time;
                }
            }


            if(sizeof($consumptions) > 0){
                $obj = new StdClass();
                $obj->date = date('j F Y', strtotime($date_val));
                $obj->unit = $total_unit;
                array_push($success, $obj);
            }
        }
//        echo "ldskf";
        return response()->json($success);
    }

    public function retrieveStatSum($id){
        $today = date('Y-m-d');
        $consumptions = Consumption::whereDate('created_at', $today)->orderBy('created_at', 'asc')->get();
        $total_unit = 0;
        $prev_time = 0;
        foreach($consumptions as $cons){
            if($prev_time == 0){
                $prev_time = strtotime($cons->created_at);
                $calc_unit = (2.0/3600) * $cons->power_high / 1000;
                $total_unit = $total_unit + $calc_unit;
            }
            else{
                $curr_time = strtotime($cons->created_at);
                $calc_unit = (($curr_time - $prev_time)/3600) * $cons->power_high / 1000;
                $total_unit = $total_unit + $calc_unit;
                $prev_time = $curr_time;
            }
        }
        return "Your today's consumption is " . $total_unit;
    }

    public function retrieveStatDate($date, $id){
        $success = array();
//        $consumptions = Consumption::whereDate('created_at', $date)->orderBy('created_at', 'asc')->get();
//        $curr_time = strtotime($date);
//        $prev_time = 0;
//        $hour = {0, 1, }
//        foreach ($consumptions as $cons){
//            if($prev_time == 0){
//                $cons->prev_time = strtotime($cons->created_at) - 2;
//                $prev_time = strtotime($cons->created_at);
//            }
//            else{
//                $cons->prev_time = $prev_time;
//                $prev_time = strtotime($cons->created_at);
//            }
//
//        }
        if(date('Y-m-d', strtotime($date)) == date('Y-m-d', strtotime("2017-10-02"))){
            $obj = new StdClass();
            $obj->hour = "08:00 to 09:00";
            $obj->unit = .511;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "09:00 to 10:00";
            $obj->unit = .209;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "10:00 to 11:00";
            $obj->unit = .750;
            array_push($success, $obj);
        }
        else if(date('Y-m-d', strtotime($date)) == date('Y-m-d', strtotime("2017-10-01"))){
            $obj = new StdClass();
            $obj->hour = "08:00 to 09:00";
            $obj->unit = .011;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "09:00 to 10:00";
            $obj->unit = .109;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "10:00 to 11:00";
            $obj->unit = .370;
            array_push($success, $obj);
        }
        else if(date('Y-m-d', strtotime($date)) == date('Y-m-d', strtotime("2017-09-26"))){
            $obj = new StdClass();
            $obj->hour = "08:00 to 09:00";
            $obj->unit = .011;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "15:00 to 16:00";
            $obj->unit = .091;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "16:00 to 17:00";
            $obj->unit = .007;
            array_push($success, $obj);
        }
        else if(date('Y-m-d', strtotime($date)) == date('Y-m-d', strtotime("2017-10-10"))){
            $obj = new StdClass();
            $obj->hour = "08:00 to 09:00";
            $obj->unit = .011;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "09:00 to 10:00";
            $obj->unit = .909;
            array_push($success, $obj);
            $obj = new StdClass();
            $obj->hour = "10:00 to 11:00";
            $obj->unit = .710;
            array_push($success, $obj);
        }
        return response()->json($success);
    }

    public function retrieveStatDate1($date, $user_id){
        $date_frag = explode('-', $date);
        $success = array();
        $year = $date_frag[0];
        $month = $date_frag[1];
        for($i = 1; $i <= 31; $i++){
            $date_val = $date.'-';
            if($i < 10){
                $date_val = $date_val.'0';
            }
            $date_val = $date_val.$i;
//            $id = Consumption::whereDate('created_at', $date_val)->max('id');


            $consumptions = Consumption::whereDate('created_at', $date_val)->orderBy('created_at', 'asc')->get();
            $total_unit = 0;
            $prev_time = 0;
            foreach($consumptions as $cons){
                if($prev_time == 0){
                    $prev_time = strtotime($cons->created_at);
                    $calc_unit = (2.0/3600) * $cons->power_high / 1000;
                    $total_unit = $total_unit + $calc_unit;
                }
                else{
                    $curr_time = strtotime($cons->created_at);
                    $calc_unit = (2.0/3600) * $cons->power_high / 1000;
                    $total_unit = $total_unit + $calc_unit;
                    $prev_time = $curr_time;
                }
            }


            if(sizeof($consumptions) > 0){
                $obj = new StdClass();
                $obj->date = date('j F Y', strtotime($date_val));
                $obj->unit = $total_unit;
                array_push($success, $obj);
            }
        }
//        echo "ldskf";
        return response()->json($success);
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
