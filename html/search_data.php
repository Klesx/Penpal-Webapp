<?php
$user_results = '';
if (isset($_COOKIE['username'])) {
    if (isset($_POST['submit'])) {
        $dbc = mysqli_connect('localhost', 'root', 'Master95', 'penpal_database')
        or die('Error connecting to mysql server');

        $native_language = $_POST['native_language'];
        $learning_language = $_POST['learning_language'];
        $language_level = $_POST['language_level'];
        $country = $_POST['country'];
        $year_max = !empty($_POST['age_min']) ? 2016 - $_POST['age_min'] : '';
        $year_min = !empty($_POST['age_max']) ? 2016 - $_POST['age_max'] : '';
        $gender = $_POST['selSex'];
        $search_username = $_POST['name'];
        $order_by = $_POST['order_by'];

        /*echo "SUP</br>";
        echo $native_language . " ";
        echo $learning_language . " ";
        echo $country . " ";
        echo $year_max . " ";
        echo $year_min . " ";
        echo $gender . " ";
        echo $search_username . " ";
        echo $order_by . " ";
        echo "end sup</br>"; */

        $search_user = "SELECT * FROM profiles WHERE year < 2016 ";
        !empty($native_language) ? $search_user .= "AND (native_language_one = '$native_language' 
                        OR native_language_two = '$native_language' 
                        OR native_language_three = '$native_language'
                        OR native_language_four = '$native_language') " : $search_user .= '';
        (!empty($learning_language) && !empty($language_level)) ?
            $search_user .= "AND ((learning_language_one = '$learning_language' AND learning_language_level_one >= '$language_level') 
                        OR (learning_language_two = '$learning_language' AND learning_language_level_two >= '$language_level') 
                        OR (learning_language_three = '$learning_language' AND learning_language_level_three >= '$language_level') 
                        OR (learning_language_four = '$learning_language' AND learning_language_level_four >= '$language_level')) "
            : $search_user .= '';
        !empty($country) ? $search_user .= "AND country = '$country' " : $search_user .= '';
        !empty($year_min) ? $search_user .= "AND year <= $year_max " : $search_user .= '';
        !empty($year_max) ? $search_user .= "AND year >= $year_min " : $search_user .= '';
        !empty($gender) ? $search_user .= "AND gender = '$gender' " : $search_user .= '';
        !empty($search_username) ? $search_user .= "AND username = '$search_username' " : $search_user .= '';
        if (!empty($order_by)) {
            switch ($order_by) {
                case "Login Date":
                    $search_user .= " ORDER BY last_login DESC";
                    break;
                case "Profile Date":
                    $search_user .= " ORDER BY last_profile_edit DESC";
                    break;
                case "Name":
                    $search_user .= " ORDER BY first_name ASC";
                    break;
                case "Age":
                    $search_user .= " ORDER BY year DESC, month DESC, day DESC";
            }
        }

        $user_results = mysqli_query($dbc, $search_user)
        or die("Error querying database");

        /*$user_array = array();
        while ($user_row = mysqli_fetch_array($user_results)) {
            array_push($user_array, $user_row['username']);
        } */

        mysqli_close($dbc);
    }

}


?>