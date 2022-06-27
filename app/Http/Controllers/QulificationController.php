<?php

namespace App\Http\Controllers;

use App\QulificationModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class QulificationController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $qulification= QulificationModel::get();
        return view('qulification',compact('qulification'));
    }
  public function create(){
      return view('addqulification');

  }
  public function store(Request $request){
      $validator = Validator::make($request->all(),[
        'Qulification' =>'required'
      ]) ;
    
    if($validator->fails()){
        return redirect()->back()->withInput()->with('error',$validator->messages->first());

    }
    try{
        $qly= QulificationModel::create(['Qulification_name'=>$request->Qulification]);
        if($qly){
            return redirect('qulification')->with('success','Qulification created succesfully!');
        }
        else{
            return redirect('qulification')->with('error','Qulification created error!');


        }
    }
    catch (\Exception $e) {
   $bug = $e->getMessage();
return redirect()->back()->with('error', $bug);
    }

}
public function edit($id){
    try{

        
        $qly=QulificationModel::find($id);
        if($qly){
            return view('edit_qulification',compact('qly'));
        }
        else{
            return redirect('404');
        }
    }
    
      catch (\Exception $e) {
        $bug = $e->getMessage();
        return redirect()->back()->with('error',$bug);
    }

}
public function update(Request $request){
$validator = Validator::make($request->all(),[
    'Qulification'=>'required|string'
]);
if($validator->fails()){
    return redirect()->back()->withInput()->with('error',$validator->messages()->first());
}
try {
    $qly=QulificationModel::find(
       $request->id
    );
    $update= $qly->update([
        'Qulification_name'=>$request->Qulification
]);
return redirect('qulification')->with('success', 'Qulification information updated succesfully!');
}
catch (\Exception $e) {
    $bug = $e->getMessage();
    return redirect()->back()->with('error', $bug);
}
}
public function Delete($id){
    $qly= QulificationModel::find($id);
    if($qly){
        $qly->delete();
        return redirect('qulification')->with('success','Qulification is removed!'); 
    }
    else {
        return redirect('qulification')->with('error','Qulification is removed!'); 

    }

}
}
