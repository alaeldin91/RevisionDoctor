<div class="card bg-none card-box">
{{Form::model($language,array('url'=>'language/update','method'=>'post'))}}
<div class="form-group col-md-10" style="margin-left:40px;">
{{Form::hidden('id',$language->id)}}
{{Form::label('Language Name Arabic',__('Language Name Arabic'),['class'=>'form-control-label'])}}
{{Form::text('languageAr',$language->language_name_ar,array('class'=>'form-control is-valid'))}}
{{Form::label('Language Name English',__('Language Name English'),['class'=>'form-control-label'])}}
{{Form::text('languageEn',$language->language_name_en,array('class'=>'form-control is-valid'))}}
</div>
<div class="col-12" style="margin-left:150px;
margin-bottom:10px;">
<input type="submit" value="{{__('Update')}}" class="btn btn-primary" >
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>
</div>