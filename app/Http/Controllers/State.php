<?php

namespace App\Http\Controllers;
use App\State_model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class State extends Controller
{

    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getStateList(Request $request){
      $data=State_model::select('*');
      return Datatables::of($data)->addIndexColumn()->addColumn('action',function($data){
      return '<div class="table-actions">
        <a href="'.url('state/edit/'.$data->id).'" ><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
        <a href="'.url('state/delete/'.$data->id).'"  ><i class="ik ik-trash-2 f-16 text-red"></i></a>
        </div>';
        


    })->rawColumns(['action'])->make(true);
    return view('state'); 
    }
    public function index(){
        $state = State_model::pluck('name','id');

                return view('state',compact('state'));
        }
       
    
    public function create(Request $request){
        $validator=Validator::make($request->all(),[
            'state'=>'required'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error',$validator->messages->first());

        }
        try{
            $state= State_model::create(['name'=>$request->state]);
            if($state){
                return redirect('state')->with('success','State created succesfully!');
            }
            else{
                return redirect('state')->with('error','State created error!');


            }
        }
        catch (\Exception $e) {
       $bug = $e->getMessage();
    return redirect()->back()->with('error', $bug);
        }

    }    
public function edit($id){
    try{
$state=State_model::find($id);
if($state){
return view('edit_state',compact('state'));
}
else {
    return redirect('404');
}

    }
    catch (\Exception $e) {
        $bug = $e->getMessage();
        return redirect()->back()->with('error', $bug);
    }
}
public function update(Request $request){
$validator =Validator::make($request->all(),[
    'id'=>'required',
     'name'=>'required|string'
]);
if($validator->fails()){
    return redirect()->back()->withInput()->with('error',$validator->messages()->first());
}
try {
    $state=State_model::find(
        $request->id
    );
    $update= $state->update([
        'name'=>$request->name,
]);
return redirect('state')->with('success', 'State information updated succesfully!');
}
catch (\Exception $e) {
    $bug = $e->getMessage();
    return redirect()->back()->with('error', $bug);
}
}
public function delete($id){
$state= State_model::find($id);
if($state){
 $state->delete();
 return redirect('state')->with('success','state is removed!');   
}
else {
    return redirect('state')->with('error','Unit not found!');   

}
}



}
