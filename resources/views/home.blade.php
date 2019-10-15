@extends('layouts.app')


 

@section('content')

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="background: #ca31ca;color: white;">Agendamiento de citas</div>
                <div class="card-body">
                    <div class="container">
                        
                            <div class="row">
                                <div class="form-group">
                                    <!-- <a href="/displaydata" class="btn btn-primary">EDITAR CITA</a> -->
                                    <div class="panel panel-default">
                                      
                                      <div class="panel-body" data-step="2" data-intro="Si le das en month te muestra las citas para el mes, si le das week te muestra las citas agendadas para la semana o si deseas mirar que citas hay actualmente le das en day.">
                                        {!! $calendar->calendar() !!}
                                          {!! $calendar->script() !!}
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
