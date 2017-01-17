<?php
require_once('connectvars.php');
$function = $_POST['function'];
$username = $_POST['username'];
$friend = $_POST['friend'];
$log = array();

$messages_array = array();
$user_array = array();
$time_array = array();

$c_id_query = "SELECT c_id FROM conversation WHERE ((user_one =  '$username' AND user_two = '$friend' ) OR (user_one = '$friend'  AND user_two  =  '$username' ))";
$c_id_result = mysqli_query($dbc, $c_id_query);
$c_id_result = mysqli_fetch_array($c_id_result);
$c_id = $c_id_result['c_id'];

$friend_query = "SELECT profile_pic, first_name, last_name FROM profiles WHERE username = '$friend'";
$friend_result = mysqli_query($dbc, $friend_query);
$friend_pic_row = mysqli_fetch_array($friend_result);
$friend_pic = $friend_pic_row['profile_pic'];
$friend_whole_name = $friend_pic_row['first_name'] . " " . $friend_pic_row['last_name'];

switch($function) {

    case('getState'):
        mysqli_set_charset($dbc, "utf8");
        $log['c_id'] = $c_id;
        $log['c_id_query'] = $c_id_query;
        $get_state_query = "SELECT R.cr_id,TIME_FORMAT(R.time, '%H:%i') 
            AS time,R.reply,U.username, U.first_name FROM profiles U, conversation_reply 
            R WHERE R.user_id_fk=U.username AND R.c_id_fk=" . $c_id . " ORDER BY R.cr_id ASC";
        $log['query'] = $get_state_query;
        $get_state_result = mysqli_query($dbc, $get_state_query);
        while ($get_state_row = mysqli_fetch_array($get_state_result)) {
            array_push($messages_array, $get_state_row['reply']);
            array_push($user_array, $get_state_row['first_name']);
            array_push($time_array, $get_state_row['time']);

        }
        $log['messages'] = $messages_array;
        $log['users'] = $user_array;
        $log['time'] = $time_array;
        $log['state'] = count($messages_array);
        $log['profile_pic'] = $friend_pic;
        $log['friend_name'] = $friend_whole_name;
        /*if(file_exists('chat.txt')){
          $lines = file('chat.txt');
        }
        $log['state'] = count($lines); */
        break;

    case('update'):
        mysqli_set_charset($dbc, "utf8");
        $update_query = "SELECT R.cr_id,TIME_FORMAT(R.time, '%H:%i') 
            AS time,R.reply,U.username, U.first_name FROM profiles U, conversation_reply 
            R WHERE R.user_id_fk=U.username AND R.c_id_fk=" . $c_id . " ORDER BY R.cr_id ASC";
        $update_result = mysqli_query($dbc, $update_query);
        $log['count'] = $_POST['state'];
        if ($_POST['state'] != mysqli_num_rows($update_result)) {
            $messages_array = array();
            $user_array = array();
            $time_array = array();

            while ($get_state_row = mysqli_fetch_array($update_result)) {
                array_push($messages_array, $get_state_row['reply']);
                array_push($user_array, $get_state_row['first_name']);
                array_push($time_array, $get_state_row['time']);
            }

            $messages_array = array_slice($messages_array, $_POST['state']);
            $user_array = array_slice($user_array, $_POST['state']);
            $time_array = array_slice($time_array, $_POST['state']);


            $log['messages'] = $messages_array;
            $log['users'] = $user_array;
            $log['time'] = $time_array;
            $log['profile_pic'] = $friend_pic;
            $log['friend_name'] = $friend_whole_name;
            $log['state'] = count($messages_array) + $_POST['state'];
        } else {
            $log['state'] = $_POST['state'];
            $log['messages'] = false;
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

    case('send'):
        $nickname = htmlentities(strip_tags($_POST['username']));
        $message = $_POST['message'];
        //$message = htmlentities(strip_tags($_POST['message']));
        //$message = htmlentities($message, 0, 'UTF-8');
        $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
        if(preg_match($reg_exUrl, $message, $url)) {
            $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
        }
        $message = mysqli_real_escape_string($dbc, $message);
        mysqli_set_charset($dbc, "utf8");
        $query = "INSERT INTO conversation_reply (reply, user_id_fk, time, c_id_fk) VALUES ('$message', '$nickname', NOW(), " . $c_id . ")";
        $result = mysqli_query($dbc, $query);
        $conv_update_time = "UPDATE conversation SET time = NOW() WHERE c_id = " . $c_id ;

        mysqli_query($dbc, $conv_update_time);
        /* $nickname = htmlentities(strip_tags($_POST['nickname']));
            $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
             $message = htmlentities(strip_tags($_POST['message']));
        if(($message) != "\n"){

            if(preg_match($reg_exUrl, $message, $url)) {
                  $message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank">'.$url[0].'</a>', $message);
               }


            fwrite(fopen('chat.txt', 'a'), "<span>". $nickname . "</span>" . $message = str_replace("\n", " ", $message) . "\n");
        } */
        break;

}

echo json_encode($log);

?>