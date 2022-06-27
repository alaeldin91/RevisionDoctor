<div class="card bg-none card-box">
{{Form::model($currency,array('url'=>'currency/update','method'=>'post'))}}
<div class="form-group col-md-10" style="margin-left:40px;">
    {{Form::hidden('id',$currency->id)}}
    {{Form::label('currency Name Arabic',__('Currency Name Arabic'),['class'=>'form-control-label'])}}
    {{Form::text('currencyAr',$currency->currency_name_ar,array('class'=>'form-control is-valid'))}}
{{Form::label('currency Name English',__('Currency Name English'),['class'=>'form-control'])}}
{{Form::text('currencyen',$currency->currency_name_en,array('class'=>'form-control is-valid'))}}
</div>
<div class="col-12"style="margin-left:150px;">
<input type="submit" value="{{__('Update')}}" class="btn btn-primary">
<input type="button" value="{{__('Cancel')}}" class="btn btn-default" data-dismiss="modal">
</div>
</div>