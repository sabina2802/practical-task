<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use DateTime;
use DatePeriod;
use DateInterval;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $magical_number = array();
        return view('home',compact('magical_number'));
    }

    public function create(Request $request)
    {
         $request->validate([
                'start_time' => 'required|date_format:H:i:s',
                'end_time'   => 'required|date_format:H:i:s|after:start_time',
         ]);

        $input      = $request->all();
        $start_time = $input['start_time'];
        $end_time   = $input['end_time'];


        $begin      = new DateTime($start_time);
        $end        = new DateTime($end_time);

        $timeRanges = array();

        while($begin < $end) {

            $output       = $begin->format('H:i:s');
            $begin->modify('+1 seconds');   
            $output       = $begin->format('H:i:s');

            $timeRanges[] = $output;
        }


        $person_array    = $timeRanges;
        $newArray        = array();
        $magical_number  = array();

        foreach($person_array as $values) {

            $unique_value = str_replace(':', '', $values);
            $final_number = array_unique( str_split($unique_value));

            $count        = count($final_number);

            if($count<=2)
            {
                $magical_number[] = $unique_value;
            }

        }

        return view('home',compact('magical_number'));

    }
}
