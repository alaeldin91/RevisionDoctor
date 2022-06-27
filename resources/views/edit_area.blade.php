@extends('layouts.main') 
@foreach($state as $state)
@section('title', $state->name)
@endforeach
@section('content')
@push('head')
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
@endpush
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
             <div class="page-header-title">
                <i class="ik ik-map-pin bg-blue"> </i>
                 <div class="d-inline">
                  <h5>{{ __('Edit Area')}}</h5>
                     <span>{{ __('Create new Area')}}</span>
    </div>
</div>
</div>
<div class ="col-lg-4">
<nav class ="breadcrumb-container"  aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/')}}"> <i class="ik ik-home"></i></a>
             </li>
                   <li class="breadcrumb-item">
                      <a href="#">{{ __('State')}}</a>
                  </li>
               <li class="breadcrumb-item">
       {{$state->name}}
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
<form class="forms-sample" method="POST" action="{{ url('area/update') }}">
@csrf 
<input type="hidden" name="id" value="{{$state->id}}">
<div class="row">
<div class="col-sm-6">
    <div class="form-group">
    <label for ="name">{{ __('Area Name')}} <span class="text-red">*</span> 
            <input id="name" type="text" 
            class="form-control @error('name')
             is-invalid @enderror" name="name" 
             value="{{$state->areaName}}" required>
</div>
</div>
<div class="col-sm-6">
    <div class="form-group">
        <label for ="state">{{__('State')}} <span class="text-red">*</span>
<select class="form-control select2" name="state">
    @foreach($area as $area)
<option value="{{$area->id}}"{{$state->state_id ==$area->id ? 
    'selected="selected"':''}}>
    {{
        $area->name
    }}
</option>
@endforeach
    </select>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<button type="submit" class="btn btn-primary btn-rounded">{{__('Save')}} </button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection