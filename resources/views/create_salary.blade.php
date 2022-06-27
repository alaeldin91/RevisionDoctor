
<div class="card bg-none card-box">
{{ Form::open(array('url' => 'salary/store', 'method'=>'post')) }}
<div class="form-group col-md-12">
    <div class="input-group">
    {{ Form::label('type', __(' Job Name'),['class'=>'form-control-label' ,'style'=>'margin-right:5px;
        margin-top:10px;'])}}
    {{Form::select('jobtype[]',$jobtype,null,['class'=>'form-control select2 ','required'=>'required','name'=>'job_id'])}}
</div>
</div>
<div class="form-group col-md-12">
    <div class="input-group">
        {{Form::label('Currency',__('Currency'),['class'=>'Form-control-label','style'=>'margin-right:10px;
            margin-top:10px;'])}}
            {{Form::select('currency[]',$currency,null,['class'=>'form-control select2 ','required'=>'required','name'=>'currency_id'])}}
        </div>
    </div>
    <div class="form-group col-md-12">
    <div class="input-group">
    {{ Form::label('amount', __('Amount'),['class'=>'form-control-label','style'=>'margin-right:15px;margin-top:10px;']) }}
    {{ Form::number('amount',null, array('class' => 'form-control ','required'=>'required','step'=>'100')) }}
        </div>
    </div>
    <div class="col-12" style="margin-left:150px;">
<input type="submit" value="{{__('Create')}}" class="btn btn-primary">
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>
</div>