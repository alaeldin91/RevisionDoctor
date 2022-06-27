<?php

namespace App\Http\Controllers;
use App\JobModel;
use Illuminate\Support\Facades\DB;
use App\CurrencyModel;
use App\Salary;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DataTables;
class SalaryControl extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('salary');
    }
    public function create(){
      
        try{
            $jobtype = JobModel::pluck('name_job','id');
            $currency =CurrencyModel::pluck('currency_name_ar','id');

            return view('create_salary', compact('jobtype','currency'));
        }
        catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);

        }


    }
    public function store(Request $request){
        $validator=Validator::make($request->all(),[
        'amount'=>'required']
    );
    if($validator->fails()){
        return redirect()->back()->withInput()->with('error',
        $validator->messsa->first());
        }
        try{
            $salary =Salary::create(
                [
                    'job_id'=>$request['job_id'],
                    'value'=>$request->amount,
                    
                    'currency_id'=>$request['currency_id'],

                ]
            );
            if($salary){
                return redirect('salary')->with('success','Salary created succesfully!');
            }
            else {
                return redirect('salary')->with('success','Salary is  Error');

            }
        }
        catch (\Exception $e) {
            $bug = $e->getMessage();
            return redirect()->back()->with('error', $bug);
        }

    }
    public function getSalary(Request $request){
        $data = DB::table('salaries')
        ->join('job_models', 'salaries.job_id', '=', 'job_models.id')
        ->join('currency_models', 'salaries.currency_id', '=', 'currency_models.id')
        ->select('salaries.*', 'job_models.name_job', 'currency_models.currency_name_ar')
        ->get();
        // $data = SalaryModel::get('*');
        return Datatables::of($data)->

        addIndexColumn()->addColumn('action',function($data){
            return '<div class="table-actions">
            <a href ="'.url('salary/edit/'.$data->id).'" id="edit-item" name="edit-item" data-target-id="'.$data->id.'"  data-toggle="modal" data-target="edit-modal"><i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>

            
              <a href="'.url('salary/delete/'.$data->id).'"  ><i class="ik ik-trash-2 f-16 text-red"></i></a>
              </div>';
               })->rawColumns(['action'])->make(true);


 




    }
public function edit($id){
    try{
        $data = DB::table('salary_models')
        ->join('job_models', 'salary_models.job_id', '=', 'job_models.id')
        ->join('currency_models', 'salary_models.currency_id', '=', 'currency_models.id')
        ->select('salary_models.*', 'job_models.name_job', 'currency_models.currency_name_ar')->where('id',$id)
        ->get();
        if($data){
            return view('edit_salary',compact('data'));
        }
        else{

        }
    }
    catch(\Exception $e){
        $bug=$e->getMessage();
        return redirect()->back()->with('error',$bug);

    }
}
    
}
