@extends('layouts.app')

@section('content')
<div class="container">
@if ($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }}</strong>
        </div>
    @endif
    @if(\Session::has('success'))
        <div class="alert alert-success">
            <p>{{\Session::get('success')}}</p>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{route('citas')}}" method="GET">
                {{ csrf_field() }}
               
                <div class="form-group" id="hidden">
                    <label for="">Tipo de Cita</label>
                    <select name="title"  class="form-control" value="{{old('title')}}">
                        <option selected value="">Selecciona el tipo de cita</option>
                        <option value="Llamada">Llamada</option>
                        <option value="Habilitacion">Habilitación</option>
                        <option value="Tour">Tour Nilo</option>
                    </select>            
                </div>
                <div class="form-group">
                    <input type="datetime" class="form-control" id="hidden" name="start_date" placeholder="Fecha inical" class="date" value="{{old('start_date')}}" readonly>
                    <script type="text/javascript">
                        $(function(){
                            $('*[name=start_date]').appendDtpicker({
                                "inline": true,
                                "futureOnly": true,
                                "amPmInTimeList": true,
                                "allowWdays": [1, 2, 3, 4, 5],
                                "minTime":"09:00",
                                "maxTime":"17:15",
                                "locale":"es"
                            });
                        });
                    </script>
                </div>    
                    <div class="form-group cold-md-4">
                    <input type="text" name="email" class="form-control" placeholder="correo" id="position">
                    </div>          
                    <input type="submit" class="btn btn-primary" value="Agregar Cita" id="position">
            </form>
        </div>
    </div>
</div>
@endsection
