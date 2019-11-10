@extends('adminlte::page')

@section('title', 'Lucky Draw System')

@section('content_header')
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
	@if (session('status'))
	    <div class="alert alert-success">
	    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	        {{ session('status') }}
	    </div>
	@endif
	</div>
</div>

<div class="row">
	<div class="col-md-12">
	    <div class="box-header with-border">
	      	<h1 class=""><b>Member Portal</b></h1>
	    </div>
      	<section class="content">
          	<div class ="row">
              	<div class="col-md-12">
	                @if ($errors->any())
	                    <div class="alert alert-danger">
	                      <ul>
	                          @foreach ($errors->all() as $error)
	                            <li>{{ $error }}</li>
	                          @endforeach
	                      </ul>
	                    </div><br />
	                @endif
						{!! Form::open(['url'=>'member','class'=>'', 'id' => 'ajax-form','method'=>'post', 'files' => true]) !!}
	              	@csrf
                  	<div class="box box-primary">
                      	<div class="box-body">
                          	<div class="form-group">
							    <div class ="row">
								 	<div class="col-md-4">
								 		{!! Form::Label('name', 'User Name') !!}
									    	<input type="text" name="name" id="name" value="" class="form-control" required=""> 
									</div>
                            	</div>	
                            </div>
                            <div class="form-group">
                            	<div class ="row">
								 	<div class="col-md-8">
										{!! Form::Label('user_winning_number', 'Winning Number') !!}
										<button type="button" class="btn bg-green btn-flat" value="Add Row" id="add-row">Add More Winning Number</button>
										{{--<button type="button" class="btn bg-red btn-flat" value="Delete Row" id="del-row">Delete Winning Number</button>--}}												
								 	</div>
                            	</div>			
                      		</div>

                      		<div class="form-group">
                      			<div class ="row">
                      				<div class="col-md-4">
	                      				<div id="multi-row">
											<input type="text" name="user_winning_number[]" id="winning-number" value="" class="form-control" required=""> 
	    								</div>
    								</div>
                      			</div>
                      		</div>

                  		</div>

                  		<div class="box-footer">
                          	<button type ="submit" class ="btn bg-blue btn-flat margin">Generate</button>
                      	</div>
                  	</div>
                	{!! Form::close() !!}
              	</div>
          	</div>
      	</section>
  	</div>
</div>

{{--@if( count($winning_users) >0 )--}}
	{{--<div class="row">--}}
		{{--<div class="col-md-12">--}}
		    {{--<div class="box-header with-border">--}}
		      	{{--<h2 class=""><b>User List</b></h2>--}}
		    {{--</div>--}}
		    {{--<div class="box-body">--}}
		    	{{--<div class="row">--}}
		    		{{--<table id="example" class="table table-striped table-bordered" style="width:100%">--}}
		    			{{--<thead>--}}
		    				{{--<tr>--}}
		    					{{--<th>Name</th>--}}
		    					{{--@for ($i = 1; $i <= $most_winning_number; $i++)--}}
		    						{{--<th>Winning Number{{$i}}</th>--}}
		    					{{--@endfor--}}
		    				{{--</tr>--}}
		    				{{--@foreach($user_names as $key=> $user_name)--}}
		    				{{--<tr>--}}
		    					{{--<td>{{$user_name}}</td>--}}		    						    					
		    				{{--</tr>--}}
		    				{{--@endforeach--}}
		    			{{--</thead>--}}
		    		{{--</table>--}}
		     	{{--</div>--}}
		    {{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
{{--@endif--}}
@stop

@section('css')
@stop

@section('js')
<script>
	$(document).ready(function() {
		var x=1
		$("#add-row").click(function () {
		    var e = document.getElementById('append')
			$("#multi-row").append('<br><input type="text" name="user_winning_number[]" id="winning-number" value="" class="form-control" >');
		});

		$("#del-row").click(function(){
			// $(this).parent().remove();
			console.log($("#multi-row").length);

		});

		// $('#example').DataTable();
	});
</script>
@endsection
