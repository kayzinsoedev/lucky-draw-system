<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WinningResult;

class ResultController extends Controller
{
    public function showResult(){

    	$winning_results = WinningResult::orderBy('prize_type','ASC')->get();
    	return view('result',compact('winning_results'));
    }
}
