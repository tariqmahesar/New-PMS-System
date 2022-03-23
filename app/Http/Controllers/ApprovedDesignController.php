<?php

namespace App\Http\Controllers;

use App\Models\Approved_design;
use App\Models\Categorysections;
use Illuminate\Http\Request;
use DB;
use Storage;
use Auth;

class ApprovedDesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request);

            $designid = $request->designid;
            $sectionid = $request->sectionid;
            $userid = $request->userid;
            $designerid = $request->designerid;
            $approved_status = $request->approved_status;


            $status = 'approved';
            $managerid = $userid;

            $addApprovedDesigns = Approved_design::create( $request->all());
           

            if($addApprovedDesigns){
                
                $this->sendNotificationToDesigner($designid,$sectionid,$status,$managerid);

                return response()->json( array(
                    'success' => true, 
                    'response'=>'Design status has been approved'));
            }else{
                return response()->json( array(
                    'error' => false, 
                    'response'=>'Design not approved for some reason contact admin'));

            }
    }

    public function sendNotificationToDesigner($designid,$sectionid,$status,$managerid){

        $categorySectionData = DB::select('select * from Categorysections where designid = "'.$designid.'" ');
        $userid = $categorySectionData[0]->userid;
        $comment = "Congratulations your design section has been approved by the manager, your this design section will finally be approved when all the managers approved it";

        $insert = DB::insert('insert into notifications (userid, designid,sectionid,managerid,notificatoin_comment,read_status) 
        values (?, ?,?,?,?,?)', [$userid, $designid, $sectionid,$managerid,$comment,1]);

    }

    public function store(Request $request)
    {
        
    }

    public function show(Approved_design $approved_design)
    {
        
    }

    
    public function edit(Approved_design $approved_design)
    {
        
    }

    
    public function update(Request $request, Approved_design $approved_design)
    {
        $designid = $request->designid;
        $sectionid = $request->sectionid;
        $userid = $request->userid;
        $approved_status = $request->approved_status;

        $updateApprovedDesignSection = Approved_design::where('userid', '=', $userid)
        ->where('designid',$designid)->where('sectionid',$sectionid)->update([
            'approved_status' => 0
        ]);

        if($updateApprovedDesignSection){
            return response()->json( array(
                'success' => true, 
                'response'=>'Design status has been unapproved'));

        }else{
            return response()->json( array(
                'error' => false, 
                'response'=>'Design not approved status failed for some reason contact admin'));

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Approved_design  $approved_design
     * @return \Illuminate\Http\Response
     */
    public function destroy(Approved_design $approved_design)
    {
        //
    }
}
