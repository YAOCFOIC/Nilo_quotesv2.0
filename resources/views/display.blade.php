<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>www.nilo.app</title>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{'css/bootstrap.min.css'}}">
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<table class="table table-striped table-hover table-bordered">
				<thead class="thead">
					<tr>
						<th>Id</th>
						<th>Tipo</th>
						<th>Color</th>
						<th>Fecha inicial</th>
						<th>Fecha final</th>
						<th>Correo</th>
						<th>Update</th>
						<th>Delete</th>
					</tr>
				</thead>
				<tbody>
					@foreach($events as $event)
					<tr>
						<td>{{$event->id}}</td>
						<td>{{$event->title}}</td>
						<td>{{$event->color}}</td>
						<td>{{$event->start_date}}</td>
						<td>{{$event->end_date}}</td>
						<td>{{$event->user()->email}}</td>
						<th>
							<a href="{{action('EventController@edit',$event['id'])}}" class="btn btn-success">
								<i class="glyphicon glyphicon-dit"> 
								</i>
								Editar Cita
							</a>
						</th>
						<th>
							<form action="{{action('EventController@destroy',$event['id'])}}" method="POST">
								{{ csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-danger" onclick="return confirm('Quiere borrar registro?')">
									<i class="glyphicon glyphicon-trash"></i>Elimiar Cita
								</button>
							</form>
						</th>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
</html>