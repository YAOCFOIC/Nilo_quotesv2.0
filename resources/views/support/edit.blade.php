@extends('layouts.app')
@section('content')
<h1 class="text-center mt-l">Editar Pregunta</h1>
<div class="container mt-sl">
	<form action="{{ Route('supports.update',$support->id)}}" method="POST">
		@csrf
		@method('PUT')
		<div class="row">
			<div class="col-md-12">
				<div class="form-group">
					<strong>Categoría</strong>
					<input value="{{ $support->category}}" type="text" name="category" class="form-control" placeholder="Categoría">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Pregunta</strong>
					<input value="{{ $support->question}}" type="text" name="question" class="form-control" placeholder="Pregunta">
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Solución</strong>
					<textarea name="solution" class="form-control" placeholder="Solución" id="" cols="30" rows="10">{{$support->solution}}</textarea>
				</div>
			</div>
			<div class="col-md-12 text-center">
				<button class="btn btn-primary">Enviar</button>
			</div>
		</div>
	</form>
</div>
@endsection