/*
 Created by: Kenrick Beckett

 Name: Chat Engine
 */

var instance = false;
var state;
var mes;
var file;

function Chat (username) {
    this.username = username;
    this.update = updateChat;
    this.send = sendChat;
    this.getState = getStateOfChat;
}

//gets the state of the chat
function getStateOfChat(){

    if(!instance){
        console.log("getStateOfChat");
        instance = true;
        $.ajax({
            type: "POST",
            url: "chat_script.php",
            data: {
                'function': 'getState'
                //'file': file
            },
            dataType: "json",

            success: function(data){
                console.log(data.messages);
                if(data.messages){
                    for (var i = 0; i < data.messages.length; i++) {
                        console.log("ADDING TO TABLE");
                        $('#table-message').append($("<p>"+ data.users[i] + ": " + data.messages[i] + "\t" + data.time[i] +"</p>"));
                    }
                }
                //document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
                state = data.state;
                instance = false;
            },
        });
    }
}

//Updates the chat
function updateChat(){
    if(!instance){
        instance = true;
        $.ajax({
            type: "POST",
            url: "chat_script.php",
            data: {
                'function': 'update',
                'state': state
                //'file': file
            },
            dataType: "json",
            success: function(data){
                console.log("SUCCESS: " + data.count);
                if(data.messages){
                    for (var i = 0; i < data.messages.length; i++) {
                        $('#table-message').append($("<tr><td>"+ data.users[i] + ": " + data.messages[i] + "\t" + data.time[i] +"</td></tr>"));
                    }
                    //document.getElementById('chat-area').scrollTop = document.getElementById('chat-area').scrollHeight;
                }
                instance = false;
                state = data.state;
            },
        });
    }
    else {
        setTimeout(updateChat, 1500);
    }
}

//send the message
function sendChat(message, username)
{
    updateChat();
    $.ajax({
        type: "POST",
        url: "chat_script.php",
        data: {
            'function': 'send',
            'message': message,
            'username': username
            //'file': file
        },
        dataType: "json",
        success: function(data){
            updateChat();
        },
    });
}
