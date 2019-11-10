<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WinningNumber;
use App\WinningUser;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){       
        return view('member.index');
    }

    public function store(Request $request){
    	$user_id = WinningUser::create([
	    		'name' => $request->name,
	    		'winning_number_count' => count($request->user_winning_number)
		])->id;

		foreach ($request->user_winning_number as $key => $value) {
    		WinningNumber::create([
	    		'user_id' => $user_id,
	    		'user_winning_number' => $value
    		]);
    	}
    	
    	// flash('Member Generated Successfully', 'success');
    	return redirect('/member')->with('status','Successfully Generated winning number for user');

    }
}
