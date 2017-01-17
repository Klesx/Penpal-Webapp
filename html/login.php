<html>
<head>
</head>
<body>
<h2>login success </h2>

<?php
  $dbc = mysqli_connect('localhost', 'root', 'Master95', 'penpal_database')
    or die('Error connecting to mysql server');
    
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  echo 'USERNAME: ' . $username . '<br/>';
  echo 'PASSWORD: ' . $password . '<br/>';
  
  $search_user = "SELECT * FROM profiles WHERE username = '$username'". 
    " AND password = SHA('$password')";
  
  $user_result = mysqli_query($dbc, $search_user)
    or die("Error querying database");

  if (mysqli_num_rows($user_result) == 0) {
    // No user
    echo "Invalid username or password, please try again!<br/>";
  } else {
    // there will be one user
    echo "Successfully logged in!";
  }
  mysql_close($dbc);
?>
    
