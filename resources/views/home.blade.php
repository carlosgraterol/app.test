@extends('layouts.applogin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><h1>Denuncias recibidas</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table text-center table-hover table-bordered shadow-sm table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Fecha</th>
                                <th scope="col">Tipo de denuncia</th>
                                <th scope="col">Anónima</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($denuncias)>0)
                            @foreach($denuncias as $denuncia)
                                <tr>
                                    <td>{{ $denuncia->fecha }}</td>
                                    <td>{{ $denuncia->delitos->nombre_delito }}</td>
                                    <td>
                                        @if($denuncia->anonima == 1)
                                            Si
                                        @else
                                            No
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group dropright">
                                            <i class="fa fa-ellipsis-v" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-size: 14px"></i>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#exampleModal{{$denuncia->id}}">Ver</a>
                                                <a class="dropdown-item" href="">Asignar</a>
                                                <a class="dropdown-item button delete-confirm-empre" href="">Imprimir</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$denuncia->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2 class="modal-title" id="exampleModalLabel">Detalles de la denuncia</h2>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                @if($denuncia->anonima == 0)
                                                    <strong>Denuncia anónima:</strong> No<br>
                                                    <strong>Nombre:</strong> {{ $denuncia->nombre }}<br>
                                                    <strong>Rut:</strong> {{ $denuncia->rut }}<br>
                                                    <strong>Correo:</strong> {{ $denuncia->email }}<br>
                                                @else
                                                    <strong>Denuncia anónima:</strong> Si<br>
                                                @endif
                                                <strong>Tipo de delito:</strong> {{ $denuncia->delitos->nombre_delito }}<br>
                                                <strong>Fecha:</strong> {{ $denuncia->fecha }}<br>
                                                <strong>¿Puede identificar a las personas comprometidas?:</strong> {{ $denuncia->identifipersona }}<br>
                                                <strong>Descripción del hecho:</strong> {{ $denuncia->descripcion }}<br>
                                                <strong>¿Como tomó conocimiento?:</strong> {{ $denuncia->conocimiento }}<br>
                                                <strong>Indique lugar de ocurrencia de la denuncia:</strong> {{ $denuncia->lugar }}<br>
                                                @if($denuncia->otrolugar == "")
                                                    {{--Nada--}}
                                                @else
                                                <strong>Indique cuál es el otro lugar:</strong> {{ $denuncia->otrolugar }}<br>
                                                @endif
                                                <strong>Documento:</strong> <a href="{{ asset('upload') }}/{{ $denuncia->documento }}" target="_blank">Descargar</a>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="alert alert-primary" role="alert">
                                    Aún no se han registrado denuncias
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                    {{ $denuncias->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
