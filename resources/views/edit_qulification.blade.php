<div class="card bg-none card-box">
{{Form::model($qly,array('url'=>'qulification/update','method'=>'post'))}}

<div class="row">
        <div class="form-group col-md-12">
            {{Form::hidden('id',$qly->id)}}
        {{Form::label('Qulification Name',__('Qulification Name'),['class'=>'form-control-label'])}}
            {{Form::text('Qulification',$qly->Qulification_name,array('class'=>'form-control'))}}
</div>
<div class="col-12"style="margin-left:150px;">
<input type="submit" value="{{__('Update')}}" class="btn btn-primary">
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>

</div>
{{Form::close()}}
</div>