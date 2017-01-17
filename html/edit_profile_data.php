<?php
define('GW_UPLOADPATH', 'images/');
if (isset($_POST['changeprofilepic'])) {
    $profilepic = $_FILES['profilepic']['name'];
    $profilepic_type = $_FILES['profilepic']['type'];
    $profilepic_size = $_FILES['profilepic']['size'];
    if (!empty($profilepic)) {
        if (($profilepic_type == 'image/gif' || $profilepic_type == 'image/jpeg' || $profilepic_type == 'image/pjpeg' || $profilepic_type == 'image/png')
            && $profilepic_size > 0 && $profilepic_size < 3000000
        ) {
            if ($_FILES['profilepic']['error'] == 0) {
                $target = GW_UPLOADPATH . $profilepic;
                if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $target)) {
                    $profilequery = "UPDATE profiles SET profile_pic = '$profilepic' WHERE username = '$username'";
                    mysqli_query($dbc, $profilequery);
                    echo "You have successfully uploaded a new profile pic </br>";
                    $profile_pic_image = $profilepic;
                }
            } else {
                echo "Sorry there was an error uploading your profile pic";
            }
        } else {
            echo "Image is wrong type, or too big";
        }
        @unlink($_FILES['profilepic']['tmp_name']);
    } else {
        echo "Please choose a file";
    }
}
$edit_profile_error = "";
if (isset($_POST['update_profile'])) {
    $add_native_language = "";
    $add_learning_language = "";
    $add_learning_level = "";
    $new_intro = "";
    if (isset($_POST['add_native_language'])) {
        $add_native_language = $_POST['add_native_language'];
    }
    if (isset($_POST['add_learning_language'])) {
        $add_learning_language = $_POST['add_learning_language'];
    }
    if (isset($_POST['add_learning_level'])) {
        $add_learning_level = $_POST['add_learning_level'];
    }
    if (isset($_POST['introText'])) {
        $new_intro = $_POST['introText'];
    }

    if (!empty($add_native_language) || (!empty($add_learning_language) && !empty($add_learning_level)) || $new_intro != $intro) {

        $update_query = "UPDATE profiles SET";
        $count_native = count($native_languages);
        $add_query = "SELECT * FROM profiles WHERE username = '$username'";
        $add_result = mysqli_query($dbc, $add_query);
        $add_row = mysqli_fetch_array($add_result);

        if (!empty($add_native_language)) {

            if (empty($add_row['native_language_one'])) {
                $update_query .= " native_language_one =";
            } else if (empty($add_row['native_language_two'])) {
                $update_query .= " native_language_two =";
            } else if (empty($add_row['native_language_three'])) {
                $update_query .= " native_language_three =";
            } else if (empty($add_row['native_language_four'])) {
                $update_query .= " native_language_four =";
            }
            $update_query .= " '$add_native_language' ,";
        }

        if (!empty($add_learning_language) && !empty($add_learning_level)) {
            //$count_learning = count($learning_languages_levels);
            if (empty($add_row['learning_language_one'])) {
                $update_query .= " learning_language_one = '$add_learning_language' ,";
                $update_query .= " learning_language_level_one = '$add_learning_level' ,";
            } else if (empty($add_row['learning_language_two'])) {
                $update_query .= " learning_language_two = '$add_learning_language' ,";
                $update_query .= " learning_language_level_two = '$add_learning_level' ,";
            } else if (empty($add_row['learning_language_three'])) {
                $update_query .= " learning_language_three = '$add_learning_language' ,";
                $update_query .= " learning_language_level_three = '$add_learning_level' ,";
            } else if (empty($add_row['learning_language_four'])) {
                $update_query .= " learning_language_four = '$add_learning_language' ,";
                $update_query .= " learning_language_level_four = '$add_learning_level' ,";
            }
        }

        if (!empty($new_intro)) {
            $update_query .= " introduction = '$new_intro' ,";
        }
        $update_query .= " last_profile_change = CURDATE() WHERE username ='$username'";
        mysqli_query($dbc, $update_query)
        or die("Query failed");

        $self = $_SERVER['PHP_SELF'];
        header("Refresh: 5; url='$self'");
        echo "You have saved changes, page will refresh in 5 seconds!";

    } else {
        $edit_profile_error .= "No changes to be made!";
    }
}

if (isset($_GET['username']) && ($_COOKIE['username'] == $_GET['username'])) {
    $remove_query = "UPDATE profiles SET ";
    if (isset($_GET['native_language'])) {
        switch ($_GET['native_language']) {
            case 1:
                $remove_query .= "native_language_one = '' ,";
                break;
            case 2:
                $remove_query .= "native_language_two = '' ,";
                break;
            case 3:
                $remove_query .= "native_language_three = '' ,";
                break;
            case 4:
                $remove_query .= "native_language_four = '' ,";
                break;
        }
    }
    if (isset($_GET['learning_language'])) {
        switch ($_GET['learning_language']) {
            case 1:
                $remove_query .= "learning_language_one = '',";
                $remove_query .= " learning_language_level_one = '',";
                break;
            case 2:
                $remove_query .= "learning_language_two = '',";
                $remove_query .= " learning_language_level_two = '',";
                break;
            case 3:
                $remove_query .= "learning_language_three = '',";
                $remove_query .= " learning_language_level_three = '',";
                break;
            case 4:
                $remove_query .= "learning_language_four = '',";
                $remove_query .= " learning_language_level_four = '',";
                break;
        }
    }
    $remove_query .= " last_profile_change = CURDATE() WHERE username = '$username'";
    mysqli_query($dbc, $remove_query)
        or die("QUERY FUCKED UP");
    $self = $_SERVER['PHP_SELF'];
    header("Refresh: 8; url='$self'");
    echo "Successfully removed, page will refresh in five seconds!";
}

?>