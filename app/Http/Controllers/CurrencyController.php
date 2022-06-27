<?php

namespace App\Http\Controllers;

use App\CurrencyModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;

class CurrencyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $currency= CurrencyModel::get();
        return view('currency',compact('currency'));
    }
    public function create(){
        return view('createCurrency');
    }
public function store(Request $request){
    $validator = Validator::make($request->all(),[
     'currencyAr'=>'required|string',
     'currencyen'=>'required|string'
    ]);
    if($validator->fails()){
        return redirect()->back()->with()->withInput('error',$validtor->messages()->first());
    }
    try{
    $currency= CurrencyModel::create([
   'currency_name_ar'=>$request->currencyAr,
   'currency_name_en'=>$request->currencyen
    ]);
    if($currency){
        return redirect('currency')->with('success','currency created success !');

    }
    else{
        return redirect('currency')->with('error','Currency created error!');

    }
    }
    catch(\Exception $e){
        $bug=$e->getMessage();
        return redirect()->back()->with('error',$bug);

    }

}
public function edit($id){
    try{
        $currency= CurrencyModel::find($id);
        if($currency){
            return view('edit_currency',compact('currency'));

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
        'currencyAr'=>'required|string',
        'currencyen'=>'required|string'
    ]);
    if($validator->fails())
    {
          return redirect()->back()->withInput()->with('error',$validator->messages()->first());
    }
    try{
        $currency=CurrencyModel::find($request->id);
        $update=$currency->update(
            [
                'currency_name_ar'=>$request->currencyAr,
                'currency_name_en'=>$request->currencyen
            ]
        );
        return redirect('currency')->with('success', 'Currency information updated succesfully!');

    }
    catch(\Exception $e){
        $bug= $e->getMessage();
        return redirect()->back()->with('error', $bug);



}

}
public function Delete($id){
    $currency=CurrencyModel::find($id);
    if($currency){
        $currency->delete();
        return redirect('currency')->with('success','Currency is Deleted !');


    }
    else {

        return redirect('currency')->with('error','Currency is Removed');
    }

}
}