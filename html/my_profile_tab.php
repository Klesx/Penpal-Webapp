<!DOCTYPE html>
<html>
<head>
    <title> Penpal - My Profile </title>
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="css/tab.css" type="text/css">

</head>

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="js/tab.js"></script>

<?php
    require_once('connectvars.php');
    require_once('user_data.php');
?>

<div class="container">

    <ul class="tabs">
        <li class="tab-link" data-tab="tab-1">
            <a href="home_tab.php">Home</a>
        </li>
        <li class="tab-link current" data-tab="tab-2" >
            <a href="my_profile_tab.php" >My profile</a>
        </li>
        <li class="tab-link" data-tab="tab-3">
            <a href="messaging_tab.php" >Messaging<font color = "green"> (2) </font></a>
        </li>
        <li class="tab-link" data-tab="tab-4">
            <a href="personal_details_tab.php" >Personal Details</a>
        </li>
        <li class="tab-link" data-tab="tab-5">
            <a href="edit_profile_tab.php" >Edit Profile</a>
        </li>
        <li class="tab-link" data-tab="tab-6">
            <a href="search_tab.php" >Language partner search</a>
        </li>
    </ul>
    <div id="tab-2" class="tab-content current">
        <div class="profile_container">

            <h2 class = "text_center" > Create Profile / Edit Profile </h2>

            <br/>
            <div class = "profile_picture"> <img height="150" width="150" src="images/<?php echo $profile_pic_image; ?>" alt="Profile Image"/>
            </div>
            <div class = "profile_name" > <?php echo $first_name . " ", $last_name; ?>
                <div class = "status"> (Offline)
                </div>
                <div class = "age"> Born on: <?php echo $age; ?>
                </div>
                <div class = "location"> <?php echo $location; ?>
                </div>
                <div class = "sex"> <img src="images/<?php
                    if ($gender == "Male") {
                        echo "male";
                    } else {
                        echo "female";
                    }
                    ?>.png"/>
                </div>

                <div class = "border_line">
                </div>
                <div class = "text"> Native
                </div>
                <div class = "native_language">

                    <table >
                        <tr class = "table_language">
                            <td>
                                <?php
                                foreach($native_languages as &$l) {
                                    ?>
                                    <div style = "font-size: 14px;">
                                        <?php
                                        echo $l;
                                        ?>
                                        <img class = "flag" src = "images/16/United-Kingdom.png"/>
                                    </div>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </table>

                </div>

                <div class = "border_line">
                </div>
                <div class = "text">Learning
                </div>

                <div class = "learning_language">

                    <table >
                        <?php

                            for($y = 0; $y < count($learning_languages); $y++) {
                                if(empty($learning_languages[$y])){
                                    continue;
                                }
                        ?>
                        <tr class = "table_language">
                            <td>
                                <div style = "font-size: 14px;"><?php echo $learning_languages[$y]; ?><img class = "flag" src = "images/16/Spain.png"/>
                                </div>
                            </td>
                            <td>
                                <div class = "language_level">
                                    <img src="images/0<?php echo $learning_languages_levels[$y]; ?>.png"/><br>
                                </div>
                            </td>


                        </tr>
                        <?php

                        }
                        ?>
                    </table>
                </div>
            </div>

            <div class = "text"> Introduction
                <div class = "border_line">
                </div>


                <div class="introduction">
                    <?php echo $intro ?>
                </div>

                <div>
                    <button type="button">Edit profile</button>
                </div>

                <br/>
                <div class = "login_date"> Last login: <?php echo $last_login; ?>
                </div>
                <div class = "profile_date"> Profile last updated: <?php echo $last_profile_change; ?>
                </div>


             </div>


        </div>
    </div>
</div><!-- container -->

</body>
</html>