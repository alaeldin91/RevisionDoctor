<div class="card bg-none card-box">
{{Form::open(array('url'=>'qulification/store','method'=>'post'))}}
<div class="form-group col-md-12">
    {{Form::label('Qulification Name',
        __('Qulifaction Name'),['class'=>'form-control-label'])}}
    {{Form::Text('Qulification',null,array('class'=>'form-control'))}}
</div>
<div class="col-12" style="margin-left:150px;">
<input type="submit" value="{{__('Create')}}" class="btn btn-primary">
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>
</div>