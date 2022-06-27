<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\JobModel;
use DataTables,Auth;
class JobController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function addjob(){
        return view('addjob');
    }
    
    public function index(){
        return view('jobs');
    }
    public function create(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'job_desc'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error',$validator->messages()->first());
         }

       try{
       $job= JobModel::create([
        'name_job'=>$request->name,
        'job_desc'=>$request->job_desc

       ]);
       if($job){
           return redirect('addjob')->with('success','Job created succesfully!');
       }
       else {
        return redirect('addjob')->with('error', 'Failed to Job ! Try again.');

       }

        }
        catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }

    }
    public function getjoblist(Request $request){
        $data= JobModel::select('*');
        return Datatables::of($data)->addIndexColumn()->addColumn('action',function($data){
            return '<div class="table-actions">
              <a href="'.url('job/edit/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
              <a href="'.url('job/delete/'.$data->id).'"  ><i class="ik ik-trash-2 f-16 text-red"></i></a>
              </div>';
              
      
      
          })->rawColumns(['action'])->make(true);
 return view('jobs');
    }
    public function edit($id){
        try{

        
        $job=JobModel::find($id);
        if($job){
            return view('editjob',compact('job'));
        }
        else{
            return redirect('404');
        }
    }
    
      catch (\Exception $e) {
        $bug = $e->getMessage();
        return redirect()->back()->with('error', $bug);
    }
}
public function update(Request $request){
    $validator= Validator::make($request->all(),[
         'id'=>'required',
       'name'=>'required',
       'job_desc'=>'required'
    ]);
    if($validator->fails()){
        return redirect()->back()->withInput()->with('error',$validator->messages()->first());
    }
   try{

   
        $job= JobModel::find($request->id);
        
      $update=$job->update(
          [
            'name_job' => $request->name,
               'job_desc'=>$request->job_desc
          ]
      );
      return redirect()->back()->with('success','Job information updated succesfully!');
    }
    catch(\Exception $e){
        $bug = $e->getMessage();
        return redirect()->back()->with('error', $bug);
}
}
public function delete($id){
    $job=JobModel::find($id);
    if($job){
        $job->delete();
        return redirect('jobs')->with('success','job is removed!');   

    }
    else {
        return redirect('jobs')->with('error','job not found!');   

    }

}
}