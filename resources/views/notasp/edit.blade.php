

@extends('layouts.app')
@section('content')

<h3 class="mt-5 d-flex justify-content-center">Editar nota</h3>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    
<form class="mt-5" action="{{ route('notasp.update', $nota->idnota) }}" method="POST">
{!! method_field('PUT')!!}
{!! csrf_field()!!}
  <div class="form-group">
    <div class="col">
      <div class="form-group">
        <label for="nom">Nota 1</label>
        <input type="hidden" name="idprofesor" value="{{@Auth::user()->idprofesor}}">
        <input id="nom" type="text" class="form-control"  name="nota1" placeholder="Nota 1" required/ value="{{ $nota->nota1}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Nota 2</label>
        <input id="ape" type="text" class="form-control"  name="nota2" placeholder="Nota 2" required/ value="{{$nota->nota2}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Nota 3</label>
        <input id="ape" type="text" class="form-control"  name="nota3" placeholder="Nota 3" required/ value="{{$nota->nota3}}">
      </div>
    </div>
    <div class="col">
      <div class="form-group">
        <label for="ape">Nota 4</label>
        <input id="ape" type="text" class="form-control"  name="nota4" placeholder="Nota 4" required/ value="{{$nota->nota4}}">
      </div>
    </div>
    @if ($alumnos == true && $profesores == true)
    <div class="col">
      <div class="form-group">
        <label for="alum">Alumno</label>
        <select id="alum" class="form-control" type="text" name="idalumno" placeholder="Alumno" required/ >
        @foreach ($alumnos as $alumno)
        <option value="{{ $alumno->idalumno }}"
        @if ($alumno->idalumno == $nota->idalumno)
        selected="selected"
        @endif
        >{{ $alumno->nombre }} {{ $alumno->apellido }}</option>
        @endforeach
        </select>
        
      </div>
    </div>

    

    <div class="col">
      <div class="form-group">
        <label for="cur">Curso</label>
        <select id="cur" class="form-control" type="text" name="idcursos" placeholder="Curso" required/ value="{{old('idcursos')}}">
        @foreach ($cursos as $curso)
        @if($curso->idprofesor == @Auth::user()->idprofesor)
        <option value="{{ $curso->idcursos }}"
        @if ($curso->idcursos == $nota->idcursos)
        selected="selected"
        @endif
        >{{ $curso->nombrecurso }}</option>
        @endif
        
        @endforeach
        </select>
        
      </div>
    </div>
    @else
    
    @endif
    <div class="col">
      <div class="form-group">
        <label for="tel">Parcial</label>
        <input id="tel" class="form-control" type="text" name="parcial" placeholder="Parcial" required/ value="{{$nota->parcial}}">
      </div>
    </div>

    

  </div>
  <button type="submit" class="container btn btn-primary mt-5 mb-5">Enviar</button>
  
</form>

<a href="{{ route('notasp.index') }}" class="btn btn-success mt-5 mb-3">Regresar</a>  
@endsection