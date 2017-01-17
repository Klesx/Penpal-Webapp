<!DOCTYPE html>
<html>
<head>
    <title> Penpal - Home </title>
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
        <li class="tab-link current" data-tab="tab-1">
            <a href="home_tab.php">Home</a>
        </li>
        <li class="tab-link" data-tab="tab-2" >
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

    <div id="tab-1" class="tab-content current">
        Welcome <font color = "red"> <?php echo $first_name . " ", $last_name; ?> </font> to PenPal! We are currently in the process of upgrading our site so you may see some poor design here and there.
    </div>
    


</div><!-- container -->

</body>
</html>