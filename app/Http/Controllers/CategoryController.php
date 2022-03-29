<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Models\Design;
use App\Models\User;
use App\Models\Categorysections;
use Session;
use DB;
use Storage;
use Auth;

class CategoryController extends Controller
{

    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    
    public function index(){
        //dd("hi");
         $category = Category::all();

         $designsData = DB::select('SELECT d.id,d.userid,u.name, d.design_name,d.status, c.section_count 
                                    FROM `designs` d
                                    INNER JOIN categories c
                                    ON d.categoryid = c.id
                                    INNER JOIN users u
                                    ON u.id = d.userid'
                                );

        // dd($designsData);

         return view('admin.showCategory',compact('category','designsData'));
    }


    public function show(){
//dd("hi");
        return view('admin.addCategory');
    }





    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categoryedit',compact('category'));
    }



    public function update(Request $request, $id)
    {

        //$sections = $request->input('section');
        // if(isset($sections)){
        //         foreach ($sections as $key => $value) {
        //         $data = array('categoryid' => $id, 'category_sections_name' => $value);
        //         Categorysections::insert($data);   
        //     }
        // }
        
        //echo $id;
       // exit;
        $category = Category::find($id);
        $category->category_name = $request->input('category_name');
        $category->section_count = $request->input('section_count');
        $category->category_package_type = $request->input('category_package_type');
       // dd($category);
        $category->save();

        session::flash('success','Record Updated Successfully');
        return redirect('admin/category');
    }




    public function create(Request $request){

        request()->validate([
            'category_name' => 'required|min:3',
            'section_count' => 'required|integer',
        ]);

        $category = Category::create( $request->all());
        if($category){
            session::flash('success','Category has been successfully added');
            return redirect('admin/category');
        }
        // return back()->with('success','Category successfully added');
    }

    public function add_design(Request $request){
        
        $this->validate($request, [
            'categoryid' => 'required',
            'design_name' => 'required',
            ]);
    
            $userid = $request->userid;
            $categoryid = $request->categoryid;
            $design_name = $request->design_name;
            
    
            $category = Design::create( $request->all());
            $designid = DB::getPdo()->lastInsertId();

            $comment = 'New design has been added from designer ';

            //dd($designid);

            if($category){

                $getManagers = DB::select('select * from Users where user_type = "Manager" ');

                foreach($getManagers as $key=>$value){
                    $managerid = $value->id;
                    $insert = DB::insert('insert into manager_notificatios (userid, designid,managerid,notificatoin_comment,read_status) 
                                            values (?, ?,?,?,?)', [$userid, $designid,$managerid,$comment,1]);

                }

            }

           // return back()->with('success', 'Design created successfully');
           //  session::flash('success','Design created successfully');
             return redirect('design/upload/'.$designid.'?userid='.$userid.' ')->with('success', 'Design created successfully');
        
    }


        public function destroy($id)
    {
       $category = Category::find($id);
       $category->delete();
       session::flash('success','Record has been deleted Successfully');
       return redirect('admin/category');
        
    }
    
}
