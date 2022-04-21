<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <title>Crear un nuevo historial Clinico</title>
</head>
<body>
    <br>
    <div class="container d-flex justify-content-center" style="justify-content: center">
        <div class="row">
            <div class="col" >
                <div class="card" style="width: 600px;">
                    <div class="card-body">
                        <h5 class="card-title">
                            Crear una nueva historia clínica
                        </h5>
                        <form action="{{url('clinical_histories/create')}}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label for="" class="form-label">Cedula de identidad</label>
                                <input type="text" class="form-control input-number" name="ci" maxlength="10" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Nombre del paciente</label>
                                <input type="text" class="form-control input-Case" name="patient_name" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="born_date" id ="born" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Edad</label>
                                <input type="number" class="form-control"  name="age" id ="age" readonly=true>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Temperatura</label>
                                <input type="text" class="form-control input-number" name="temperature" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Presión Arterial</label>
                                <input type="text" class="form-control input-number" name="blood_presure" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Pulso</label>
                                <input type="text" class="form-control input-number" name="pulse" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Frecuencia Respiratoria</label>
                                <input type="text" class="form-control input-number" name="respiratory_frecuency" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Saturación</label>
                                <input type="text" class="form-control input-number" name="saturation" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Peso (kg)</label>
                                <input type="text" class="form-control decimals" step="0.01" name="weight" id="weight" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Talla (cm)</label>
                                <input type="text" class="form-control decimals" name="height"  step="0.01" id="height" required>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">IMC</label>
                                <input type="text" class="form-control decimals" name="imc"  id="imc" required>
                            </div>
                            <div class="mb-3">
                                <input type="submit" class="btn btn-primary" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
                <br>
                <a href="{{url('/')}}">Regresar</a>
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