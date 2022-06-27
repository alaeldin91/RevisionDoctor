@extends('layouts.main') 
@section('title', $job->name_job)
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
                    <i class="ik ik-users bg-blue"></i>
                     <div class="d-inline">
                      <h5>{{ __('Edit Job')}}</h5>
                       <span>{{ __('Create new Job')}}</span>
</div>
</div>
</div>
<div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
    <a href="{{url('/')}}"> <i class="ik ik-home"></i></a>
</li>
<li class="breadcrumb-item">
{{ clean($job->name_job, 'titles')}}
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
<form class="forms-sample" method="POST" action="{{ url('/job/update') }}">
@csrf
<input type="hidden" name="id" value="{{$job->id}}">
<div class="row">
<div class="col-sm-6">
    <div class="form-group">
    <label for ="name">{{ __('Job Name')}} <span class="text-red">*</span> 
            <input id="name" type="text" 
            class="form-control @error('name')
             is-invalid @enderror" name="name" 
             value="{{ clean($job->name_job, 'titles')}}" required>
             <div class="help-block with-errors">
</div>
@error('area')
<span class="invalid-feedback" role="alert">
<strong>$message</strong>
</span>
@enderror
            
            </div>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea1">{{ __('Job Description')}}</label>
<textarea class="form-control" name="job_desc" id="job_name" 

rows="4">
{{ clean($job->job_desc, 'titles')}}
</textarea>
<div class="help-block with-errors">
</div>
@error('area')
<span class="invalid-feedback" role="alert">
<strong>$message</strong>
</span>
@enderror

</div>
<button type="submit" class="btn btn-primary mr-2">{{ __('Edit')}}</button>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection