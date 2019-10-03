<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="{{'css/bootstrap.min.css'}}" >
	<script src="{{'js/jquery.js'}}"> </script>
    <script src="{{'js/Moment.js'}}"> </script>
    <script src="{{'js/fullcalendar.min.js'}}"> </script>
    <link rel="stylesheet" href="{{'css/fullcalender.min.css'}}"/>

	<title>www.nilo.app</title>
</head>
<body>

	<div class="container">
		<div class="jumbotron text-center">
			<h2>Agendamiento de citas</h2>
			<div class="row">
				<div class="form-group">
					
					<a href="/displaydata" class="btn btn-primary">EDITAR CITA</a>
					<a href="/deleteeventurl" class="btn btn-danger"> CANCELAR CITA</a>
				</div>
			</div>
			<div class="row">
				@if(count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{$error}}</li>
							@endforeach
						</ul>
					</div>
				@endif
				@if(\Session::has('success'))
					<div class="alert alert-success">
						<p>{{\Session::get('success')}}</p>
					</div>
				@endif
				<div class="cold-md-8">
					<div class="panel panel-default">
						<div class="panel-heading" style="background: #2e6da4;color: white;" >
							Agendamiento de Citas Nilo
						</div>
						<div class="panel-body">
							{!! $calendar->calendar() !!}
    						{!! $calendar->script() !!}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>