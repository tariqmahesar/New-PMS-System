<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\manager_notificatio;
use Illuminate\Http\Request;
use DB;
use Auth;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //dd($id);
        $updateApprovedDesignSection = Notification::where('id', '=', $id)->update([
            'read_status' => 0
        ]);

        $notificationData = DB::select('select * from notifications where id = "'.$id.'"');
        //dd($notificationData);


        return view('admin.showNotification',compact('notificationData'));
    }

    public function managernotification($id){

        $notifications = DB::select('select * from manager_notificatios where id = "'.$id.'" ');
        //dd($notifications);
        $managerid = $notifications[0]->managerid;

        $updateApprovedDesignSection = manager_notificatio::where('id', '=', $id)->where('managerid',$managerid)->update([
            'read_status' => 0
        ]);

        $notificationData = DB::select('select * from manager_notificatios where id = "'.$id.'"');
        //dd($notificationData);


        return view('admin.showManagerNotification',compact('notificationData'));

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notification  $notification
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
