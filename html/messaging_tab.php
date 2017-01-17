<!DOCTYPE html>
<html>
<head>
    <title> Penpal - Profile </title>
    <meta charset="UTF-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="css/tab.css" type="text/css">
    <link rel="stylesheet" href="css/chat.css" type="text/css">
    <link rel="stylesheet" href="css/translation.css" type="text/css">
<?php
require_once('connectvars.php');
require_once('user_data.php');
?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script src="js/user.js"></script>
    <script src="js/tab.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>var chat;var chat_friend;var source_language = "en";var target_language = "en";</script>
    <script type="text/javascript" src="chat.js"></script>

    <script type="text/javascript">

        var conversation = new Conversation("<?php echo $username ?>");
        conversation.getState();
        $(function() {

            //chat.getState();

            // watch textarea for key presses
            $("#sendie").keydown(function(event) {

                var key = event.which;

                //all keys including return.
                if (key >= 33) {

                    var maxLength = $(this).attr("maxlength");
                    var length = this.value.length;

                    // don't allow new content if length is maxed out
                    if (length >= maxLength) {
                        event.preventDefault();
                    }
                }
            });
            // watch textarea for release of key press
            $('#sendie').keyup(function(e) {

                if (e.keyCode == 13) {
                    console.log("RETUURN");
                    var text = $(this).val();
                    var maxLength = 100;//$(this).attr("maxlength");
                    var length = text.length;

                    // send
                    if (length <= maxLength + 1) {
                        console.log("HI");
                        chat.send(text, chat.username);
                        $(this).val("");

                    } else {
                        console.log("ELSE");
                        console.log(maxLength);
                        $(this).val(text.substring(0, maxLength));

                    }


                }
            });

        });

        function addAccent(letter) {
            $('#sendie').val($('#sendie').val() + letter);
        }

        function getAccents(sel) {
            var div = document.getElementById("accents");
            while (div.hasChildNodes()) {
                div.removeChild(div.lastChild);
            }
            if (sel.value == "fr") {
                var accents_fr = ['à', 'À', 'â', 'Â', 'æ', 'Æ', 'ç', 'Ç', 'é', 'É', 'è', 'È', 'ê', 'Ê', 'ë', 'Ë', 'î', 'Î', 'ï', 'Ï', 'ô', 'Ô', 'œ', 'Œ', 'ù', 'Ù', 'û', 'Û', 'ü', 'Ü', 'ÿ', 'Ÿ'];
                for ( i = 0; i < accents_fr.length; i++) {
                    var a_fr = document.createElement('button');
                    var linkText_fr = document.createTextNode(accents_fr[i]);
                    a_fr.appendChild(linkText_fr);
                    const j = i;
                    a_fr.onclick = function() {console.log("CLICKED ACCENT");addAccent(accents_fr[j]);};
                    div.appendChild(a_fr);
                }
            } else if (sel.value == "es") {
                var accents_es = ['á', 'Á', 'é', 'É','í','Í','ñ','Ñ','ó','Ó','Ú','ü','Ü' ];
                for ( i = 0; i < accents_es.length; i++) {
                    var a_es = document.createElement('button');
                    var linkText_es = document.createTextNode(accents_es[i]);
                    a_es.appendChild(linkText_es);
                    const j = i;
                    a_es.onclick = function() {console.log("CLICKED ACCENT");addAccent(accents_es[j]);};
                    div.appendChild(a_es);
                }
            } else if (sel.value == "de") {
                var accents_de = ['ä','Ä','ö','Ö','ü','Ü','ß'];
                for ( i = 0; i < accents_de.length; i++) {
                    var a_de = document.createElement('button');
                    var linkText_de = document.createTextNode(accents_de[i]);
                    a_de.appendChild(linkText_de);
                    const j = i;
                    a_de.onclick = function() {console.log("CLICKED ACCENT");addAccent(accents_de[j]);};
                    div.appendChild(a_de);
                }
            }
        }

        function setSource(sel) {
            source_language = sel.value;
        }

        function setTarget(sel) {
            target_language = sel.value;
        }

    </script>

</head>

<body onload="setInterval('conversation.update()', 1000); setInterval(function() {if (chat != null) {chat.update();}}, 1000);">
<?php
if (isset($_GET['username']) && isset($_GET['friend']) && ($_COOKIE['username'] == $_GET['username'])) {
    $conv_friend = $_GET['friend'];
    $new_chat_query = "INSERT INTO conversation (user_one, user_two, time) VALUES ('$username', '$conv_friend', NOW())";
    $new_chat_result = mysqli_query($dbc, $new_chat_query);
}
?>

<script>

//    function updateDetails() {
//        $.get("update_details.php");
//    }
//
//    // Search for a friend
//    function searchFriend() {
//        return false;
//    }
//
//    // Add message to user chat
//    function sendMessage(message) {
//        var message_length = message.trim().length;
//        if (message_length > 0) {
//
//            //Create the message bubble
//            var div = document.createElement("div");
//            div.className = "bubble_user";
//
//            div.style.minHeight = "55px";
//            div.style.maxWidth = "195px";
//
//            //And the message
//            var p = document.createElement("p");
//            p.innerHTML = message.trim();
//            p.style = "padding-left: 8px;"
//
//            var message_table = document.getElementById("table_message");
//            var row = message_table.insertRow(-1);
//            var cell = row.insertCell(0);
//
//            div.appendChild(p);
//            cell.appendChild(div);
//
//        }
//        return false;
//    }


</script>

<?php
//require_once('connectvars.php');
//require_once('user_data.php');
$adrian_solan_query = "SELECT R.cr_id,TIME_FORMAT(R.time, '%H:%I') AS time,R.reply,U.username, U.first_name FROM profiles U, conversation_reply R WHERE R.user_id_fk=U.username AND R.c_id_fk='1' ORDER BY R.cr_id ASC";
$adrian_solan_result = mysqli_query($dbc, $adrian_solan_query);

?>

<div class="container">

    <ul class="tabs">
        <li class="tab-link" data-tab="tab-1">
            <a href="home_tab.php">Home</a>
        </li>
        <li class="tab-link" data-tab="tab-2">
            <a href="my_profile_tab.php">My profile</a>
        </li>
        <li class="tab-link current" data-tab="tab-3">
            <a href="messaging_tab.php">Messaging<font color="green"> (2) </font></a>
        </li>
        <li class="tab-link" data-tab="tab-4">
            <a href="personal_details_tab.php">Personal Details</a>
        </li>
        <li class="tab-link" data-tab="tab-5">
            <a href="edit_profile_tab.php">Edit Profile</a>
        </li>
        <li class="tab-link" data-tab="tab-6">
            <a href="search_tab.php">Language partner search</a>
        </li>
    </ul>


    <div id="tab-3" class="tab-content current">

        <div class="chat_container">


            <!-- The search box !-->
            <div class="search_container">

                <!-- User bar !-->
                <div class="user_container">
                    <img class="chat_friend_picture" src="images/<?php echo $profile_pic_image?>">
                    <div class="chat_friend_name"><?php echo $first_name . " " . $last_name?></div>
                    </img>
                </div>

                <div class="search_box">
                    <input type="text" placeholder="Search or start a new chat" class="search_box_input">
                </div>

                <!-- List of friends !-->
                <div class="friends_container">

                    <table id="table-conversation" class="table_friends">

                    </table>

                </div>

            </div>

            <!-- Current chat for current friend !-->
            <div class="message_container">

                <div id="message_name_bar" class="message_name_bar">
                    <img id="chat_friend_picture" class="chat_friend_picture"/>

                    <div id="chat_friend_name" class="chat_friend_name"><span></span>
                        <br/><div class="chat_friend_status"> Online</div></div>

                    <div class="translation_source_target">
                        <table>
                            <tr>
                                <td>
                                    <label>Source Language:</label>
                                </td>
                                <td>
                                    <select name="source_language" onchange="setSource(this)" >
                                        <option name="english" value="en">English</option>
                                        <option name="french" value="fr" >French</option>
                                        <option name="spanish" value="es">Spanish</option>
                                        <option name="german" value="de">German</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Target Language:</label>
                                </td>
                                <td>
                                    <select name="target_language" onchange="setTarget(this)">
                                        <option name="english" value="en">English</option>
                                        <option name="french" value="fr" >French</option>
                                        <option name="spanish" value="es">Spanish</option>
                                        <option name="german" value="de">German</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                    </div>


                </div>

                <div id="tablediv-message" class="message">

                    <table id="table-message">

                    </table>
                </div>

                <div >
                    <select name="special_characters" onchange="getAccents(this)">
                        <option name="default">Select Language</option>
                        <option name="french" value="fr" >French</option>
                        <option name="spanish" value="es">Spanish</option>
                        <option name="german" value="de">German</option>
                    </select>
                    <div id="accents" class="accents">
                    </div>
                </div>
                <div class="message_input_bar">
                    <input type="text" placeholder="Type to send a message" id="sendie" class="message_input">
                </div>



            </div>
            

        </div>


    </div>


</div><!-- container -->

<script>
//    var message = document.getElementById('message_input');
//    message.onkeypress = function (e) {
//        if (!e) e = window.event;
//        if (e.keyCode == '13') {
//            sendMessage(message.value);
//            return false;
//        }
//    };
</script>

</body>
</html>
