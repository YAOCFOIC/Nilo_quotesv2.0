@extends('layouts.app')
@section('content')
<h1 class="text-center mt-l">Agregar Pregunta</h1>
<div class="container mt-sl">
	<form action="{{ Route('supports.store')}}" method="POST" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col-md-12">
				<div class="text-center">
					<div class="custom-file-upload">
						<input type="file" id="file" name="file"/>
						@if($errors->has('file'))
						<strong class="text-danger">{{ $errors->first('file')}}</strong>
						@endif
					</div>
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Categoría</strong>
					<input value="{{ old('category')}}" type="text" name="category" class="form-control" placeholder="Categoría">
					@if($errors->has('category'))
					<strong class="text-danger">{{ $errors->first('category')}}</strong>
					@endif
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Pregunta</strong>
					<input value="{{ old('question')}}" type="text" name="question" class="form-control" placeholder="Pregunta">
					@if($errors->has('question'))
					<strong class="text-danger">{{ $errors->first('question')}}</strong>
					@endif
				</div>
			</div>
			<div class="col-md-12">
				<div class="form-group">
					<strong>Solución</strong>
					<textarea name="solution" class="form-control" placeholder="Solución" id="" cols="30" rows="10">{{ old('solution')}}</textarea>
					@if($errors->has('solution'))
					<strong class="text-danger">{{ $errors->first('solution')}}</strong>
					@endif
				</div>
			</div>

			<div class="col-md-12 text-center btn-yellow-dark">
				<button class="btn">Enviar</button>
			</div>
		</div>
	</form>
</div>
@endsection