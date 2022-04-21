$('#born').on('change', function(){
    $('#age').val(CalcularAge())
})

function CalcularAge ()
{
    var selectDate= $('#born').val();
    var birthday = new Date(selectDate);
    var dateToday = new Date();
    var age = (parseInt((dateToday-birthday)/(1000*60*60*24*365)));
    /*var month = dateToday.getMonth () - birthday.getMonth();

    if(month >= 0)
    {
        age - 1
    }if (month === 0){
        if (birthday.getDay() >= dateToday.getDay()) {
            age
        }if(birthday.getDay() < dateToday.getDay()){
            age - 1
        }
    }else{
        age
    }*/

    return age
}