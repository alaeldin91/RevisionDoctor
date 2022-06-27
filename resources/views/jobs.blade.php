@extends('layouts.main') 
@section('title', 'Jobs')
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
                    <i class="ik ik-users bg-blue"></i>
                        <div class="d-inline">
                            <h5>{{ __('Jobs')}}</h5>
                            <span>{{ __('List of Jobs')}}</span>
                            
</div>  
</div>
</div>
<div class="col-lg-4">
<nav class="breadcrumb-container" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="{{route('dashboard')}}"><i class="ik ik-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="#">{{ __(' List Jobs')}}</a>
</li>
 </ol>
</nav>
</div>
</div>
</div>
<div class="row">
@include('include.message')
<div class="col-md-12">
    <div class="card p-3">
        <div class="card-header">
        <h3>{{ __('List Jobs')}}</h3>
</div>
<div class="card-body">
<table id="job_table" class="table">
    <thead>
        <tr>
<th>
    Job Name
</th>
<th>
    Job Description

</th>
<th>
    Action

</th>
</thead>
<tbody>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
@push('script')
    <script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <!--server side users table script-->
    <script src="{{ asset('js/state.js') }}"></script>
    @endpush
@endsection