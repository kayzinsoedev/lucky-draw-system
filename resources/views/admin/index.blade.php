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
	      	<h3 class="box-title"><b>Lucky Draw</b></h3>
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
						{!! Form::open(['url'=>'draw','class'=>'', 'id' => 'ajax-form','method'=>'post', 'files' => true]) !!}
	              	@csrf
                  	<div class="box box-primary">
                      	<div class="box-body">
                          	<div class="form-group">
							    <div class ="row">
								 	<div class="col-md-4">
										{!! Form::Label('prize_type', 'Prize Types *') !!}
    									{!! Form::select('prize_type', $prize_types, null, ['id'=>'prize-type','class' => 'form-control']) !!}
											 
								 	</div>
                            	</div>	

                            	<div class ="row">
								 	<div class="col-md-4">
										{!! Form::Label('generate_randomly', 'Generate Randomly') !!}
    									<select class="form-control" id="generate-randomly" required name="generate_randomly">
										    <option value="">please select</option>
										    <option value="1">yes</option>
										    <option value="2">no</option>
										</select>	 
								 	</div>
                            	</div>	

                            	<div class ="row">
								 	<div class="col-md-4">
										{!! Form::Label('winning_number', 'Winning Number') !!}
    									<input type="text" name="winning_number" id="winning-number" value="" class="form-control" readonly="" required> 
								 	</div>
                            	</div>					
                      		</div>
                  		</div>

                  		<div class="box-footer">
                          	<button type ="submit" class ="btn bg-blue btn-flat margin draw" >Draw</button>
                      	</div>
                  	</div>
                	{!! Form::close() !!}
              	</div>
          	</div>
      	</section>
  	</div>
</div>
@stop

@section('css')
@stop

@section('js')
<script>
	$(document).ready(function() {

		$( "#generate-randomly" ).change(function() {

		  	var selectObject = document.getElementById("generate-randomly");
		  	var selectValue = selectObject.options[selectObject.selectedIndex].value;
		  	console.log(selectValue);
		  	if(selectValue == 1){
	  			$("#winning-number").prop("readonly",true);
		  	}
		  	else if(selectValue == 2){
		  		$("#winning-number").removeAttr("readonly");
		  	}
		});


		// $('.draw').on("click" , function(){
		// 	var prizeObject = document.getElementById("prize-type");
  //     		var prize_type = prizeObject.options[prizeObject.selectedIndex].value;
  //     		var winning_number = document.getElementById("winning-number").value;
		// 	$.ajax({ 
		//         type: "POST",
		//         url: 'draw',
		//         data: {
		//         	"prize_type" : prize_type,
		//         	"winning_number" : winning_number
		//     	},
		//         contentType: "application/json; charset=utf-8",
		//         dataType: "json",
		//         success: function(data){
  //                   alert("success");
  //               }
		        
		//     });
		// });

	});
</script>
@endsection
