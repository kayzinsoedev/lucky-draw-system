@extends('layouts.app')
@section('content_header')
@stop

@section('content')

<div class="row">
	<div class="col-md-12">
      <div class="box-header with-border">
          <div class="col-md-10 text-center">
              <h3>Winning Result</h3>
          </div>
      </div>
  </div>
</div>
<hr>
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10">
      <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">Winning Prize Type</th>
              <th scope="col">Winning Number</th>
            </tr>
          </thead>
          <tbody>
            @foreach($winning_results as $key=> $winning_result)
              <tr>
                <td>{{$winning_result->prizeType->name}}</td>
                <td>{{$winning_result->winning_number}}</td>
                
              </tr>
            @endforeach                 
          </tbody>
      </table>
  </div>
  <div class="col-md-1"></div>
</div>
@stop

@section('css')


@stop


@section('js')
<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

@endsection
