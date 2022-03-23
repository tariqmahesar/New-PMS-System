<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notification;
use Session;
use DB;
use Auth;

class AdminController extends Controller
{

    public function index(){
      
        $designers = DB::select("select Count(*) AS total from users where user_type = 'Designer' ");
        $managers = DB::select("select Count(*) AS total from users where user_type = 'Manager' ");
        $totalDesigners = $designers[0]->total;
        $totalManagers = $managers[0]->total;
        //$totalDesigners = count
        // designer notifications
        


        return view('admin.dashboard', compact('totalDesigners','totalManagers') );

     }


    public function users(){
      
       $users = User::all();
      
       return view('admin.users.list', compact('users') );
    }


    public function showUserForm(){

    	return view('admin.showUserForm');	
    }

    public function createUser(Request $request){

        $user = new User;
    	
    	$imgName = "";

        request()->validate([
 
        'name' => 'required|min:3',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8',
        'phone' => 'required|integer|min:10',
 
       ]);

    	$user->name = $request->input('name');
    	$user->email = $request->input('email');
        $user->password = $request->input('password');
    	$user->phone = $request->input('phone');
        $user->user_type = $request->input('user_type');
        $user->status = $request->input('status');

    //   if($image = $request->file('image')) {
    //                 request()->validate([
    //                     'image' => 'required|image|mimes:jpeg,png,jpg',
    //                 ]);
    //                $imageName = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //                $imgName = $imageName;
    //                $path = public_path().'/adminTheme/uploads/users';
    //                $image->move($path, $imageName);
    //         }
            
    //         $user->image = $imgName;

    	    $user->save();
    	    return back()->with('success','User Created Successfully');


    }

    
    public function edit_user($id){

        $user = User::find($id);
        return view('admin.users.edit', compact('user') );
    }

    public function update_user( Request $request, $id ){
        
        //dd($request);
        $user_update = User::find($id);
        
        $user_update->name = $request->input('name'); 
        $user_update->email = $request->input('email');
        $user_update->user_type = $request->input('user_type');
        $user_update->phone = $request->input('phone');
        $user_update->status = $request->input('status');
        $user_update->save();
        
        session::flash('success','Record Updated Successfully');
        return redirect('admin/users');
    }

    public function destroy($id){
      
        $users_delete = User::find($id);
        $users_delete->delete();
        session::flash('success','Record has been deleted Successfully');
       return redirect('admin/users');
     }
}
