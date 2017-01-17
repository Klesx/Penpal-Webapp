<!DOCTYPE html>
<html>
<head>
    <title> Penpal - Personal Details </title>
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="css/tab.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
    <script type="text/javascript" src="js/tab.js"></script>
</head>

<body>



<?php
    require_once('connectvars.php');
    require_once('user_data.php');
?>

<div class="container">

    <ul class="tabs">
        <li class="tab-link" data-tab="tab-1">
            <a href="home_tab.php">Home</a>
        </li>
        <li class="tab-link" data-tab="tab-2" >
            <a href="my_profile_tab.php" >My profile</a>
        </li>
        <li class="tab-link" data-tab="tab-3">
            <a href="messaging_tab.php" >Messaging<font color = "green"> (2) </font></a>
        </li>
        <li class="tab-link current" data-tab="tab-4">
            <a href="personal_details_tab.php" >Personal Details</a>
        </li>
        <li class="tab-link" data-tab="tab-5">
            <a href="edit_profile_tab.php" >Edit Profile</a>
        </li>
        <li class="tab-link" data-tab="tab-6">
            <a href="search_tab.php" >Language partner search</a>
        </li>
    </ul>

    <div id="tab-4" class="tab-content current">

        Change your personal details here. </br> (Note you cannot change your gender or date of birth)

        <div id = "personal_details" class = "personal_details">
            </br>
            <table id = "table_personal_details">

                <tr>
                    <td align="right"> First name: </td>
                    <td> <input type="text" id="fname" style = "width: 220px;"> <br> </td>

                </tr>
                <tr>
                    <td align="right"> Last name: </td>
                    <td> <input type="text" id="lname" style = "width: 220px;"> <br> </td>
                </tr>
                <tr>
                    <td align="right"> Email address: </td>
                    <td> <input type="text" id="email" style = "width: 220px;"> <br> </td>
                </tr>
                <tr>
                    <td align="right"> Password: </td>
                    <td> <input type="password" id="pword" style = "width: 220px;"> <br> </td>
                </tr>
                <tr>
                    <td align="right"> Confirm new password: </td>
                    <td> <input type="password" id="confirm_pword" style = "width: 220px;"> <br> </td>
                </tr>
                <tr>
                    <td align="right"> Location: </td>
                    <td> <input type="text" id="location" style = "width: 220px;"> <br> </td>
                </tr>
                <tr>
                    <td align = "right">
                        <input type = "submit" onclick = "updateDetails();" value = "Save"/>
                    </td>
                </tr>

            </table>
        </div>
    </div>
</div><!-- container -->

</body>
</html>