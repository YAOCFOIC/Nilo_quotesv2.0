@extends('layouts.app')

 

@section('content')
	<form action="{{route('statusedit',$id)}}" method="GET">
		<input type="hidden" name="_method" value="PUT">
		{{csrf_field()}}
		<div class="container">
			<div class="jumbotron">
				<h1 class="text-center">El estado de la cita</h1>
				
				<hr>
				<input type="hidden" name="_method" value="UPDATE">
			</div>

			<div class="form-group">
				<label for="">Estado</label>
				<input type="datetime" name="status" class="form-control" value="{{$events->status}}">
			</div>
			
			
			<button type="submit" name="submit" class="btn btn-success">Actualizar Cita</button>	
		</div>
	</form>
@endsection
