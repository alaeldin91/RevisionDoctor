@extends('layouts.main') 
@section('title', $unit->unit_name)
@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endpush
<div class="container-fluid">
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="ik ik-inbox bg-blue bg-blue"></i>
                <div class="d-inline">
    <h5>{{ __('Edit Unit')}}</h5>
    <span>{{ __('Create new Unit')}}</span>
     </div>
</div>
</div>
<div class="col-lg-4">
    <nav class="breadcrumb-container"  aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="{{url('/')}}"> <i class="ik ik-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="#">{{ __('State')}}</a>
</li>
<li class="breadcrumb-item">
{{$unit->unit_name}}
</li>
</ol>
</nav>
</div>
</div>
</div>
<div class="row">
@include('include.message')
<div class="col-md-12">
<div class="card">
<div class="card-body">
<form class="forms-sample" method="POST" action="{{ url('unit/update') }}">
@csrf 
<input type="hidden" name="id" value="{{$unit->id}}">
<div class="row">
    <div class="col-sm-6">
        <div class="col-sm-6">
        <div class="form-group">
        <label for ="name">{{ __('Unit Name')}} <span class="text-red">*</span> 
            <input id="name" type="text" 
            class="form-control @error('name')
             is-invalid @enderror" name="name" 
             value="{{$unit->unit_name}}" required>
             <div class="help-block with-errors"></div>
            @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{$message}} </strong>
          </span>
         @enderror
</div>
<div class="form-group">
<button type="submit" class="btn btn-primary btn-rounded">{{ __('Save')}}</button>
</div>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection
