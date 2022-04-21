<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Clinico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="column ">
                <h1>Historial clínico del paciente  </h1>
                <hr>
                <br>
            </div>
            @if(Session::has('mensaje'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('mensaje') }}
            </div> 
            @endif
        </div>
        <div class="row">
            <div class="column">
                <a href="{{url('clinical_histories/create')}}">Crear un historal nuevo</a>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Historia del paciente</th>
                            <th>Cedula de Identidad</th>
                            <th>Nombres</th>
                            <th>Edad</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($clinical_histories as $histories)
                            <tr>
                                <td>{{$histories->patient_historial}}</td>
                                <td>{{$histories->ci}}</td>
                                <td>{{$histories->patient_name}}</td>
                                <td>{{$histories->age}}</td>
                                <td>
                                    <form action="{{url('clinical_histories/delete',$histories->patient_historial)}}" method="POST">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                    <br>
                                    <a href="{{url('clinical_histories/patient', $histories->patient_historial)}}" class="btn btn-info">Ver</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
        </div>
        
       
    </div>
    <br>
</body>
</html>