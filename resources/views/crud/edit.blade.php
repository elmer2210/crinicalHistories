<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <title>Editar Historial Clinico</title>
</head>
<body>
    <br>
    <div class="container d-flex justify-content-center">
        <div class="row">
            <div class="column">
            <div class="card" style="width: 600px;">
                    <div class="card-body">
                      @foreach($clinical_histories as $histories)  
                        <h5 class="card-title">
                            Editar Historial Clínico de {{$histories->patient_name}}
                        </h5>
                        <form action="{{url('clinical_histories/edit', $histories->patient_historial)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Cedula de identidad</label>
                                <input type="text" class="form-control input-number" name="ci" value="{{$histories->ci}}" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del paciente</label>
                                <input type="text" class="form-control input-Case" name="patient_name" value="{{$histories->patient_name}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="born_date" id ="born" value = "{{$histories->born_date}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Edad</label>
                                <input type="number" class="form-control"  name="age" id ="age" value = "{{$histories->age}}" readonly=true>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Temperatura</label>
                                <input type="number" class="form-control input-number" name="temperature" value="{{$histories->temperature}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Presión Arterial</label>
                                <input type="number" class="form-control input-number" name="blood_presure" value="{{$histories->blood_presure}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Pulso</label>
                                <input type="number" class="form-control input-number" name="pulse" value="{{$histories->pulse}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Frecuencia Respiratoria</label>
                                <input type="number" class="form-control input-number" name="respiratory_frecuency" value="{{$histories->respiratory_frecuency}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Saturación</label>
                                <input type="number" class="form-control input-number" name="saturation" value="{{$histories->saturation}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Peso (kg)</label>
                                <input type="text" class="form-control decimals" name="weight" id="weight" value = "{{$histories->weight}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Talla (cm)</label>
                                <input type="text" class="form-control decimals" name="height" id="height" value ="{{$histories->height}}" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Imc</label>
                                <input type="text" class="form-control decimals" name="imc" id="imc" value = "{{$histories->imc}}" readonly=true required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Editar">
                            </div>
                        </form>
                     
                    </div>
                </div>
                <a href="{{url('clinical_histories/patient', $histories->patient_historial)}}">Regresar</a>
                @endforeach   
            </div>
        </div>
    </div>
    <br>
</body>
<script>
    $('#born').on('change', function(){
        $('#age').val(CalcularAge())
    })
    
    $('#height').on('change', function(){
        $('#imc').val(CalcularImc())
    })

    function CalcularAge ()
    {
        var selectDate= $('#born').val();
        var birthday = new Date(selectDate);
        var dateToday = new Date();
        var age = dateToday.getFullYear()-birthday.getFullYear();

        if(dateToday.getMonth() <= birthday.getMonth())
        {
            return age - 1
        }if (dateToday.getMonth() === birthday.getMonth()){
            if (dateToday.getDay() >= birthday.getDay() ) {
                age - 1
            }if(dateToday.getDay() < birthday.getDay()){
                return age 
            }
        }else{
            return age
        }
    }

    function CalcularImc()
    {
        var weight = parseFloat($('#weight').val());
        var height = parseFloat($('#height').val())/100;
        var valor = weight/(height*height);
        return valor.toFixed(3);
    }

    $('.input-Case').on('input', function () { 
        this.value = this.value.toUpperCase();
    });

    $('.input-number').on('input', function () { 
        this.value = this.value.replace(/[^0-9]/g,'');
    });
    $('.decimals').on('input', function () {
        this.value = this.value.replace(/[^0-9,.]/g, '').replace(/,/g, '.');
    });
</script>
</html>