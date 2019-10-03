<!DOCclass="form-control" TYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<div class="jumbotron">
			<div class="row">
				<div class="cold-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="panel-heading" style="background: #2e6da4;color: white;" >
							Agendamiento de Citas Nilo
						</div>
						<div class="panel-body">
							<h1 class="text-center">Información</h1>
							<form action="{{action('EventController@store')}}" method="POST">
								{{ csrf_field() }}
								<div class="form-group">
									<label for="">Tipo de Cita</label>
									<select name="title"  class="form-control" value="{{old('title')}}">
									  <option selected>Selecciona el tipo de cita</option>
									  <option value="Llamada">Llamada</option>
									  <option value="Chat">Chat</option>
									  <option value="Tour Nilo">Tour Nilo</option>
									</select>
									
									
								</div>
								<hidden>
								<div class="form-group">
									<label for="">Color</label>
									<input type="color" class="form-control" name="color" placeholder="Color" value="{{old('color')}}">
								</div>
							</hidden>
								<div class="form-group">
									<label for="">Fecha Inical</label>
									<input type="datetime-local" class="form-control" name="start_date" placeholder="Fecha inical" class="date" min="{{date('d-m-Y')}}" value="{{old('start_date')}}">
								</div>
								<div class="form-group">
									<label for="">Fecha Final</label>
									<input type="datetime-local" class="form-control" name="end_date" placeholder="Fecha Final" class="date" value="{{old('end_date')}}">
								</div>
								<input type="submit" class="btn btn-primary" value="Agregar Cita">
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>