<?php

require_once('connectvars.php');
$function = $_POST['function'];
$username = $_POST['username'];

$log = array();

$friend_image = array();
$friend_username = array();
$friend_name = array();
$last_message_time = array();
$last_message = array();

/*$messages_array = array();
$user_array = array();
$time_array = array();

$c_id_query = "SELECT c_id FROM conversation WHERE ((user_one =  '$username' AND user_two = '$friend' ) OR (user_one = '$friend'  AND user_two  =  '$username' ))";
$c_id_result = mysqli_query($dbc, $c_id_query);
$c_id_result = mysqli_fetch_array($c_id_result);
$c_id = $c_id_result['c_id']; */
$log['fuckup'] = "got fucked";
$conversations_query = "SELECT U.username, C.time, U.first_name, U.last_name, U.profile_pic, C.c_id " .
    "FROM profiles U,conversation C " .
    "WHERE " .
    "CASE " .

    "WHEN C.user_one = 'solan1803' " .
    "THEN C.user_two = U.username " .
    "WHEN C.user_two = 'solan1803' " .
    "THEN C.user_one= U.username " .
    "END " .

    "AND " .
    "(C.user_one ='solan1803' OR C.user_two ='solan1803') ORDER BY C.time DESC";
$conversations_result = mysqli_query($dbc, $conversations_query);
$log['conversations_query'] = $conversations_query;
while ($conv_row = mysqli_fetch_array($conversations_result)) {
    array_push($friend_username, $conv_row['username']);
    array_push($friend_name, $conv_row['first_name'] . " " . $conv_row['last_name']);
    array_push($friend_image, $conv_row['profile_pic']);

    mysqli_set_charset($dbc, "utf8");
    $last_message_query = "SELECT cr_id, TIME_FORMAT(time, '%H:%i') AS time, reply " .
        "FROM conversation_reply " .
        "WHERE c_id_fk=" . $conv_row['c_id'] . " ".
        "ORDER BY cr_id DESC LIMIT 1";

    $last_message_result = mysqli_query($dbc, $last_message_query);
    $last_message_row = mysqli_fetch_array($last_message_result);
    array_push($last_message, $last_message_row['reply']);

    array_push($last_message_time, $last_message_row['time']);
}

switch ($function) {

    case('getState'):


        $log['friend_username'] = $friend_username;
        $log['friend_name'] = $friend_name;
        $log['friend_image'] = $friend_image;
        $log['last_message'] = $last_message;
        $log['last_message_time'] = $last_message_time;
        $log['state'] = count($friend_username);
        /*if(file_exists('chat.txt')){
          $lines = file('chat.txt');
        }
        $log['state'] = count($lines); */
        break;

    case('update'):
        $log['hi'] = "hi";
        $check_any_new_message = 0;
        for ($i = 0; $i < count($last_message_time); $i++) {
            if ($last_message_time[$i] != $_POST['last_message_time'][$i]) {
                $check_any_new_message = 1;
                break;
            }
        }

        if (($_POST['state'] != mysqli_num_rows($conversations_result)) || $check_any_new_message == 1) {
            
            $log['friend_username'] = $friend_username;
            $log['friend_name'] = $friend_name;
            $log['friend_image'] = $friend_image;
            $log['last_message'] = $last_message;
            $log['last_message_time'] = $last_message_time;
            $log['state'] = count($friend_username);
        } else {
            $log['state'] = $_POST['state'];
            $log['friend_username'] = false;
        }
        /*$state = $_POST['state'];
        if(file_exists('chat.txt')){
           $lines = file('chat.txt');
         }
         $count =  count($lines);
         if($state == $count){
             $log['state'] = $state;
             $log['text'] = false;

             }
             else{
                 $text= array();
                 $log['state'] = $state + count($lines) - $state;
                 foreach ($lines as $line_num => $line)
                   {
                       if($line_num >= $state){
                     $text[] =  $line = str_replace("\n", "", $line);
                       }

                    }
                 $log['text'] = $text;
             }*/

        break;

}

echo json_encode($log);

?>