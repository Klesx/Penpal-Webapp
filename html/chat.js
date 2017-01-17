/*
 Created by: Kenrick Beckett

 Name: Chat Engine
 */

var instance = false;
var state;
var mes;
var file;

function translate_shit(message, num) {
    console.log("INSIDE TRANSLATE FUNCTION");
    console.log("SOURCE LANGUAGE: " + source_language);
    console.log("TARGET LANGUAGE: " + target_language);
    console.log("MESSAGE: " + message);
    var elem = document.getElementById("translated_message_" + num);
    var translation_response = '';

    if (target_language == source_language) {
        elem.innerHTML = message;
    } else {
        $.ajax({
            type: "GET",
            url: "https://www.googleapis.com/language/translate/v2",
            data: {
                key: "AIzaSyAmbTFvrX30CV_MYC2D78ivxwD8xIy2I94",
                source: source_language,
                target: target_language,
                q: message
            },
            dataType: 'jsonp',
            success: function (data) {
                console.log("SUCCES INSIDE TRANSALTE SHIT");
                translation_response = (data.data.translations[0].translatedText);
                console.log("TRANSALATION RESPONSE: " + translation_response);
                elem.innerHTML = (data.data.translations[0].translatedText);
            },
            failure: function (data) {
                console.log("TRANSLATION FAILED");
                elem.innerHTML = message;
            }
        });
    }


}

function Chat (username, friend) {
    console.log("CREATING NEW CHAT");
    console.log("USERNAME: " + username);
    console.log("FRIEND: " + friend);
    this.username = username;
    this.friend = friend;
    this.update = updateChat;
    this.send = sendChat;
    this.getState = getStateOfChat;
    this.profile_picture_flag = false;
}

function new_chat() {
    $('#table-message span').text('');
    chat = new Chat('solan1803', chat_friend);
    chat.getState();
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
                'function': 'getState',
                'username': chat.username,
                'friend': chat.friend
                //'file': file
            },
            dataType: "json",
            failure: function(data) {
                console.log(query);
            },
            success: function(data){
                console.log("SUCCESS: inside getStateOfChat");
                if(data.messages){
                    var table = document.getElementById("table-message");
                    var string = '';
                    for (var i = 0; i < data.messages.length; i++) {
                        string += "<tr>";
                        string += "<td>";
                        string += data.users[i] + ": ";
                        string += "</td>";
                        var m = data.messages[i].replace(/'/g, "\\'");
                        m = m.replace(/"/g, "\\'");
                        string += '<td id="button" class="popupHoverElement" onmouseover="translate_shit(\'' + m + '\', \'' + i + '\')">';
                        string += data.messages[i];
                        string += '<span id="translated_message_' + i + '\" class="popupBox"></span>';
                        string += "</td>";
                        string += "<td >";
                        string += data.time[i];
                        string += "</td>";
                        string += "</tr>";
                    }
                    table.innerHTML = string;
                    
                    document.getElementById('tablediv-message').scrollTop = document.getElementById('tablediv-message').scrollHeight;
                }
                if(!chat.profile_picture_flag){
                    console.log("INSIDE profile pic flag check in getStateOFCHAT");
                    console.log(data.profile_pic);
                    var pic = document.getElementById("chat_friend_picture");
                    pic.src = "images/" + data.profile_pic;

                    chat.profile_picture_flag = true;
                    $('#chat_friend_name span').text(data.friend_name);
                }
                state = data.state;
                instance = false;
            }
        });
    }
}

//Updates the chat
function updateChat(){
    if(!instance){
        console.log("updateChat");
        instance = true;
        
        $.ajax({
            type: "POST",
            url: "chat_script.php",
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
                    var table = document.getElementById("table-message");
                    var string = table.innerHTML;
                    for (var i = 0; i < data.messages.length; i++) {
                        string += "<tr>";
                        string += "<td>";
                        string += data.users[i] + ": ";
                        string += "</td>";
                        var index = parseInt(i)+parseInt(state);
                        var m = data.messages[i].replace(/'/g, "\\'");
                        m = m.replace(/"/g, "\\'");
                        string += '<td id="button" class="popupHoverElement" onmouseover="translate_shit(\'' + m + '\', \'' + index + '\')">';
                        string += data.messages[i];
                        string += '<span id="translated_message_' + index + '\" class="popupBox"></span>';
                        string += "</td>";
                        string += "<td >";
                        string += data.time[i];
                        string += "</td>";
                        string += "</tr>";
                    }
                    table.innerHTML = string;

                    document.getElementById('tablediv-message').scrollTop = document.getElementById('tablediv-message').scrollHeight;
                }
                if(!chat.profile_picture_flag){
                    console.log("INSIDE profile pic flag check");
                    console.log(data.profile_pic);
                    var pic = document.getElementById("chat_friend_picture");
                    pic.src = "images/" + data.profile_pic;

                    chat.profile_picture_flag = true;

                    $('#chat_friend_name span').text(data.friend_name);
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
            'username': chat.username,
            'friend': chat.friend
            //'file': file
        },
        dataType: "json",
        success: function(data){
            updateChat();
        },
    });
}

/*
 Created by: Kenrick Beckett

 Name: Chat Engine
 */

var instance2 = false;
var state2;
var mes2;
var file2;


function Conversation (username) {
    this.username = username;
    this.update = updateConversations;
    this.getState = getStateOfConversations;
    this.saved_last_message_time = '';
}
function f(mate){
    chat_friend = mate;
    new_chat();
}
//gets the state of the chat
function getStateOfConversations(){

    if(!instance2){
        console.log("getStateOfConversations");
        instance2 = true;
        $.ajax({
            type: "POST",
            url: "conversation_script.php",
            data: {
                'function': 'getState',
                'username': conversation.username
            },
            dataType: "json",
            error: function(data) {
              console.log("hi");
            },
            failure: function(data) {
                console.log("FAILURE");
            },
            success: function(data){
                console.log("SUCCESS: inside getStateOfConversation");
                console.log(data.fuckup);
                if(data.friend_name){
                    console.log(data.friend_name);
                    var table = document.getElementById("table-conversation");
                    var string = '';
                    for (var i = 0; i < data.friend_name.length; i++) {

                        string += "<tr>";
                            string += "<td class='table_friends_image'>";
                                string += "<img src='images/" + data.friend_image[i] + "' class='table_friends_picture'" + " />";
                            string += "</td>";

                        string += '<td class="chat_border" onclick="f(\'' + data.friend_username[i] + '\')" />';
                            string += "<div class='friend_name'>";
                                string += data.friend_name[i];
                                string += "<div class='time_stamp'>" + data.last_message_time[i] + "</div>";
                            string += "</div>";

                            string += "<div class='last_message'>" + data.last_message[i];
                            string += "</div>";
                        string += "</td>";
                        string += "</tr>";

                    }
                    table.innerHTML = string;
                }
                conversation.saved_last_message_time = data.last_message_time;
                //document.getElementById('tablediv-message').scrollTop = document.getElementById('tablediv-message').scrollHeight;
                state2 = data.state;
                instance2 = false;
            }
        });
    }
}

//Updates the chat
function updateConversations(){
    if(!instance2){
        console.log("INSIDE UPDATE CONVERSATIONS");
        instance2 = true;
        $.ajax({
            type: "POST",
            url: "conversation_script.php",
            data: {
                'function': 'update',
                'state': state2,
                'username': conversation.username,
                'last_message_time': conversation.saved_last_message_time
                //'file': file
            },
            dataType: "json",
            failure: function(data){
              console.log("FIALURE UPDATE CONVERSATIONS");
            },
            success: function(data){
                console.log("SUCCESS: inside updateConversations");
                console.log(data.fuckup);
                if(data.friend_name){
                    console.log(data.friend_name);
                    var table = document.getElementById("table-conversation");
                    var string = '';
                    for (var i = 0; i < data.friend_name.length; i++) {

                        string += "<tr>";
                        string += "<td class='table_friends_image'>";
                        string += "<img src='images/" + data.friend_image[i] + "' class='table_friends_picture'" + " />";
                        string += "</td>";

                        string += '<td class="chat_border" onclick="f(\'' + data.friend_username[i] + '\')" />';
                        string += "<div class='friend_name'>";
                        string += data.friend_name[i];
                        string += "<div class='time_stamp'>" + data.last_message_time[i] + "</div>";
                        string += "</div>";

                        string += "<div class='last_message'>" + data.last_message[i];
                        string += "</div>";
                        string += "</td>";
                        string += "</tr>";

                    }
                    table.innerHTML = string;
                }
                instance2 = false;
                state2 = data.state;
            }
        });
    }
    // else {
    //     setTimeout(conversation.update(), 1500);
    // }
}

