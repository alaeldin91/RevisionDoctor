<!doctype html>
<html lang="en" dir="{{env('SITE_RTL') == 'on'?'rtl':''}}">

<head>
	<title>@yield('title','') |Dash Board Hospital Management System</title>
	<!-- initiate head with meta tags, css and script -->
	@include('include.head')

</head>
<body id="app" >
    <div class="wrapper">
    	<!-- initiate header-->
    	@include('include.header')
    	<div class="page-wrap">
	    	<!-- initiate sidebar-->
	    	@include('include.sidebar')

	    	<div class="main-content">
	    		<!-- yeild contents here -->
	    		@yield('content')
	    	</div>

	    	<!-- initiate chat section-->


	    	<!-- initiate footer section-->

    	</div>
    </div>
    <div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
				<div class="modal-title">
                <h4 class="h4 font-weight-200 float-left modal-title" id="exampleModalLabel"></h4>
</div>
				<div class="close">
                <a href="#" class="more-text widget-text float-right close-icon" data-dismiss="modal" aria-label="Close" ><span>x</span></a>
            </div>
</div>

            <div class="modal-body">
            </div>
			<div class="modal-footer">
</div>
        </div>
    </div>
</div>


{{--Side Modal--}}
<div class="modal fade fixed-right" id="commonModal-right" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="scrollbar-inner">
        <div class="min-h-300 mh-300">
        </div>
    </div>
</div>
	<!-- initiate modal menu section-->
	

	<!-- initiate scripts-->
	@include('include.script')	
</body>
</html>