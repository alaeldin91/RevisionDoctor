@extends('layouts.main') 
@section('title', 'Degree')
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
                 <i class="ik ik-users bg-blue"> </i>
                 <div class="d-inline">
                     <h5>{{__('Degree')}} </h5>
                     <span>{{__('Define Degree')}}  </span>
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
    <a href="#">{{__('Degree')}} 
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
<a href="#" data-url="{{ url('degree/create') }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{__('Create New Degree')}}">
<i class="fa fa-plus"></i> {{__('Create')}}
</a>
</div>
</div>
@endcan
</div>
<div class="row">
    <div class="col-xl-8 col-md-6">
        <div class="card table-card">
       
            <div class="card-header">
            <h3>{{ __('List Degree')}}</h3>
</div>
<div class="card-block">
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
                <tr>
                    <th>
                        Degree Name
</th>
<th>
    Action
</th>
</tr>
</thead>
@foreach($degree as $deg)
<tbody>
<tr id="todo_{{$deg->id}}">
<td>{{$deg->degree_name}}</td>
<td>
<a href="#" class="edit-icon" 
data-url="{{url('degree/edit/'.$deg->id)}}" 
data-ajax-popup="true" data-title="{{__('Edit Degree')}}"
 data-toggle="tooltip" data-original-title="{{__('Edit')}}">
 <i class="fas fa-pencil-alt text-green" style="margin:5px;"></i>
 </a>
 <a href="#" class="delete-icon" data-toggle="tooltip"
 data-original-title="{{__('Delete')}}" 
 data-confirm="{{__('Are You Sure?').'|'
    .__('This action can you Delete. Do you want to continue?')}}"
     data-confirm-yes="document.getElementById('delete-form-{{$deg->id}}').submit();">
<i class="fas fa-trash text-red"  style="margin:5px;"></i>
</a>
{!! Form::open(['method' => 'GET', 'url' => 
    ['degree/delete', $deg->id],'id'=>
    'delete-form-'.$deg->id]) !!}
{!! Form::close() !!}
</td>
</tr>

</tbody>

@endforeach
</table>
</div>
</div>
</div>

</div>
@endsection