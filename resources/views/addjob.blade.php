@extends('layouts.main') 
@section('title', 'Add Job')
@section('content')
    <!-- push external head elements to head -->
 @push('head')
<link rel="stylesheet" href="{{ asset('plugins/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/summernote/dist/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/mohithg-switchery/dist/switchery.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
@endpush
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue bg-blue"></i>
                     <div class="d-inline">
                        <h5>{{__('Job')}} </h5>
                         <span>{{__('Define Job')}}  </span>
</div>
</div>
</div>
<div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a href="../index.html"><i class="ik ik-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="#">{{__('Job')}} 
</li>
</ol>
</nav>
</div>
</div>
</div>
<div class="row clearfix">
@include('include.message')
@can('manage hr')
<div class="col-md-12">
<div class="card">
    <div class="card-header">
    <h3>{{__('Add Job')}} </h3>
</div>
<div class="card-body">
<form class="forms-sample" method="POST"  action="{{url('job/create')}}">
@csrf 
<div class="row">
    <div class="col-sm-5"> 
    <div class="form-group">
        <label for="job">Job Name <span class="text-red"> * </spa> </label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
        placeholder="Enter Job name" value="">
</div>

</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="exampleTextarea1">{{ __('Job Description')}}</label>
<textarea class="form-control" name="job_desc" id="exampleTextarea1" rows="4"></textarea>
</div>
<button type="submit" class="btn btn-primary mr-2">{{ __('Submit')}}</button>
</div>
</div>
</div>
</div>
</div>
@endcan
</div>
</div>

@push('script')
 <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/summernote/dist/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ asset('plugins/jquery.repeater/jquery.repeater.min.js') }}"></script>
<script src="{{ asset('plugins/mohithg-switchery/dist/switchery.min.js') }}"></script>
      
<script src="{{ asset('js/form-advanced.js') }}"></script>
    @endpush
@endsection
