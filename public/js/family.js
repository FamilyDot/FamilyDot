'use strict'
$('#sub_survey').click(function(e){
    $('#myModal').modal('show');
    var random = Math.floor((Math.random() * 100) + 1);
    $("#health").html(random);
    // alert('Congratulations, your family\'s health score is: '+ random + '!');
});

$('#sub_posts').click(function(e){
    $('#myModalPost').modal('show');
});



$(function(){
    var data = {
            label: "My First dataset",
            fill: false,
            lineTension: 0.1,
            backgroundColor: "rgba(75,192,192,0.4)",
            borderColor: "rgba(75,192,192,1)",
            borderCapStyle: 'butt',
            borderDash: [],
            borderDashOffset: 0.0,
            borderJoinStyle: 'miter',
            pointBorderColor: "rgba(75,192,192,1)",
            pointBackgroundColor: "#fff",
            pointBorderWidth: 1,
            pointHoverRadius: 5,
            pointHoverBackgroundColor: "rgba(75,192,192,1)",
            pointHoverBorderColor: "rgba(220,220,220,1)",
            pointHoverBorderWidth: 2,
            pointRadius: 1,
            pointHitRadius: 10,
            data: [65, 59, 80, 81, 56, 55, 40]

    };

    // var option = {};

    // Any of the following formats may be used
    var ctx = document.getElementById("myChart").getContext('2d');
    var myLineChart = new Chart(ctx).Line(data,option); {

    }
});