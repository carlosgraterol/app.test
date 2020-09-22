@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto sm:px-6 lg:px-8" style="text-align: center;">
    <img src="{{ asset('img/denunciasico.png') }}" width="120px" height="120px">
    <h1>Detalles de la denuncia</h1>
</div>
<div class="container mt-4">
    <div class="row">
        <div class="col-12 col-lg-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('statuswarning'))
                        <div class="alert alert-warning" role="alert">
                            {{ session('statuswarning') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('storedenuncia') }}" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                        <div class="form-group class="ml-4 text-lg leading-7 font-semibold">
                            <label for="delito_id" class="col-form-label text-md-right">Tipo de delito (*)</label>

                            <select id="delito_id" class="form-control border-0 shadow-sm bg-light  @error('delito_id') is-invalid @enderror" name="delito_id"  autocomplete="delito_id" autofocus>
                                <option value="">seleccionar tipo de delito</option>
                                @foreach($delitos as $delito)
                                    @if (old('delito_id') == "")
                                        <option value="{{ $delito->id }}">{{ $delito->nombre_delito }}</option>
                                    @else
                                        <option value="{{ $delito->id }}" {{ old('delito_id') == $delito->id ? 'selected="selected"' : '' }}>{{ $delito->nombre_delito }}</option>
                                    @endif
                                @endforeach
                            </select>

                            @error('delito_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="delito" class="col-form-label text-md-right">Fecha (*)</label>

                            <input id="fecha" type="date" class="form-control border-0 shadow-sm bg-light @error('fecha') is-invalid @enderror" name="fecha" value="{{ old('fecha') }}"  autocomplete="fecha" autofocus minlength="2" maxlength="20">

                            @error('fecha')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="identifipersona" class="col-form-label text-md-right">¿Puede identificar a las personas comprometidas? (*)</label>

                            <select id="identifipersona" class="form-control border-0 shadow-sm bg-light  @error('identifipersona') is-invalid @enderror" name="identifipersona"  autocomplete="identifipersona" autofocus>
                                <option value="">seleccione una opción</option>
                                @switch(old('identifipersona'))
                                    @case('Si')
                                        <option value="Si" selected>Si</option>
                                        <option value="No">No</option>
                                        <option value="No sabe">No sabe/No desea revelar</option>
                                    @break

                                    @case('No')
                                        <option value="Si">Si</option>
                                        <option value="No" selected>No</option>
                                        <option value="No sabe">No sabe/No desea revelar</option>
                                    @break

                                    @case('No sabe')
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                        <option value="No sabe" selected>No sabe/No desea revelar</option>
                                    @break

                                    @default
                                        <option value="Si">Si</option>
                                        <option value="No">No</option>
                                        <option value="No sabe">No sabe/No desea revelar</option>
                                @endswitch
                            </select>

                            @error('identifipersona')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="descripcion" class="col-form-label text-md-right">Descripción del hecho (*)</label>

                            <textarea id="descripcion" class="form-control shadow-sm @error('descripcion') is-invalid @enderror" name="descripcion" autocomplete="descripcion" autofocus minlength="30" maxlength="1000" placeholder="(*) A continuación escriba por favor el hecho que desea denunciar y entregue tanto detalle como sea posible, mencione la ubicación de los testigos, cuáles fueron las reacciones o impresiones de los involucrados y cualquier otra información que haya entregado."  rows="6">{{ old('descripcion') }}</textarea>

                            @error('descripcion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="conocimiento" class="col-form-label text-md-right">¿Como tomó conocimiento? (*)</label>

                            <select id="conocimiento" class="form-control border-0 shadow-sm bg-light  @error('conocimiento') is-invalid @enderror" name="conocimiento"  autocomplete="delito_id" autofocus>
                                <option value="">seleccione una opción</option>
                                @if (old('conocimiento') == "")
                                    <option value="Yo lo ví">Yo lo ví</option>
                                    <option value="Me lo contaron">Me lo contaron</option>
                                @elseif(old('conocimiento') == "Yo lo ví")
                                    <option value="Yo lo ví" selected>Yo lo ví</option>
                                    <option value="Me lo contaron">Me lo contaron</option>
                                @else
                                    <option value="Yo lo ví">Yo lo ví</option>
                                    <option value="Me lo contaron" selected>Me lo contaron</option>
                                @endif
                            </select>

                            @error('conocimiento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="lugar" class="col-form-label text-md-right">Indique lugar de ocurrencia de la denuncia (*)</label>

                            <select id="lugar" class="form-control border-0 shadow-sm bg-light  @error('lugar') is-invalid @enderror" name="lugar"  autocomplete="lugar" autofocus>
                                <option value="">seleccione el lugar</option>
                                @switch(old('lugar'))
                                    @case('Santiago')
                                        <option value="Santiago" selected>Santiago</option>
                                        <option value="Valparaiso">Valparaiso</option>
                                        <option value="Viña del mar">Viña del mar</option>
                                        <option value="Otro">Otro</option>
                                    @break

                                    @case('Valparaiso')
                                        <option value="Santiago">Santiago</option>
                                        <option value="Valparaiso" selected>Valparaiso</option>
                                        <option value="Viña del mar">Viña del mar</option>
                                        <option value="Otro">Otro</option>
                                    @break

                                    @case('Viña del mar')
                                        <option value="Santiago">Santiago</option>
                                        <option value="Valparaiso">Valparaiso</option>
                                        <option value="Viña del mar" selected>Viña del mar</option>
                                        <option value="Otro">Otro</option>
                                    @break

                                    @case('Otro')
                                        <option value="Santiago">Santiago</option>
                                        <option value="Valparaiso">Valparaiso</option>
                                        <option value="Viña del mar">Viña del mar</option>
                                        <option value="Otro" selected>Otro</option>
                                    @break

                                    @default
                                        <option value="Santiago">Santiago</option>
                                        <option value="Valparaiso">Valparaiso</option>
                                        <option value="Viña del mar">Viña del mar</option>
                                        <option value="Otro">Otro</option>
                                @endswitch
                            </select>

                            @error('lugar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="delito" class="col-form-label text-md-right">Indique cuál es el otro lugar</label>

                            <input id="otrolugar" type="text" class="form-control border-0 shadow-sm bg-light @error('otrolugar') is-invalid @enderror" name="otrolugar" value="{{ old('otrolugar') }}"  autocomplete="otrolugar" autofocus minlength="2" maxlength="20" disabled="true">

                            @error('otrolugar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="documento" class="col-form-label text-md-right">Adjuntar documento (opcional)</label>

                            <input id="documento" type="file" accept="application/pdf" class="border form-control-file shadow-sm @error('documento') is-invalid @enderror" name="documento" value="{{ old('documento') }}" autofocus>
                            <small><em>formato PDF, peso max: 1MB</em></small>

                            @error('documento')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="anonima" class="col-form-label text-md-right">¿Desea que la denuncia se anonima? (*)</label>

                            <select id="anonima" class="form-control border-0 shadow-sm bg-light  @error('anonima') is-invalid @enderror" name="anonima"  autocomplete="anonima" autofocus>
                                <option value="">seleccione una opción</option>
                                @if (old('anonima') == "")
                                    <option value="1">Si</option>
                                    <option value="0">No</option>
                                @elseif(old('anonima') == 1)
                                    <option value="1" selected>Si</option>
                                    <option value="0">No</option>
                                @else
                                    <option value="1">Si</option>
                                    <option value="0" selected>No</option>
                                @endif
                            </select>

                            @error('anonima')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nombre" class="col-form-label text-md-right">Nombre</label>

                            <input id="nombre" type="text" class="form-control border-0 shadow-sm bg-light @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}"  autocomplete="nombre" autofocus minlength="2" maxlength="20" disabled="true">

                            @error('nombre')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="rut" class="col-form-label text-md-right">Rut</label>

                            <input id="rut" type="text" class="form-control border-0 shadow-sm bg-light @error('rut') is-invalid @enderror" name="rut" value="{{ old('rut') }}"  autocomplete="rut" autofocus minlength="2" maxlength="20" disabled="true">

                            @error('rut')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-form-label text-md-right">Email</label>

                            <input id="email" type="text" class="form-control border-0 shadow-sm bg-light @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" autofocus minlength="2" maxlength="60" disabled="true">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group" style="text-align: center;">
                            <input type="submit" value="ENVIAR DENUNCIA" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection