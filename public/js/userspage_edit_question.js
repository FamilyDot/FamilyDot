$(document).ready(function(){
    "use strict";

    var $question_id = null;
    $(".answer-link").click(function() {
        $question_id = $(this).attr('id');
    $("#question_input").val($question_id);
    });

    // #### HELPER FUNCTIONS ####

    function addQuestionIdToDeleteModal(){

        var questionId = $("#question-input").attr('data-question-id');
        $('#question-id-input').val(questionId);

    }

    function setHoverEffect() {
        $(".users_question").hover(function() {
            if($(this).data('auth') != 1) {
                return;
            }
            $( this ).css({'color': "#777777"} );

            }, function() {

            if($(this).data('auth') != 1) {
                return;
            }
          $( this ).css({'color': "#FF8F6E"});
        });
    }

    $('#modal-delete').on('hide.bs.modal', function (e) {
        $('#question-input').focus();
    })


    setHoverEffect();
    // Needed to grab the question id for storing answers in the DB

    // Refactoring to allow user to edit question in place sending an AJAX
    // request to update the DB and component
    // When I click on data-userid="user_{{{ $question->user_id }}}" open input for update to question
    var originalQuestion = "";

    function onUsersQuestionClick(){
        if ($(this).data('auth') != 1) {
            return;
        }

        var $deleteButton = $(this).parent().next().children();
        $deleteButton.toggleClass('hidden');

        var question = $(this).text();
        originalQuestion = question;

        $(this).html('');
        $('<input>')
            .attr({
                'type': 'text',
                'name': 'question',
                'id': 'question-input',
                'size': '25',
                'value': question,
                'data-question-id': $(this).data('question-id'),
                'data-token-value': $('input[name="_token"]').val()
            })
            .appendTo($(this));
        $('#question-input').focus();
        $('.users_question').off();
    }

    // Set listener
    $('.users_question').click(onUsersQuestionClick);

    // //test with alert
    // $('.delete').on('click', function() {
    //     alert('this is you deleting shit');
    // });

    $(document).on('blur','#question-input', function(e){
        // check and see if the event target is the delete button: If it is, just stop

        var target = e.relatedTarget;

        if ($(target).attr('id') == 'delete') {
            addQuestionIdToDeleteModal();
            return;
        }

        var question = $(this).val();
        var token = $(this).data('token-value');
        var id = $(this).data('question-id');
        var $that = $(this);
        $.ajax({
            type: 'put',
            data: {'question':question, '_token':token},
            url: "/question/" + id,
            success: function(data){
                if (data.success) {
                // do success stuff
                // $('.users_question').text(question);
                    $that.parent().html(question);
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
                $that.val(originalQuestion);
                $that.focus();
            }
        });

        $('.users_question').click(onUsersQuestionClick);
        var $deleteButton = $(this).parent().parent().next().children();
        $deleteButton.toggleClass('hidden');

        setHoverEffect();
    });
})
