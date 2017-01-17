/*
 Created by: Kenrick Beckett

 Name: Chat Engine
 */

var instance = false;
var state;
var mes;
var file;

function Conversation (username) {
    this.username = username;
    this.update = updateConversations;
    this.getState = getStateOfConversations;
}

//gets the state of the chat
function getStateOfConversations(){

    if(!instance){
        console.log("getStateOfConversations");
        instance = true;
        $.ajax({
            type: "POST",
            url: "conversation_script.php",
            data: {
                'function': 'getState',
                'username': conversation.username
            },
            dataType: "json",
            failure: function(data) {
                console.log("FAILURE");
            },
            success: function(data){
                console.log("SUCCESS: inside getStateOfConversation");
                console.log(data.fuckup);
                if(data.friend_name){
                    console.log(data.friend_name);
                    for (var i = 0; i < data.friend_name.length; i++) {
                        var table = document.getElementById("table-conversation");
                        // Insert a row in the table at the last row
                        var newRow   = table.insertRow(table.rows.length);

                        // Insert a cell in the row at index 0
                        var newCell  = newRow.insertCell(0);
                        newCell.className = "table_friends_image";
                        // Append a text node to the cell
                        var pp = document.createElement('img');
                        pp.src = "images/" + data.friend_image[i];
                        pp.className = "table_friends_picture";
                        newCell.appendChild(pp);

                        var newCell2 = newRow.insertCell(1);
                        newCell2.className = "chat_border";
                        //newCell2.onclick = new_chat(data.friend_username[i]);
                        newCell2.addEventListener("click", new_chat(data.friend_username[i]) , false);//new_chat(data.friend_username[i]), false);

                        var friend_name_div = document.createElement("div");
                        friend_name_div.className = "friend_name";
                        friend_name_div.appendChild(document.createTextNode(data.friend_name[i]));

                        var time_stamp_div = document.createElement("div");
                        time_stamp_div.className = "time_stamp";
                        time_stamp_div.appendChild(document.createTextNode(data.last_message_time[i]));

                        friend_name_div.appendChild(time_stamp_div);
                        newCell2.appendChild(friend_name_div);

                        var last_message_div = document.createElement("div");
                        last_message_div.className = "last_message";
                        last_message_div.appendChild(document.createTextNode(data.last_message[i]));

                        newCell2.appendChild(last_message_div);

                    }
                }
                //document.getElementById('tablediv-message').scrollTop = document.getElementById('tablediv-message').scrollHeight;
                state = data.state;
                instance = false;
            }
        });
    }
}

//Updates the chat
function updateConversations(){
    if(!instance){
        instance = true;
        $.ajax({
            type: "POST",
            url: "conversation_script.php",
            data: {
                'function': 'update',
                'state': state,
                'username': chat.username,
                'friend': chat.friend
                //'file': file
            },
            dataType: "json",
            success: function(data){
                if(data.messages){
                    for (var i = 0; i < data.messages.length; i++) {
                        $('#table-message span').append($("<p>"+ data.users[i] + ": " + data.messages[i] + "\t" + data.time[i] +"</p>"));
                    }
                    //document.getElementById('tablediv-message').scrollTop = document.getElementById('tablediv-message').scrollHeight;
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

