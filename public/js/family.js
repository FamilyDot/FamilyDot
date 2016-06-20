$('#sub_survey').click(function(e){
    $('#myModal').modal('show');
    var random = Math.floor((Math.random() * 100) + 1);
    $("#health").html(random);
    // alert('Congratulations, your family\'s health score is: '+ random + '!');
});





