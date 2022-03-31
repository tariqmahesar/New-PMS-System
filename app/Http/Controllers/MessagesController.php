<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Storage;
use Auth;

class MessagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('admin.inbox');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function composeMessage()
    {

        $userType = Auth::user()->user_type;
        $userId = Auth::id();
        //dd($userId);
        if($userType == "Designer"){
            $users = User::where('user_type','Manager')->where('status','1')->get();
            $userType = 'Designer';
        }elseif($userType == "Manager"){
            $users = User::where('user_type','Designer')->where('status','1')->get();
            $userType = 'Manager';
        }else{
            $users = User::where('user_type','Designer')->where('user_type','Manager')->where('status','1')->get();
            $userType = 'Admin';
        }

        $usersData = array();
        $usersData['users'] = $users;
        $usersData['senderid'] = $userId;
        $usersData['userType'] = $userType;

        return view('admin.composeForm',compact('usersData'));
    }

    public function create()
    {
        
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function show(Messages $messages)
    {
        return view('admin.viewMessage');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function edit(Messages $messages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Messages $messages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messages  $messages
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messages $messages)
    {
        //
    }
}
