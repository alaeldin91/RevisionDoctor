<div class="card bg-none card-box">
    {{Form::model($experience,array('url'=>'experience/update','method'=>'post'))}}
    <div class="form-group col-md-10" style="margin-left:40px;">
    {{Form::hidden('id',$experience->id)}}
    {{Form::label('Experience Name Arabic',__('Experience Name Arabic'),['class'=>'form-control-label'])}}
    {{Form::text('experienceAr',$experience->experience_name_ar,array('class'=>'form-control is-valid'))}}
    {{Form::label('Experience Name English',__('Experience Name English',['class'=>'form-control-label','style'=>'margin-top:5px;']))}}
    {{Form::text('experienceEn',$experience->experience_name_er,array('class'=>'form-control is-valid'))}}
     
</div>
<div class="col-12" style="margin-left:150px;
margin-bottom:10px;">
<input type="submit" value="{{__('Update')}}" class="btn btn-primary" >
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>
</div>