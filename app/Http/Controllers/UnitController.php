<?php

namespace App\Http\Controllers;
use App\UnitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class UnitController extends Controller
{
    //

/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the roles page
     *
     */
    public function index()
    {
        $units=UnitModel::get();
        return view('addunit',compact('units'));
    }
    public function create(Request $request){
$validator = Validator::make($request->all(),[
    'unit'=>'required'
]);
if($validator->fails()){
   return redirect()->back()->withInput()->with('error',$validator->messages()->first());
}
try{
    $unit=UnitModel::create(['unit_name'=>$request->unit]);
    if($unit){
        return redirect('addunit')->with('success','Unit created succesfully!');
    }
    else {
        return redirect('addunit')->with('error','Unit created error!');

    }

}
 catch (\Exception $e) {
       $bug = $e->getMessage();
    return redirect()->back()->with('error', $bug);
        }    
    }
    public function edit($id){
        try{
            $unit= UnitModel::find($id);
            if($unit){
                return view('edit_unit',compact('unit'));
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
        $validator =Validator::make($request->all(),[
            'id'=>'required',
             'name'=>'required|string'
        ]);
        if($validator->fails()){
            return redirect()->back()->withInput()->with('error',$validator->messages()->first());
        }
        try {
            $unit=UnitModel::find(
                $request->id
            );
            $update= $unit->update([
                'unit_name'=>$request->name,
        ]);
        return redirect()->back()->with('success', 'Unit information updated succesfully!');
        }
        catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }
        }
        public function delete($id){
            $unit= UnitModel::find($id);
            if($unit){
             $unit->delete();
             return redirect('addunit')->with('success','Unit is removed!');   
            }
            else {
                return redirect('addunit')->with('error','unit not found!');   
            
            }
            }
}

