$(document).ready(function(){
    "use strict";

    var $answer_id = null;
    $(".answer").click(function() {
        $answer_id = $(this).attr('id');
    $("#answer_input").val($answer_id);
    });

    // #### HELPER FUNCTIONS ####
    function questionUpdateAjaxRequest() {

    }

    // Needed to grab the question id for storing answers in the DB

    // Refactoring to allow user to edit question in place sending an AJAX
    // request to update the DB and component
    // When I click on data-userid="user_{{{ $question->user_id }}}" open input for update to question

    // If user owns question
    // if ($('.users_question').data('auth') === 1) {
    var originalAnswer = "";

    function onUsersAnswerClick(){
        if ($(this).data('auth') != 1) {
            return;
        }
        var answer = $(this).text();
        originalAnswer = answer;

        $(this).html('');
        $('<input>')
            .attr({
                'type': 'text',
                'name': 'answer',
                'id': 'answer-input',
                'size': '30',
                'value': answer,
                'data-answer-id': $(this).data('answer-id'),
                'data-token-value': $('input[name="_token"]').val()
            })
            .appendTo($(this));
        $('#answer-input').focus();
        $('.users_answer').off();
    }

    $('.users_answer').click(onUsersQuestionClick);

    $(document).on('blur','#answer-input', function(){
        var answer = $(this).val();
        var token = $(this).data('token-value');
        var id = $(this).data('answer-id');
        var $that = $(this);
        $.ajax({
          type: 'put',
          data: {'answer':answer, '_token':token},
          url: "/answer/" + id,
          success: function(data){
            if (data.success) {
                // do success stuff
                // $('.users_question').text(question);
                $that.parent().html(answer);
            } else {
                // validation Failed
            }
          },
          error: function(xhr, error, code) {
            if (xhr.code == 500) {
                alert('server error');
                return;
            }
                console.log("Something Failed yo!");
                $that.val(originalAnswer);
                $that.focus();
            }
        });
        $('.users_answer').click(onUsersAnswerClick);
    });
})
