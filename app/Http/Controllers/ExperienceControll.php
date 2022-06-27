<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
namespace App\Http\Controllers;
use App\ExperienceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
class ExperienceControll extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
      public function index(){
          $experience=ExperienceModel::get(); 
          return view('experience',compact('experience'));
      }
      public function create(){
          return view('create_experience');
      }
      public function store(Request $request){
        $validator=  Validator::make($request->all(),[
            'experienceAr'=>'required|string',
            'experienceEn'=>'required|string'
        ]);
        if($validator->fails()){
            return redirect()->back()->with()->withInput('error',$validator->messages()->first());
        }
try{
    $experience=ExperienceModel::create([
        'experience_name_ar'=>$request->experienceAr,
        'experience_name_er'=>$request->experienceEn
    ]);
    if($experience){
        return redirect('experience')->with('success','Experience created success !');
    }
    else{
        return redirect('experience')->with('success','Experience created Error !');

    }

}
catch(\Exception $e){
    $bug=$e->getMessage();
    return redirect()->back()->with('error',$bug);

}

      }
      public function edit($id){
         
          try{
            $experience= ExperienceModel::find($id);
            if($experience){
                return view('edit_experience',compact('experience'));

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
          $validator = Validator::make($request->all(),[
         'experienceAr'=>'required|string',
         'experienceEn'=>'required|string'
          ]);
          if($validator->fails()){
              return redirect()->back()->with()->withInput('error',$validator->messages()->first());
          }
        try{
      $experience = ExperienceModel::find($request->id);
      $update= $experience->update([
          'experience_name_ar'=>$request->experienceAr,
          'experience_name_er'=>$request->experienceEn
      ]);
      return redirect('experience')->with('success','Experience information updated succesfully!');
        }
        catch(\Exception $e){
        $bug= $e->getMessage();
         return redirect()->back()->with('error', $bug);
    }
      }
      public function delete($id){
          $experience= ExperienceModel::find($id);
          if($experience){
            $experience->delete();
            return redirect('experience')->with('success','Experience is Deleted !');

          }
          else {
            return redirect('experience')->with('success','exerience is Not Deleted !');

          }
      }
}
