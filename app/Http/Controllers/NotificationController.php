<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\manager_notificatio;
use App\Models\User;
use App\Models\Design;
use Illuminate\Http\Request;
use DB;
use Auth;

class NotificationController extends Controller
{
    
    public function index($id)
    {
        $updateApprovedDesignSection = Notification::where('id', '=', $id)->update([
            'read_status' => 0
        ]);

        $notificationData = DB::select('select * from notifications where id = "'.$id.'"');
        return view('admin.showNotification',compact('notificationData'));
    }

    public function managernotification($id){
        $notifications = DB::select('select * from manager_notificatios where id = "'.$id.'" ');
        $managerid = $notifications[0]->managerid;
        $updateApprovedDesignSection = manager_notificatio::where('id', '=', $id)->where('managerid',$managerid)->update([
            'read_status' => 0
        ]);
        $notificationData = DB::select('select * from manager_notificatios where id = "'.$id.'"');
        return view('admin.showManagerNotification',compact('notificationData'));
    }

    public function show()
    {

        $notifications = DB::select('SELECT mn.id,mn.designid,d.design_name,u.name,mn.notificatoin_comment 
                                        FROM `manager_notificatios` mn
                                        INNER JOIN users u
                                        ON mn.managerid = u.id
                                        INNER JOIN designs d
                                        ON mn.designid = d.id');


        $notifications2 = DB::select('SELECT n.notificatoin_comment,d.design_name,n.sectionid,u.name FROM `notifications` n
                                        INNER JOIN users u
                                        ON n.managerid = u.id
                                        INNER JOIN designs d
                                        ON n.designid = d.id');

        return view('admin.showNotificationLogs',compact('notifications','notifications2')); 
    }
}
