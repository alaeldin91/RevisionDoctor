<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\State_model;
use App\Area;

use DataTables,Auth;

class AreaController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $area=State_model::pluck('name','id');
  $state =Area::join('state_models', 'state_id', '=', 'state_models.id')->get(['areas.*', 'state_models.name']);
      
    return view('area',compact('area','state'));
}
public function create(Request $request){
    $validator= Validator::make($request->all(),[
        'area'=>'required'
    ]);
    if($validator->fails()){
    return redirect()->back()->withInput()->with('error',$validator->messages()->first());
    }
    try{
        $state_id= State_model::select('id')->get();
    
     $area = Area::create([
         'state_id'=>$request['state_id']
        ,'areaName'=>$request->area,
     ]);

        if($area){
            return redirect('area')->with('success','Area created succesfully!');

        }
        else{
            return redirect('area')->with('error', 'Failed to create area! Try again.');

        }
    }
    catch (\Exception $e) {
        $bug = $e->getMessage();
        return redirect()->back()->with('error', $bug);
    }
}
public function edit($id){
    $area=State_model::all();
    $state =Area::where('id',$id)->get();  
  
    return view('edit_area',compact('area','state'));
}
public function update(Request $request){
$validator=Validator::make($request->all(),[
'name'=>'required',
]);
if($validator->fails()){
  return redirect()->back()->withInput()->with('error',$validator->messages->first);

}
try{
    $area=Area::find($request->id);
    $update = $area->update([
        'areaName'=>$request->name,
        'state_id'=> $request->state
    ]);
    return redirect('area')->with('success', 'Area info updated succesfully!');
}
catch (\Exception $e) {
    $bug = $e->getMessage();
    return redirect()->back()->with('error', $bug);
}
}
public function delete($id){
    $area= Area::find($id);
    if($area){
        $delete= $area->delete();
        return redirect('area')->with('success', 'Area deleted!');

    }
    else {
        return redirect('404');
    }
}
}
