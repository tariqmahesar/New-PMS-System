<?php

namespace App\Http\Controllers;

use App\Models\Design;
use Illuminate\Http\Request;
use App\Category;
use App\Models\Categorysections;
use App\Models\User;
use DB;
use Storage;
use Auth;


class DesignController extends Controller
{
    public function index()
    {   
        $designsData = DB::select('SELECT d.id, d.design_name,d.status, c.section_count 
                                    FROM `designs` d
                                    INNER JOIN categories c
                                    ON d.categoryid = c.id'
                                );

        return view('admin.showDesign',compact('designsData'));
    }


    public function show()
    {
        $category = Category::all();
        return view('admin.addDesign',compact('category'));
    }

    public function getSections(Request $request){
        $categoryid = $request->categoryId;
        $categoryData = Category::find($categoryid);
        $categorySectionData = DB::select('select * from Categorysections where categoryid = "'.$categoryid.'"');
        $data['categorySectionData'] = $categorySectionData;
        $data['categoryData'] = $categoryData;
        if(isset($categorySectionData)){
            return response()->json( array(
                                        'success' => true, 
                                        'response'=>$data));
        }else{
            return response()->json( array(
                                        'error' => false, 
                                        'response'=>'Sections Not Added yet'));
        }
    }

  
    public function create(Request $request)
    {

        $this->validate($request, [
        'categoryid' => 'required',
        'file' => 'required',
        ]);

        $userid = $request->userid;
        $categoryid = $request->categoryid;
        $categoryData = Category::find($categoryid);
        $categoryName = $categoryData->category_name;
        $userData = User::find($userid);
        $userName = $userData->name;
        $categorySectionData = DB::select('select * from categorysections where categoryid = "'.$categoryid.'" ');
        foreach ($categorySectionData as $key => $catSec) {
           $catId = $catSec->id;
            $files = $request->file('file');
            if(!empty($files)):
               // foreach($files as $key=>$file):
                  $imageName = date('YmdHis') . "." . $files[$key]->getClientOriginalName();
                  //dd($imageName);
                  $path = public_path().'/adminTheme/uploads/sectionFiles';
                  $files[$key]->move($path, $imageName);
                  $updateProduct = Categorysections::where('id', '=', $catId)->update([
                    'categoryname' => $categoryName,
                    'username' => $userName,
                    'userid' => $userid,
                    'imagepath' =>  $path,
                    'image' => $imageName
                ]);
              //  endforeach;
            endif;    
       }
         return back()->with('success', 'Your files has been successfully uploaded');
    }

    public function store(Request $request)
    {
        
    }

   
    public function edit($id)
    {
        $designid = $id;
        $designsData = DB::select("SELECT d.design_name,d.id, c.section_count AS total_sections FROM `designs` d
                                    INNER JOIN categories c
                                    ON d.categoryid = c.id
                                    WHERE d.id = '".$designid."' ");

        $categorySectionData = DB::select('select * from Categorysections where designid = "'.$designid.'"');
        return view('admin.designedit',compact('designsData','categorySectionData'));
    }


    public function update(Request $request, $id)
    {
        $designid = $request->input('designid');
        $userid = $request->input('userid');
        $sections = $request->input('section');
        $sections_name = $request->input('sections_name');
        foreach ($sections as $key => $section) {
            $files = $request->file('designImages');
            if(!empty($files)):
                $imageName = date('YmdHis') . "." . $files[$key]->getClientOriginalName();
                  $path = public_path().'/adminTheme/uploads/sectionFiles';
                  $files[$key]->move($path, $imageName);
                  $addDesigns = Categorysections::create([
                    'designid' => $designid,
                    'userid' => $userid,
                    'section' => $sections[$key],
                    'sections_name' =>$sections_name[$key],
                    'imagepath' =>  $path,
                    'image' => $imageName
                ]);
            endif;
        }
        if($addDesigns)
        {
            return back()->with('success','Designs Uploaded Successfully');
            }else{
            return back()->with('error','Designs Not Uploaded');         	
        }
    }

    public function sectionupdate(Request $request, $id)
    {
        //dd($request);
        $designid = $request->input('designid');
        $userid = $request->input('userid');
        $sections = $request->input('section');
        $sections_name = $request->input('sections_name');

        foreach ($sections as $key => $section){
            $sectionId = $sections[$key];
            //dd($sectionId);
            $files = $request->file('designImages');
            if(!empty($files)):
                $imageName = date('YmdHis') . "." . $files[$key]->getClientOriginalName();
                  $path = public_path().'/adminTheme/uploads/sectionFiles';
                  $files[$key]->move($path, $imageName);
                $updateDesigns = Categorysections::where('designid', '=', $designid)->where('section',$sectionId)->update([
                    'userid' => $userid,
                    'image' => $imageName
                ]);
            endif;
        }
        if($updateDesigns)
        {
            return back()->with('success','Designs Updated Successfully');
            }else{
            return back()->with('error','Designs Not Updated');         	
        }
    }

    public function upload_design($id)
    {

        if(isset($id) && $id>0){

        $category = Category::all();
        $useridd = 0;
        $userType = '';
        if(isset($_GET['userid'])){
            $useridd = $_GET['userid'];
            $userType = Auth::user()->user_type;

        }else{

            $userType = Auth::user()->user_type;
            $userId = Auth::id();
            $useridd = $userId;
        }

       // dd($userType);
        
        $designid = $id;
        $designsData = DB::select("SELECT d.design_name,d.id, c.section_count AS total_sections FROM `designs` d
                                    INNER JOIN categories c
                                    ON d.categoryid = c.id
                                    WHERE d.id = '".$designid."' ");

        $categorySectionData = DB::select('select * from Categorysections where designid = "'.$designid.'" AND userid = "'.$useridd.'" ');

        
            return view('admin.showDesignSections',compact('designsData','categorySectionData','category'));

        }else{

            $category = Category::all();
            return view('admin.showDesignSections',compact('category'));
        }

    }

    public function view_design($id){

        $usersAddedDesigns = DB::select("SELECT DISTINCT us.id,us.name,us.user_type,us.email,cs.designid,c.section_count
                                         FROM `users` us
                                         INNER JOIN categorysections cs
                                         ON us.id = cs.userid
                                         INNER JOIN designs d
                                         INNER JOIN categories c
                                         ON d.categoryid = c.id
                                         WHERE cs.designid = '".$id."'
                                    ");

        return view('admin.showUsers',compact('usersAddedDesigns'));

        // dd($getDesignUsers);

        
    }


    public function destroy($id)
    {
       $Categorysections = Categorysections::find($id);
       $Categorysections->delete();
       return back()->with('success','Record has been deleted Successfully');     
        //session::flash('success','Record has been deleted Successfully');
        //return redirect('admin/design');
    }
}
