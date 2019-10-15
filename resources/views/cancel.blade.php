@extends('layouts.app')
@section('content')
<div class="container mt-3">
	<div class="row justify-content-center">
		<table class="table table-striped table-hover table-bordered">
			<thead class="bg-violet">
				<tr>
					<th>Id</th>
					<th>Tipo</th>
					<th>Fecha inicial</th>
					<th>Fecha final</th>
					<th>Correo Visitante</th>
					<th>Correo Usuario</th>
					<th>celular</th>
					<th>Nombre</th>
					<th>Estado</th>
					<th>cancelar cita</th>
					<th>Editar Estado</th>
				</tr>
			</thead>
			<tbody>
				@foreach($events as $event)
				<tr>
					<td>{{$event->id}}</td>
					<td>{{$event->title}}</td>	
					<td>{{$event->start_date}}</td>
					<td>{{$event->end_date}}</td>
					<td>{{$event->email_visit}}</td>
					<td>{{$event->user ? $event->user->email : ''}}</td>
					<td>{{$event->phone_visit}}</td>
					<td>{{$event->name_visit}}</td>
					<td data-step="1" data-intro="Aquí verás el estado de las citas si el cliente no se ha llamado estara en el estado llamar.">{{$event->status}}</td>
					<th data-step="2" data-intro="Aquí cancelaras la cita.">
						<form action="{{route('destroy',$event->id)}}" method="POST">
							{{ csrf_field()}}
							<input type="hidden" name="_method" value="DELETE">
							<button type="submit" class="btn btn-danger" onclick="return confirm('Quiere borrar registro?')">
								Cancelar	
							</button>
						</form>
					</th>
					<th data-step="3" data-intro="Aquí Editaras el estado de la cita si se agendo la cita con exito adicionaras listo."><a href="{{route('status',$event->id)}}" class="btn btn-success">
						<i class="glyphicon glyphicon-dit"> 
						</i>
						Editar
					</a>
				</th>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
{{$events->links()}}
</div>
</div>
</div>
@endsection
