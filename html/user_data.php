<?php
    $username = $_COOKIE['username'];
    
    $query = "SELECT * FROM profiles WHERE username = '$username'";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_array($result);
    
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $intro = $row['introduction'];
    $gender = $row['gender'];
    //TODO: Sort out getting age correctly
    $age = $row['year'];
    $location = $row['location'];
    $last_login = $row['last_login'];
    $last_profile_change = $row['last_profile_change'];
    $profile_pic_image = $row['profile_pic'];
    
    $learning_languages = array();
    $native_languages = array();
    $learning_languages_levels = array();
    
    array_push($native_languages, $row['native_language_one']);
    array_push($native_languages, $row['native_language_two']);
    array_push($native_languages, $row['native_language_three']);
    array_push($native_languages, $row['native_language_four']);
    
    array_push($learning_languages, $row['learning_language_one']);
    array_push($learning_languages, $row['learning_language_two']);
    array_push($learning_languages, $row['learning_language_three']);
    array_push($learning_languages, $row['learning_language_four']);
    
    array_push($learning_languages_levels, $row['learning_language_level_one']);
    array_push($learning_languages_levels, $row['learning_language_level_two']);
    array_push($learning_languages_levels, $row['learning_language_level_three']);
    array_push($learning_languages_levels, $row['learning_language_level_four']);
?>