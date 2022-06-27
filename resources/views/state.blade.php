@extends('layouts.main') 
@section('title', 'State')
@section('content')
    <!-- push external head elements to head -->
    @push('head')
        <link rel="stylesheet" href="{{ asset('plugins/DataTables/datatables.min.css') }}">
    @endpush
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-map-pin bg-blue"> </i>
                    <div class="d-inline">
                    <h5>{{ __('State')}}</h5>
                    <span>{{ __('Define State')}}
</span>
</div>
</div>
</div>
<div class="col-lg-4">
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="../index.html"><i class="ik ik-home"></i></a></li>
        <li class="breadcrumb-item">
            <a href="#">{{__('State')}}
</li>
</ol>
</nav>
</div>
</div>
</div>
<div class="row clearfix">
@include('include.message')
@can('manage state')
<div class="col-md-12">
    <div class="card">
    <div class="card-header"> <h3> {{__('Add State')}}
</h3>
</div>
<div class="card-body">
    <form class="forms-sample" method="POST" action="{{url('state/create')}}">
        @csrf 
<div class="row">
<div class="col-sm-5">
<div class="form-group">
    <label for="role">{{ __('State')}}<span class="text-red">*</span></label>
        <input type="text" name="state" id ="state" placeholder="Enter State Name"  class="form-control @error('name') is-invalid @enderror" name="name" value=" " placeholder="Enter user name">
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

</form>
</div>
</div>
</div>
@endcan
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
        <div class="card-header"><h3>{{ __('State')}}</h3></div>
	  <div class="card-body">
          <table class="table table-bordered data-table"
           id="state_table">
<thead>
<tr>
<th>
No
</th>
<th style=" width:50; margin:0 auto;">
Name
</th>
<th>
Action
</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/state.js') }}"></script>
	@endpush
@endsection