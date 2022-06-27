@extends('layouts.main') 
@section('title', 'Qulifaction')
@section('content')
@push('head')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
                        <i class="ik ik-map-pin bg-blue"> </i>
                        <div class="d-inline">
                            <h5>{{__('Qulification')}} </h5>
                            <span>{{__('Define Qulification')}}  </span>
</div>
</div>
</div>
<div class="col-lg-4">
    <nav class="breadcrumb-container" aria-label="breadcrumb">
<ol class="breadcrumb">
<li class="breadcrumb-item">
<a href="../index.html"><i class="ik ik-home"></i></a></li>
<li class="breadcrumb-item">
    <a href="#">{{__('Qulification')}} 
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
                <a href="#" data-url="{{ url('qulification/create') }}" class="btn btn-primary" data-ajax-popup="true" data-title="{{__('Create New Qulification')}}">
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
<h3>{{ __('List Qulification')}}</h3>
</div>
<div class="card-block">
<div class="table-responsive">
 <table class="table table-hover mb-0">
<thead>
<tr>
<th>
Qulification Name
</th>
<th>
Action
</th>
            </tr>
     </thead>
     @foreach($qulification as $qly)
     <tbody>
<tr  id="todo_{{$qly->id}}">
  
    <td class="ala">{{$qly->Qulification_name}}
</td>
<td>
<a href="#" class="edit-icon" 
data-url="{{url('qulification/edit/'.$qly->id)}}" 
data-ajax-popup="true" data-title="{{__('Edit Qulification')}}"
 data-toggle="tooltip" data-original-title="{{__('Edit')}}">
 <i class="fas fa-pencil-alt text-green"></i>
 </a>
<a href="#" class="delete-icon" data-toggle="tooltip"
 data-original-title="{{__('Delete')}}" 
 data-confirm="{{__('Are You Sure?').'|'
    .__('This action can you Delete. Do you want to continue?')}}" data-confirm-yes="document.getElementById('delete-form-{{$qly->id}}').submit();">
<i class="fas fa-trash text-red"></i>
</a>
{!! Form::open(['method' => 'GET', 'url' => 
    ['qlufication/delete', $qly->id],'id'=>
    'delete-form-'.$qly->id]) !!}
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




</div>
<script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="{{asset('js/qulification.js')}}"></script>
</script>
<script type="text/javascript">
$("#btn-save").click(function(e){
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
        e.preventDefault();

        var title =  $('#name').val();
       var url = $('#url').val();
       var state = $('#btn-save').val();
        $.ajax({
           url:url,
           method:'post',
           data:{
                  name:title, 
                },
           success:function(response){
              if(response.success){
                $('#message').html('<div id="alertFadeOut" style="color: green"> Successfully Added to Qulification!</div>'); // Diplay message with a fadeout
                 
                 $('#Qly').modal('hide');
             
              }else{

                $('#message').html('<div id="alertFadeOut" style="color: green"> Error Added to Qulification!</div>'); // Diplay message with a fadeout
                $('#Qly').modal('hide');
            }
           },
           error:function(error){
              console.log(error)
           }
        });
	});

</script>
<script type="text/javascript">






}

</script>
<script>
   

</script>

    <!-- push external head elem<>ents to head -->

@endsection
