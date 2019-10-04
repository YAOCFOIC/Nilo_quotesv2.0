<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>www.nilo.app</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
</head>
<body>
	<form action="{{action('EventController@update',$id)}}" method="GET">
		<input type="hidden" name="_method" value="PUT">
		{{csrf_field()}}
		<div class="container">
			<div class="jumbotron">
				<h1>Actualiza la cita</h1>
				
				<hr>
				<input type="hidden" name="_method" value="UPDATE">
			</div>
			<div class="form-group">
				<label for="">Tipo</label>
				<input type="text" name="title" class="form-control" value="{{$events->title}}">
			</div>
			<div class="form-group">
				<label for="">color</label>
				<input type="color" name="color" class="form-control" value="{{$events->color}}">
			</div>
			<div class="form-group">
				<label for="">Fecha inicial</label>
				<input type="datetime" name="start_date" class="form-control" value="{{$events->start_date}}">
			</div>
			<div class="form-group">
				<label for="">Fecha Final</label>
				<input type="datetime" name="end_date" class="form-control" value="{{$events->end_date}}">
			</div>
			
			<button type="submit" name="submit" class="btn btn-success">Actualizar Cita</button>	
		</div>
	</form>
</body>
</html>