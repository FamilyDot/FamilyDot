@extends('layouts.master')


@section('topscript')
<link rel="stylesheet" media="screen" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<style type="text/css">
    .container {
        margin-top: 80px;
    }
    body {
    font-family: arial;
    font-size: 12px;
}

#loggedout {
    text-align: center;
    font-size: 20px;
    padding-top: 30px;
}
#loggedin {
    display: none;
}

#header {
    padding: 4px;
    border-bottom: 1px solid #000;
    background: #eee;
}

#output {
    padding: 4px;
}

.card {
    display: block;
    padding: 2px;
}
</style>
@stop

@section('content')
    <div class="container">
        <h1>Trello Dashboard</h1>
        <!-- We will be putting our dashboard right here -->
        <form class="form-horizontal" id="boards_form">
            <div class="form-group">
                <label class="control-label">Choose your board</label>
                <select class="form-control" id="boards"></select>
            </div>
        </form>
    </div>
    <div id="loggedout">
        <a id="connectLink" href="#">Connect To Trello</a>
    </div>

    <div id="loggedin">
        <div id="header">
            Logged in to as <span id="fullName"></span>
            <a id="disconnect" href="#">Log Out</a>
        </div>

        <div id="output"></div>
    </div>

    @stop
    @section('bottomscript')

    <script src="http://code.jquery.com/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="https://api.trello.com/1/client.js?key=5d17041570ae42d43a7e0a7952d4ea7b"></script>
    <script type="text/javascript">
    //This is where out JS code will go

        var loadedBoards = function(boards) {
            $.each(boards, function(index, value) {
                $('#boards').append($("<option></option>").attr("value",value.id).text(value.name));
                console.log(boards);
            });
        };
        var loadBoards = function() {
                //Get the users boards
            Trello.get('members/me/boards',loadedBoards,function() {
                    console.log("Failed to load boards");
                });
        };
        // Get all of the information about the boards you have access to

            // Trello.get('/member/me/boards');

        Trello.authorize({
            type: "popup",
            name: "Trello dashboard",
            scope: {
                read: true,
                write: false
            },
            expiration: "never",
            success: function() {
                console.log("Successful authentication");
            },
            error: function() {
                console.log("Failed authentication");
            }
        });
        loadBoards();
        var onAuthorize = function() {
    updateLoggedIn();
    $("#output").empty();

    Trello.members.get("me", function(member){
        $("#fullName").text(member.fullName);

        var $cards = $("<div>")
            .text("Loading Cards...")
            .appendTo("#output");

        // Output a list of all of the cards that the member
        // is assigned to
        Trello.get("members/me/cards", function(cards) {
            $cards.empty();
            $.each(cards, function(ix, card) {
                $("<a>")
                .attr({href: card.url, target: "trello"})
                .addClass("card")
                .text(card.name)
                .appendTo($cards);
            });
        });
    });

};

var updateLoggedIn = function() {
    var isLoggedIn = Trello.authorized();
    $("#loggedout").toggle(!isLoggedIn);
    $("#loggedin").toggle(isLoggedIn);
};

var logout = function() {
    Trello.deauthorize();
    updateLoggedIn();
};

Trello.authorize({
    interactive:false,
    success: onAuthorize
});

$("#connectLink")
.click(function(){
    Trello.authorize({
        type: "popup",
        success: onAuthorize
    })
});

$("#disconnect").click(logout);
    </script>

@stop
