@extends('layouts.app')
@section('content')
	<div class="container">
		<a class="btn btn-info mt-sl" data-step="1" data-intro="Aquí crearas una nueva pregunta." href="{{ route('supports.create')}}">+</a>
			@if(Session::has('message'))
				<div class="alert alert-info mt-3">{{ Session::get('message')}}</div>
			@endif
	<table class="table table-hover table-bordered mt-3 table-shadow">
	  <thead class="bg-violet">
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Categoría</th>
	      <th scope="col">Pregunta</th>
	    
	      <th scope="col">imagen</th>
	      <th scope="col">Acción</th>

	    </tr>
	  </thead>
	  <tbody>
	  	@foreach($supports as $support)
	    <tr>
	      <th scope="row">{{ $support->id }}</th>
	      <td >{{ $support->category }}</td>
	      <td>{{ $support->question }}</td>
	
	      <td><img src="images/{{$support->file}}" width="125"></td>
	      <td>
	      	<a data-step="2" data-intro="Aquí editaras la pregunta creada." href="{{route('supports.edit',$support->id)}}" class="btn btn-success">Editar</a>
	      	
	      	<form action="{{route('supports.destroy',$support->id)}}" method="POST">
	      		@csrf
	      		@method('DELETE')
	      		<button data-step="3" data-intro="Aquí eliminaras la pregunta." class="btn btn-danger mt-3" onclick="return confirm('¿Quiere eliminar el registro?')">Borrar</button>
	      	</form>
	      </td>
	    </tr>
		@endforeach
	  </tbody>
	</table>
	{{ $supports->links()}}
</div>
@endsection