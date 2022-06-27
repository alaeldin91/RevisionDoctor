<?php
namespace App\Http\Controllers;
use App\DegreeModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DegreeControl extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
       //
public function index(){
    $degree= DegreeModel::get();
    return view('degree',compact('degree'));
}
public function create(){
    return view('addDegree');
}
public function store(Request $request){

$validtor = Validator::make($request->all(),
['degree'=>'required']);
if($validtor->fails()){
    return redirect()->back()->withInput()->with('error',$validtor->messages->first());
}
try{
    $degree=DegreeModel::create(['degree_name'=>$request->degree]);
    if($degree){
        return redirect('degree')->with('success','Degree created success !');
    }
    else {
    return redirect('degree')->with('success','Degree created error!');
    }

}
catch(\Exception $e){
$bug=$e->getMessage();
return redirect()->back()->with('error', $bug);
}

}
public function Delete($id){
    $degree =DegreeModel::find($id);
    if($degree){
        $degree->delete();
        return redirect('degree')->with('success','Degree is Deleted !');

    }
    else {
        return redirect('degree')->with('error','Degree is Removed');
    }
}
    public function edit($id){
        try{
        $degree=DegreeModel::find($id);
        if($degree){
            return view('edit_degree',compact('degree'));
        } 
        else{
            return redirect('404');
      }

    }
    catch(\Exception $e){
        $bug=$e->getMessage();
        return redirect()->back()->with('error',$bug);

    }

}
public function update(Request $request){
    $validtor =Validator::make($request->all(),
[
    'Degree'=>'required|string'
]);
if($validtor->fails()){
    return redirect()->back()->withInput()->with('error',$validator->messages()->first());

}
try{
$degree= DegreeModel::find($request->id);
$update= $degree->update([
   'degree_name'=>$request->Degree]
);
return redirect('degree')->with('success', 'Degree information updated succesfully!');


}
catch(\Exception $e){
$bug= $e->getMessage();
return redirect()->back()->with('error', $bug);

}


}

}
