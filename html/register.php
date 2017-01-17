<!DOCTYPE html>
<html>
<head>
    <title> Penpal - Home</title>
	<link rel="stylesheet" href="css/homepage.css" type="text/css">
</head>

    <body>
        <header role="banner">

			<div class = "login_bar">
			<img class = "logo" src = "images/penpal.png"/>

			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class = "login">
				<div class = "login_text">Login</div>
				<div class = "username">
                Username </br><input class = "login_input" type="text" name="username">
				 </br><a class = "forgot_password" href="url">Forgot your password?</a>
				</div>
				<div class = "password">
                Password </br><input class = "login_input" type="password" name="password">
				</div>
				<input class = "login_button" name="login" type="submit" value="Log In"></br>
            </form>
<?php
	if(!isset($_COOKIE['username'])){
		if(isset($_POST['login'])){
			$dbc = mysqli_connect('localhost', 'root', 'Master95', 'penpal_database')
			or die('Error connecting to mysql server');

			$username = $_POST['username'];
			$password = $_POST['password'];

			//echo 'USERNAME: ' . $username . '<br/>';
		  	//echo 'PASSWORD: ' . $password . '<br/>';

		  	$search_user = "SELECT * FROM profiles WHERE username = '$username'".
				" AND password = SHA('$password')";

		  	$user_result = mysqli_query($dbc, $search_user)
				or die("Error querying database");

		  	if (mysqli_num_rows($user_result) == 0) {
				// No user
				echo "Invalid username or password, please try again!<br/>";
		  	} else {
				// there will be one user
				setcookie('username', $username);
				//to be changed to message url or something
				$profile_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/home_tab.php';
				//echo 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/profile.php';
				header('Location: ' . $profile_url );
				//echo "Successfully logged in!";
		  	}
		  	mysqli_close($dbc);
		}

	}

?>
			</div>
			<div class = "signup">
		
			
			<h2 style = "font-family: 'Trebuchet MS', serif; color: blue;"> Sign up </h2>
			<h3 style = "border-bottom: 1px solid grey; color: blue;"><i>Start learning a new language today!</i></h3> <br><br>
<?php
  $dbc = mysqli_connect('localhost', 'root', 'Master95', 'penpal_database')
    or die('Error connecting to mysql server');

  if (isset($_POST['submit'])) {
  
  	$username = mysqli_real_escape_string($dbc, $_POST['username']);
	$first_name = mysqli_real_escape_string($dbc, $_POST['firstname']);
	$last_name = mysqli_real_escape_string($dbc, $_POST['lastname']);
	$email_address = mysqli_real_escape_string($dbc, $_POST['emailaddress']);
    $confirm_email_address = mysqli_real_escape_string($dbc, $_POST['confirm_emailaddress']);
	$password = mysqli_real_escape_string($dbc, $_POST['newpassword']);
	$gender = mysqli_real_escape_string($dbc, $_POST['gender']);
	$DOB_month = $_POST['DOBMonth'];
	$DOB_day = $_POST['DOBDay'];
	$DOB_year = $_POST['DOBYear'];

	if ($gender == "male") {
		$gender = "M";
	} else if ($gender == "female") {
		$gender = "F";
	}
	
  	if (!empty($username) && !empty($first_name) && !empty($last_name) && !empty($email_address)
  		&& !empty($confirm_email_address) && !empty($password) && !empty($gender) 
  		&& !($DOB_month == "- Month -") && !($DOB_day == "- Day -") && !($DOB_year == "- Year -")) {
  	
		$check_username_available = "SELECT * FROM profiles WHERE username = '$username'";
		$username_search_result = mysqli_query($dbc, $check_username_available);
		$check_email = "SELECT * FROM profiles WHERE email_address = '$email_address'";
		$email_search_result = mysqli_query($dbc, $check_email);
		
		if (mysqli_num_rows($username_search_result) != 0) {
			echo "Username already exists! Please choose another username! <br/>";
		} else if (mysqli_num_rows($email_search_result) != 0) {
			echo "You have already signed up with the same email! <br/>";
		}else {
			$query = "INSERT INTO profiles (username, password, first_name, last_name, " .
			"email_address, gender, year, month, day, signup_date) ". 
   			"VALUES ('$username', SHA('$password'), '$first_name', '$last_name', '$email_address', '$gender', '$DOB_year', '$DOB_month', '$DOB_day', NOW())";

 			$result = mysqli_query($dbc, $query)
				or die("Error querying database");

			echo "You have successfully created an account! <br/>";
  			// send confirmation email
		}
  			
	} else {
		 echo "Please check the form again, you have a missing field! <br/>";
	} 	
  }  
  			 
?>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">	
		<div class="signup_text">
		
		<div class = "signup_element"> Username: </div>
		<input type="text" name="username" value="<?php echo !empty($username) ? $username : '';?>"><br/>
		
		<div class = "signup_element">First name: </div>
		<input type="text" name="firstname"value="<?php echo !empty($first_name) ? $first_name : '';?>"><br/>
		
		<div class = "signup_element">Last name: </div>
		<input type="text" name="lastname" value="<?php echo !empty($last_name) ? $last_name : '';?>"><br/>
		
		<div class = "signup_element">Email address: </div>
		<input type="text" name="emailaddress" value="<?php echo !empty($email_address) ? $email_address : '';?>"><br/>
		
		<div class = "signup_element">Confirm Email Address:</div>
		<input type="text" name="confirm_emailaddress" value="<?php echo !empty($confirm_email_address) ? $confirm_email_address : '';?>"><br/>
		
		<div class = "signup_element">Password: </div>
		<input type="text" name="newpassword"><br/><br/>
		
		<div class = "signup_element">Confirm your password:</div>
		<input type="password" name="confirm_password" ><br>
		
		<div class = "signup_element">I am a:</div>
		<input type="radio" name="gender" value="male" <?php if (!empty($_POST['gender']) && $_POST['gender'] == "male") { echo "checked";}?>> Male
		<input type="radio" name="gender" value="female" <?php if (!empty($_POST['gender']) && $_POST['gender'] == "female"){ echo "checked";}?>> Female<br><br>

		<div class = "signup_element">Date of birth: </div>
			<select name="DOBMonth">
				<option> - Month - </option>
				<option value="January">January</option>
				<option value="Febuary">Febuary</option>
				<option value="March">March</option>
				<option value="April">April</option>
				<option value="May">May</option>
				<option value="June">June</option>
				<option value="July">July</option>
				<option value="August">August</option>
				<option value="September">September</option>
				<option value="October">October</option>
				<option value="November">November</option>
				<option value="December">December</option>
			</select>
			<select name="DOBDay">
				<option> - Day - </option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
				<option value="4">4</option>
				<option value="5">5</option>
				<option value="6">6</option>
				<option value="7">7</option>
				<option value="8">8</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			</select>
			<select name="DOBYear">
				<option> - Year - </option>
				<option value="2000">2000</option>
				<option value="1999">1999</option>
				<option value="1998">1998</option>
				<option value="1997">1997</option>
				<option value="1996">1996</option>
				<option value="1995">1995</option>
				<option value="1994">1994</option>
				<option value="1993">1993</option>
				<option value="1992">1992</option>
				<option value="1991">1991</option>
				<option value="1990">1990</option>
				<option value="1989">1989</option>
				<option value="1988">1988</option>
				<option value="1987">1987</option>
				<option value="1986">1986</option>
				<option value="1985">1985</option>
				<option value="1984">1984</option>
				<option value="1983">1983</option>
				<option value="1982">1982</option>
				<option value="1981">1981</option>
				<option value="1980">1980</option>
				<option value="1979">1979</option>
				<option value="1978">1978</option>
				<option value="1977">1977</option>
				<option value="1976">1976</option>
				<option value="1975">1975</option>
				<option value="1974">1974</option>
				<option value="1973">1973</option>
				<option value="1972">1972</option>
				<option value="1971">1971</option>
				<option value="1970">1970</option>
				<option value="1969">1969</option>
				<option value="1968">1968</option>
				<option value="1967">1967</option>
				<option value="1966">1966</option>
				<option value="1965">1965</option>
				<option value="1964">1964</option>
				<option value="1963">1963</option>
				<option value="1962">1962</option>
				<option value="1961">1961</option>
				<option value="1960">1960</option>
				<option value="1959">1959</option>
				<option value="1958">1958</option>
				<option value="1957">1957</option>
				<option value="1956">1956</option>
				<option value="1955">1955</option>
				<option value="1954">1954</option>
				<option value="1953">1953</option>
				<option value="1952">1952</option>
				<option value="1951">1951</option>
				<option value="1950">1950</option>
				<option value="1949">1949</option>
				<option value="1948">1948</option>
				<option value="1947">1947</option>
			</select>
			<br>
		<input type="submit" name="submit" value="Sign up">
		</div>
	</form>
<?php
	mysqli_close($dbc);
?>
	</div>
</body>
</html>  
  
