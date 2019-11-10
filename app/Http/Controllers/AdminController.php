<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrizeType;
use App\WinningResult;
use App\WinningUser;
use App\WinningNumber;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    

        $prize_types = PrizeType::pluck('name','id')->prepend("please select");
        return view('admin.index',compact('prize_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   

        if( ($request->generate_randomly == "1") && ($request->prize_type == "1") ){
            $most_winning_number= WinningUser::max('winning_number_count');
            $most_winning_users = WinningUser::where('winning_number_count',$most_winning_number)->get(['id']);
            foreach ($most_winning_users as $key => $value) {
                 $user_id[] = $value->id;
            }
            if(count(WinningNumber::all()) > 0){
                $most_winning_numbers = WinningNumber::whereIn('user_id',$user_id)->get(['user_winning_number']);
                foreach ($most_winning_numbers as $key => $value) {
                     $winning_numbers[] = $value->user_winning_number;
                }
                $randIndex = array_rand($winning_numbers);
                $winning_number = $winning_numbers[$randIndex];
            }else{
                $winning_number = "null";
            }   
            
        }
        elseif($request->generate_randomly == "1"){
            if(count(WinningNumber::all()) > 0){
                $user_winning_numbers = WinningNumber::get(['user_winning_number']);
                foreach ($user_winning_numbers as $key => $value) {
                   $winning_numbers[] =  $value->user_winning_number;
                }
                $randIndex = array_rand($winning_numbers);
                $winning_number = $winning_numbers[$randIndex];     
            } else {
                $winning_number = "null";
            }      
        }
        else{
            $winning_number = $request->winning_number;
        }
        
        WinningResult::create([
            'prize_type' => $request->prize_type,
            'winning_number' => $winning_number
        ]);

        // flash('Draw Successfully', 'success');
        return redirect('/draw')->with('status','Draw Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
