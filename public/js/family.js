'use strict'
$('#sub_survey').click(function(e){
    // e.preventDefault();    // this is preventing the form to submit
    $('#myModal').modal('show');
    // alert('Congratulations, your family\'s health score is: '+ random + '!');
});

$('#sub_posts').click(function(e){ 
    $('#myModalPost').modal('show');
});


window.onload = function () {
    var score = parseInt($('#happiness-avg').val());
    // var userId = {{{ Auth::id() }}};
    console.log(score);
    var chart = new CanvasJS.Chart("chartContainer",

    {
      theme: "theme2",
      title:{
        text: "Family Health Avg"
      },
      animationEnabled: true,
      axisX: {
        valueFormatString: "MMM",
        interval:1,
        intervalType: "month"
        
      },
      axisY:{
        includeZero: false
        
      },
      data: [
      {        
        type: "line",
        //lineThickness: 3,        
        dataPoints: [
        { x: new Date(2016, 0, 1), y: 82 },
        { x: new Date(2016, 1, 1), y: 80},
        { x: new Date(2016, 2, 1), y: 95, indexLabel: "highest",markerColor: "red", markerType: "triangle"},
        { x: new Date(2016, 3, 1), y: 83 },
        { x: new Date(2016, 4, 1), y: 71 },
        { x: new Date(2016, 5, 1), y:  score} //this is june not may!!

            ]
        }

    ]
});
chart.render();
}





