@extends('layouts.main') 
@section('title', 'Salary')
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
                    <i class="ik ik-calendar bg-blue"></i>
                    <div class="d-inline">
                          <h5>{{__('Salary')}} </h5>
                          <span>{{__('Define Salary')}}  </span>
</div>
</div>
</div>
<div class ="col-lg-4">
<nav class="breadcrumb-container" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
        <a href="../index.html"><i class="ik ik-home"></i></a>
</li>
<li class="breadcrumb-item">
<a href="#">{{__('Salary')}} 
</a>

</li>
</ol>
</nav>
</div>
</div>
</div>
@if(session('success'))
<div class="alert alert-success">
{{session('success')}}
</div>
@endif
@if(session('success'))
<div class="alert alert-error">
{{session('error')}}
</div>
@endif
<div class="all-button-box row d-flex justify-content-end">
@can('manage hr')
<div class="col-auto my-custom">
<a href="#" data-url="{{ url('salary/create') }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{__('Create New Salary')}}">
<i class="fa fa-plus"></i> {{__('Create')}}
</a>
</div>
@endcan

</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card p-3">
            

        <table class="table" id="table_salary">
            <thead>
                <tr>
<th>
Name job
</th>
<th>
    Name Currency
</th>
<th>
    Value
</th>
<th align="center" style="text-align:right;">
    Action
</th>
</tr>
<tbody>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
<script>
    </script>
@push('script')
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
    <script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
    <script src="{{ asset('js/salary.js') }}"></script>
    @endpush
@endsection