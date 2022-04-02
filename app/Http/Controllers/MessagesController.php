<?php

namespace App\Http\Controllers;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use DB;
use Storage;
use Auth;
use DateTime;


class MessagesController extends Controller
{
    
    public $userUnreadMessages;


    public function index()
    {
        $userId = Auth::id();
        $messages = DB::select("SELECT  msg.id,msg.message,users.name,users.user_type,msg.readstatus,msg.status ,msg.created_at 
                                FROM `messages` msg
                                INNER JOIN users
                                ON users.id = msg.senderid
                                WHERE msg.status = 1 AND msg.recieverid = '".$userId."'
                                ORDER BY msg.id DESC ");

        $totalUnreadMessages = Messages::where('readstatus',1)->where('recieverid',$userId)->get();

        return view('admin.inbox',compact('messages','totalUnreadMessages'));
    }

    
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

    public function store(Request $request)
    {
        $Messages = Messages::create( $request->all());
        if($Messages){
            return back()->with('success', 'Message sent successfully');
        }
    
    }

    public function insertreply(Request $request){

        $Messages = Messages::create( $request->all());
        if($Messages){
            return back()->with('success', 'Reply sent successfully');
        }

    }

   
    public function show($id)
    {
        //dd($id);
        $messagesData['messageInfo'] = Messages::where('id',$id)->get();
        $readStatus = $messagesData['messageInfo'][0]->readstatus;
        if($readStatus == 1){
            $updateDesigns = Messages::where('id', '=', $id)->update([
                    'readstatus' => 0
                ]);
        }
        
        $senderId = $messagesData['messageInfo'][0]->senderid;
        $messagesData['senderInfo'] = User::where('id',$senderId)->get();
        //dd($messagesData['messageInfo'][0]['message']);
        return view('admin.viewMessage',compact('messagesData'));
    }

  
    public function replyMessage($recieverId)
    {
        $senderId = Auth::id();

        $userData['recieverInfo'] = User::where('id',$recieverId)->get();
        $userData['senderInfo'] = User::where('id',$senderId)->get();

        //dd($messagesData);

        return view('admin.replyForm',compact('userData'));
    }

    public function destroy($id){
        $message = Messages::find($id);
        $message->delete();
       session::flash('success','Record has been deleted Successfully');
       return redirect('admin/inbox');
    }


    public static function timeAgo($time_ago){

    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        echo "$seconds seconds ago";
    }

    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            echo "one minute ago";
        }
        else{
            echo "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            echo "an hour ago";
        }else{
            echo "$hours hours ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            echo "yesterday";
        }else{
            echo "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            echo "a week ago";
        }else{
            echo "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            echo "a month ago";
        }else{
            echo "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            echo "one year ago";
        }else{
            echo "$years years ago";
        }
}

}
}
