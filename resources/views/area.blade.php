@extends('layouts.main')
@section('title', 'Area')
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
                        <h5>{{__('Area')}} </h5>
                        <span>{{__('Define Area')}} </span>
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
                            <a href="#">{{__('Area')}}
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
                <div class="card-header">
                    <h3>{{__('Add Area')}} </h3>
                </div>
                <div class="card-body">
                    <form class="forms-sample" method="POST" action="{{url('area/create')}}">
                        @csrf
                        <div class="row">
                            <div class="col-sm-5">
                                <div class="form-group">
                                    <label for="Area"> Area Name <span class="text-red">*</label>
                                    <input type="text" name="area" id="area" class="form-control @error('name') is-invalid @enderror" name="name" value="" placeholder="Enter Area name">
                                    <div class="help-block with-errors"> </div>
                                    @error('area')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>$message</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="state">{{__('State')}} <span class="text-red">*</span>

                                        {!!Form::select('areas[]',$area,null,['class'=>'form-control select2','name'=>'state_id'])!!}
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
    @endcan
</div>
<div class="row">
    <div class="col-xl-8 col-md-6">
        <div class="card table-card">
            <div class="card-header">
                <h3>{{ __('Add Area')}}</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li> <i class="ik ik-chevron-left action-toggle"></i></li>
                        <li> <i class="ik ik-minus minimize-card"> </i> </li>
                        <li> <i class="ik ik-x close-card"> </i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div class="table-responsive">

                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                <th>
                                    State Name
                                </th>
                                <th>
                                    Area Name
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        @foreach($state as $state)


                        <tbody>

                            <tr>
                                <td>{{$state->areaName}}
                                </td>

                                <td>{{$state->name}}
                                </td>
                                <td>
                                    <a href="{{url('area/edit/'.$state->id)}}">
                                        <i class="ik ik-edit-2 f-16 mr-15 text-green"></i></a>
                                    <a href="{{url('area/delete/'.$state->id)}}">
                                        <i class="ik ik-trash-2 f-16 text-red"></i></a>
                                </td>
                            </tr>
                        </tbody @endforeach>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div id="datepickerwidget"></div>
            </div>
        </div>
    </div>
</div>
</div>
@push('script')
<script src="{{ asset('plugins/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('plugins/DataTables/Cell-edit/dataTables.cellEdit.js') }}"></script>
<!--server side permission table script-->

<script src="{{ asset('plugins/moment/moment.js') }}"></script>
<script src="{{ asset('plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>

<script src="{{ asset('js/widgets.js') }}"></script>
@endpush
@endsection