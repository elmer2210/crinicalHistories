<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Paciente</title>
</head>
<body>
    <div class="container d-flex justify-content-center" style="margin:30px">
            @if(Session::has('mensaje'))
                <div class="alert alert-primary" role="alert">
                    {{ Session::get('mensaje') }}
                </div> 
            @endif
        <div class="card" style="width: 400px;">
            @foreach($clinical_histories as $histories)  
            <div class="card-body">
                <h4 class="card-title">Paciente {{$histories->patient_name}} </h4>
                <div class="row">
                    <div class="col">
                        <p><h6>Cédula:</h6> {{$histories->ci}}</p>
                        <p><h6>Edad:</h6> {{$histories->age}}</p>
                        <p><h6>Temperatura:</h6> {{$histories->temperature}}</p>
                        <p><h6>Saturación:</h6> {{$histories->saturation}}</p>
                        <p><h6>Estatura (cm):</h6> {{$histories->height}}</p>
                        <p><h6>IMC:</h6> {{$histories->imc}}</p>
                    </div>
                    <div class="col">
                        <p><h6>Historial Clínico:</h6> {{$histories->patient_historial}}</p>
                        <p><h6>Fecha de nacimiento:</h6> {{$histories->born_date}}</p>
                        <p><h6>Persion Arterial:</h6> {{$histories->blood_presure}}/120</p>
                        <p><h6>Frecuencia Respiratoria:</h6> {{$histories-> respiratory_frecuency}}</p>
                        <p><h6>Peso (Kg):</h6> {{$histories->weight}}</p>
                        
                       
                    </div>
                </div>
            </div>
            <a href="{{url('clinical_histories/edit', $histories->patient_historial)}}" class="btn btn-info">Editar</a>
            @endforeach
        </div>
    </div>
    <div class="container">
    <a href="{{url('/')}}">Regresar</a>
    </div>
    <br>
</body>
</html>