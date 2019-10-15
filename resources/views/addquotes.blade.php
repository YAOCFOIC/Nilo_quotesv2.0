@extends('layouts.app2')

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
            <form action="{{route('citas')}}" method="post">
                {{ csrf_field() }}
                   <h1>Agendar Llamada</h1>
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
                        <input type="email" name="email_visit" class="form-control" placeholder="Correo" id="input-form" >
                        <span id="emailOK"></span>
                    </div>
                    <div class="form-group cold-md-4">
                        <input type="text" name="phone_visit" class="form-control" placeholder="Celular" id="input-form3" required>
                    </div>
                    <div class="form-group cold-md-4">
                        <input type="text" name="name_visit" class="form-control" placeholder="Nombre Completo" id="input-form2" required>
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}" id="captcha">
                            @if($errors->has('g-recaptcha-response'))
                                <span class="invalid-feedback" style="display: block;">
                                    <strong>{{$errors->first('g-recaptcha-response')}}
                                    </strong>
                                </span>
                            @endif
                        </div>
                    </div>          
                    <input type="submit" class="btn btn-primary quotes" value="Agregar Cita" id="position2">
            </form>
        </div>
    </div>
</div>
@endsection
