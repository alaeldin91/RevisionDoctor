@extends('layouts.main') 
@section('title', $state->name)
@section('content')
    <!-- push external head elements to head -->
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
    <h5>{{ __('Edit State')}}</h5>
    <span>{{ __('Create new State')}}</span>
     </div>
</div>
</div>
<div class="col-lg-4">
                    <nav class="breadcrumb-container" aria-label="breadcrumb">
    <nav class="breadcrumb-container"  aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{url('/')}}"> <i class="ik ik-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="#">{{ __('State')}}</a>
</li>
<li class="breadcrumb-item">
{{ $state->state_name}}
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
<form class="forms-sample" method="POST" action="{{ url('state/update') }}">
@csrf 
<input type="hidden" name="id" value="{{$state->id}}">
<div class="row">
    <div class="col-sm-6">
        <div class="col-sm-6">
        <div class="form-group">
            <label for ="name">{{ __('state Name')}} <span class="text-red">*</span> 
            <input id="name" type="text" 
            class="form-control @error('name')
             is-invalid @enderror" name="name" 
             value="{{ $state->name}}" required>
             <div class="help-block with-errors"></div>
            
           
             @error('name')
           <span class="invalid-feedback" role="alert">
               <strong>{{$message}} </strong>
           </span>
          @enderror
          </div>
       <div class="form-group">
        <button type="submit" class="btn btn-primary btn-rounded">{{ __('Update')}}</button>
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
</div>
@endsection