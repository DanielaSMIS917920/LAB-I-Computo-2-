@extends('country.form')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Listado de Paises</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('country.create') }}" class="btn btn-info" >Añadir nuevo</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Pais</th>
               <th>Capital</th>
               <th>Moneda</th>
               <th>Continente</th>
               <th>Idioma</th>
               <th>Editar o eliminar</th>
             </thead>
             <tbody>
              @if($countries->count())  
              @foreach($countries as $country)  
              <tr>
                <td>{{$country->Pais}}</td>
                <td>{{$country->Capital}}</td>
                <td>{{$country->Moneda}}</td>
                <td>{{$country->Continente}}</td>
                <td>{{$country->Idioma}}</td>
                <form action="{{ url('/country/'.$country->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}
                        <td>
                            <input class="btn btn-danger" type="submit" value="Eliminar">
                        </td>
                    </form>
                    <form action="{{ url('/country/'.$country->id .'/edit') }}">
                        <td>
                            <input class="btn btn-success" type="submit" value="Editar">
                        </td>
                    </form>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>

          </table>
        </div>
      </div>
      {{ $countries->links() }}
    </div>
  </div>
</section>

@endsection
