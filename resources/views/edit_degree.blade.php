<div class="card bg-none card-box">
    {{Form::model($degree,array('url'=>'degree/update','method'=>'post'))}}
    <div class="row">
    <div class="form-group col-md-12">
        {{Form::hidden('id',$degree->id)}}
        {{Form::label('Degree Name',__('Degree Name'),['class'=>'form-control-label'])}}
     {{Form::text('Degree',$degree->degree_name,array('class'=>'form-control'))}}
    </div>
    <div class="col-12"style="margin-left:150px;">
<input type="submit" value="{{__('Update')}}" class="btn btn-primary">
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>
</div>
{{Form::close()}}
</div>