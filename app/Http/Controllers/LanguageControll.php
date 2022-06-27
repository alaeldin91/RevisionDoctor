<?php
namespace App\Http\Controllers;
use App\LanguageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
class LanguageControll extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function index(){
        $language=LanguageModel::get(); 
        return view('language',compact('language'));
    }
    public function create(){
        return view('create_language');
    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
            'languageAr'=>'required|string',
            'languageen'=>'required|string'
        ]);
 if($validator->fails()){
    return redirect()->back()->with()->withInput('error',$validator->messages()->first());


 }
try{
$language= LanguageModel::create([
'language_name_ar'=>$request->languageAr,
'language_name_en'=>$request->languageen
]);
if($language){
    return redirect('language')->with('success','Language created success');
}
else {
    return redirect('language')->with('success','Language created error');



}
}
catch(\Exception $e){
    $bug=$e->getMessage();
    return redirect()->back()->with('error',$bug);

}
    }
    public function edit($id){
        try{
        $language= LanguageModel::find($id);
        if($language){
            return view('edit_language',compact('language'));

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
        $validator=Validator::make($request->all(),[
            'languageAr'=>'required|string',
            'languageEn'=>'required|string'
        ]);
        if($validator->fails()){
            return redirect()->back()->with()->withInput('error',$validator->messages()->first());
        }
        try{
            $language= LanguageModel::find($request->id);
            $update= $language->update([
           'language_name_ar'=>$request->languageAr,
           'language_name_en'=>$request->languageEn
            ]);
            return redirect('language')->with('success','Language information updated succesfully!');

        }
        catch(\Exception $e){
            $bug= $e->getMessage();
             return redirect()->back()->with('error', $bug);
        }
    }
    public function delete($id){
        $language= LanguageModel::find($id);
        if($language){
            $language->delete();
            return redirect('language')->with('success','Language is Deleted !');


        }
        else {
            return redirect('language')->with('success','Language is Not Deleted !');

        }
    }
}
