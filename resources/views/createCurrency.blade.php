<div class="card bg-none card-box">
{{Form::open(array('url'=>'currency/store', 'method'=>'post'))}}
<div class="form-group col-md-10" style="margin-left:40px;">
    {{Form::label('Currency Name Arabic',__('Currency Name Arabic'),['class'=>'form-control-label'])}}
    {{Form::Text('currencyAr',null,array('class'=>'form-control is-valid'))}}
    {{Form::label('Currency Name Arabic',__('Currency Name English'),['class'=>'form-control-label'])}}
    {{Form::Text('currencyen',null,array('class'=>'form-control is-valid'))}}
</div>
<div class="col-12" style="margin-left:150px;">
<input type="submit" value="{{__('Create')}}" class="btn btn-primary">
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>
</div>