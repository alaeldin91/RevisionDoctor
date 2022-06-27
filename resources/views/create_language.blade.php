<div class="card bg-none card-box">
    {{Form::open(array('url'=>'language/store','method'=>'post'))}}
    <div class="form-group col-md-10" style="margin-left:40px;">
    {{Form::label('Language Name Arabic',__('Language Name Arabic'),[
        'class'=>'form-control-label','style'=>'margin-left:3px;'])}}
        {{Form::text('languageAr',null,array('class'=>'form-control is-valid'))}}
        {{Form::label('Language Name English',__('Language Name English'),[
            'class'=>'form-control-label','style'=>'margin-left:3px;
            margin-top:10px;'])}}
            {{Form::text('languageen',null,array('class'=>'form-control is-valid'))}}
    </div>
    <div class="col-12" style="margin-left:150px;
     margin-bottom:10px;">
   <input type="submit" value="{{__('Create')}}" class="btn btn-primary" >
   <input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
        </div>
        </div>