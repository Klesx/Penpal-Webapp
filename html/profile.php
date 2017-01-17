<!DOCTYPE html>
<html>
<head>
    <title> Penpal - Profile </title>
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="css/tab.css" type="text/css">

</head>

<body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
<script type="text/javascript" src="js/tab.js"></script>
<?php

  $dbc = mysqli_connect('localhost', 'root', 'Master95', 'penpal_database')
    or die('Error connecting to mysql server');
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

  define('GW_UPLOADPATH','images/');
  if (isset($_POST['changeprofilepic'])){
      $profilepic = $_FILES['profilepic']['name'];
      $profilepic_type = $_FILES['profilepic']['type'];
      $profilepic_size = $_FILES['profilepic']['size'];
      if (!empty($profilepic)) {
          if (($profilepic_type == 'image/gif' || $profilepic_type == 'image/jpeg' || $profilepic_type == 'image/pjpeg' || $profilepic_type == 'image/png')
              && $profilepic_size > 0 && $profilepic_size < 3000000) {
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

      if (!empty($add_native_language) || (!empty($add_learning_language) && !empty($add_learning_level)) || !empty($new_intro)) {

          $update_query = "UPDATE profiles SET";

          if (!empty($add_native_language)) {
              $count_native = count($native_languages);
              $add_query = "SELECT * FROM profiles WHERE username = '$username'";
              $add_result = mysqli_query($dbc, $add_query);
              $add_row = mysqli_fetch_array($add_result);
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
              $count_learning = count($learning_languages_levels);
              if (empty($add_row['learning_language_one'])) {
                  $update_query .= " learning_language_one = '$add_learning_language' ,";
                  $update_query .= " learning_language_level_one = '$add_learning_level' ,";
              } else if (empty($add_row['learning_language_two'])) {
                  $update_query .= " learning_language_two = '$add_learning_language' ,";
                  $update_query .= " learning_language_level_two = '$add_learning_level' ,";
              } else if (empty($add_row['native_language_three'])) {
                  $update_query .= " learning_language_three = '$add_learning_language' ,";
                  $update_query .= " learning_language_level_three = '$add_learning_level' ,";
              } else if (empty($add_row['native_language_four'])) {
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

      mysqli_query($dbc, $remove_query);
      $self = $_SERVER['PHP_SELF'];
      header("Refresh: 8; url='$self'");
      echo $remove_query;
      echo "Successfully removed, page will refresh in five seconds!";

  }

?>
<div class="container">

    <ul class="tabs">
        <li class="tab-link current" data-tab="tab-1">Home</li>
        <li class="tab-link" data-tab="tab-2">My profile</li>
        <li class="tab-link" data-tab="tab-3">
            Messaging
            <font color = "green"> (2) </font>
        </li>
        <li class="tab-link" data-tab="tab-4">Personal Details</li>
        <li class="tab-link" data-tab="tab-5">Edit Profile</li>
        <li class="tab-link" data-tab="tab-6">Language partner search</li>
    </ul>

	<div id="tab-1" class="tab-content current">
		Welcome <font color = "red"> <?php echo $first_name . " ", $last_name; ?> </font> to PenPal! We are currently in the process of upgrading our site so you may see some poor design here and there.
  </div>
	<div id="tab-2" class="tab-content">

    <div class="profile_container">

    <h2 class = "text_center" > Create Profile / Edit Profile </h2>

      <br>
        <div class = "profile_picture"> <img height="150" width="150" src="images/<?php echo $profile_pic_image; ?>" alt="Profile Image"/> </div>
      <div class = "profile_name" > <?php echo $first_name . " ", $last_name; ?>
      <div class = "status"> (Offline) </div>
      <div class = "age"> Born on: <?php echo $age; ?> </div>
      <div class = "location"> <?php echo $location; ?></div>
      <div class = "sex"> <img src="images/<?php
        if ($gender == "Male") {
            echo "male";
        } else {
            echo "female";
        }
      ?>.png"/> </div>

        <div class = "border_line"> </div>
        <div class = "text"> Native </div>
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

        <div class = "border_line"> </div>
        <div class = "text">Learning </div>

        <div class = "learning_language">

        <table >
        <tr class = "table_language">
          <td>
              <?php
                foreach ($learning_languages as &$l) {
              ?>
              <div style = "font-size: 14px;">
              <?php echo $l;
              ?>
                  <img class = "flag" src = "images/16/Spain.png"/>
              </div>
              <?php
                }
              ?>
          </td>
          <td>
              <?php
                foreach ($learning_languages_levels as &$level) {
              ?>
              <div class = "language_level">
                  <img src="images/0<?php echo $level; ?>.png"/><br>
               </div>
              <?php
                }
              ?>
          </td>
        </tr>
      </table>
      </div>
      </div>

      <div class = "text"> Introduction <div class = "border_line"/></div>


      <div class="introduction">
        <?php echo $intro ?>
      </div>

      <div>
        <button type="button">Edit profile</button>
      </div>

      <br/>
      <div class = "login_date"> Last login: <?php echo $last_login; ?></div>
      <div class = "profile_date"> Profile last updated: <?php echo $last_profile_change; ?></div>


      </div>


    </div>

  </div>
	<div id="tab-3" class="tab-content">
        <div class = "results_box">
            <table border="0" cellpadding = "6" frame=void rules=rows class = "results_table">
                <tr>
                    <td class = "table_data_image">
                        <img class = "results_image" src = "images/default.png"/>
                        <div class = "search_status"> Online </div>
                    </td>
                    <td class = "table_data_details">
                        <div class = "table_data_name" onclick = "window.location='profile.html'" > Jinsung Ha  </div>
                        <div class = "table_data_age"> 23 </div>
                        <div class = "table_data_sex"> <img class = "sex_symbol" src = "images/male.png"/> </div>
                        <div class = "table_data_location"> London, England </div>
                        <table >
                            <tr class = "table_language">
                                <td>
                                    <div class = "search_native_language"> Korean </div>
                                    <div class = "search_native_language"> Cantonese </div>
                                    <img class = "search_language_level" src = "images/05.png"/>
                                </td>
                                <td>>></td>
                                <td>
                                    <div class = "search_learning_language"> English
                                        <img class = "search_learning_language_level" src = "images/03.png"/>
                                    </div>
                                    <div class = "search_learning_language"> Japanese
                                        <img class = "search_learning_language_level" src = "images/01.png"/>
                                    </div>
                                    <div class = "search_learning_language"> Mandarin
                                        <img class = "search_learning_language_level" src = "images/04.png"/>
                                    </div>
                                    <div class = "search_learning_language"> French
                                        <img class = "search_learning_language_level" src = "images/04.png"/>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td id = "table_data_description" class = "table_data_description">
                        Hi my name is Jin and I'm studying Computing at Imperial College London. I want to improve my Japanese and my other language skills while I have the chance.
                        I can teach you Korean if you are interested! Please contact me if you want to become language partners!
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class = "results_image" src = "images/default.png"/>
                        <div style = "text-align: center; color: red; font-size: 12px;"> Last login: May 20th 2016 </div>
                    </td>
                    <td class = "table_data_details">
                        Ayman Moussa
                        <div class = "table_data_age"> 20 </div>
                        <div class = "table_data_sex"> <img class = "sex_symbol" src = "images/female.png"/> </div>
                    <td id = "table_data_description" class = "table_data_description">  I'm interested in many languages so I'd thought I'd try to learn and improve as many as I can! </td>
                </tr>
                <tr>
                    <td> <img class = "results_image" src = "images/solan.jpg"/> </td>
                    <td class = "table_data_details">
                        Solan Mani
                        <div class = "table_data_age"> 20 </div>
                        <div class = "table_data_sex"> <img src = "images/female.png"/> </div>
                    <td id = "table_data_description" class = "table_data_description">  D- No profile description -  </td>
                </tr>
                <tr>
                    <td> <img class = "results_image" src = "images/nana.jpg"/> </td>
                    <td class = "table_data_details">
                        <div class = "table_data_name" onclick = "window.location='user.html'">  Nana Asiedu Ampem</div>
                        <div class = "table_data_age"> 20 </div>
                        <div class = "table_data_sex"> <img src = "images/male.png"/> </div>
                    <td id = "table_data_description" class = "table_data_description">  Hello everyone my name is Nana. I'm a professional noob in Spanish,
                        so I would like to improve my skills in the Spanish so I can produce top quality banter in more languages.
                        I am also native in Twi so if anyone is interested in that then please contact me!
                        Thanks!
                </table>
        </div>
  </div>
<div id="tab-4" class="tab-content">

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
<div id="tab-5" class="tab-content <?php if (isset($_POST['changeprofilepic']) || isset($_POST['update_profile']) || isset($_GET['username'])) { echo "current"; } ?>">
    <div id = "profile_container" class="profile_container">

        <h2 class = "text_center" > Edit Profile </h2><br>

        <div id = "profile_picture_box" class = "profile_picture_box">
            <form enctype="multipart/form-data" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
                <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />
                <div class = "profile_picture"> <img height="150" width="150" src="images/<?php echo $profile_pic_image; ?>" alt="Profile Image"/> </div>
                <input type="file" name="profilepic" />
                <input name="changeprofilepic" type="submit" value="Change Profile Pic"></br>
            </form>
        </div>


        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class = "profile_name" > <?php echo $first_name . " " . $last_name . " "?>
            <div class = "age"> Born On: <?php echo $age ?> </div>
            <div class = "location"> <?php echo $location ?></div>
            <div class = "sex"> <img src="images/<?php
                if ($gender == "Male") {
                    echo "male";
                } else {
                    echo "female";
                }
                ?>.png"/> </div>

            <div class = "border_line"> </div>
            <div class = "text"> Native </div>
            <div class = "native_language" id = "native_language">

                <table id = "table_nativelanguage">


                            <?php

                            for($z = 0; $z < count($native_languages); $z++) {
                                if (empty($native_languages[$z])){
                                    continue;
                                }
                                ?>
                    <tr>
                        <td>
                                <div style = "font-size: 14px;">
                                    <?php
                                    echo $native_languages[$z];
                                    ?>
                                    <img class = "flag" src = "images/16/United-Kingdom.png"/>
                                </div>
                                </td>
                                <td><a href="profile.php?username=<?php echo $username; ?>&amp;native_language=<?php echo $z+1;?>"> Remove </a></td>


                            <?php
                            }
                            ?>
                    </tr>
                </table>
                <?php
                    if (empty($row['native_language_one']) || empty($row['native_language_two']) || empty($row['native_language_three']) || empty($row['native_language_four'])) {
                        ?>
                        <label style="font-size: 14px; color: black;">Add native language: </label>
                        <select name="add_native_language" size="1">
                            <option value="">- Select Language -</option>
                            <option value="- Other -">- Other -</option>
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Akan">Akan</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Amharic (Ethiopian)">Amharic (Ethiopian)</option>
                            <option value="Arabic, Egyptian">Arabic, Egyptian</option>
                            <option value="Arabic, Middle Eastern">Arabic, Middle Eastern</option>
                            <option value="Arabic, Moroccan">Arabic, Moroccan</option>
                            <option value="Arabic, other">Arabic, other</option>
                            <option value="Aramaic">Aramaic</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Assamese">Assamese</option>
                            <option value="Assyrian">Assyrian</option>
                            <option value="Azerbaijani">Azerbaijani</option>
                            <option value="Bambara (Bamana)">Bambara (Bamana)</option>
                            <option value="Baoulé (Baule, Bawule)">Baoulé (Baule, Bawule)</option>
                            <option value="Basque">Basque</option>
                            <option value="Bavarian (Austro-Bavarian)">Bavarian (Austro-Bavarian)</option>
                            <option value="Belarusian">Belarusian</option>
                            <option value="Bemba (Chiwemba, Wemba)">Bemba (Chiwemba, Wemba)</option>
                            <option value="Bengali">Bengali</option>
                            <option value="Berber (Tamazight)">Berber (Tamazight)</option>
                            <option value="Bosnian">Bosnian</option>
                            <option value="Breton">Breton</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Burmese">Burmese</option>
                            <option value="Cambodian (Khmer)">Cambodian (Khmer)</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Cebuano (Bisaya)">Cebuano (Bisaya)</option>
                            <option value="Chichewa (Nyanja)">Chichewa (Nyanja)</option>
                            <option value="Chinese, Cantonese">Chinese, Cantonese</option>
                            <option value="Chinese, Mandarin">Chinese, Mandarin</option>
                            <option value="Chinese, other">Chinese, other</option>
                            <option value="Chuvash (Bulgar)">Chuvash (Bulgar)</option>
                            <option value="Creole">Creole</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Czech">Czech</option>
                            <option value="Danish">Danish</option>
                            <option value="Dutch">Dutch</option>
                            <option value="English">English</option>
                            <option value="Esperanto">Esperanto</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Faroese">Faroese</option>
                            <option value="Fijian">Fijian</option>
                            <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                            <option value="Finnish">Finnish</option>
                            <option value="Fon (Dahomeen, Djedji, Fongbe)">Fon (Dahomeen, Djedji, Fongbe)</option>
                            <option value="French">French</option>
                            <option value="Gaelic (Irish)">Gaelic (Irish)</option>
                            <option value="Gaelic (Scottish)">Gaelic (Scottish)</option>
                            <option value="Galician">Galician</option>
                            <option value="Georgian">Georgian</option>
                            <option value="German">German</option>
                            <option value="Greek">Greek</option>
                            <option value="Gujarati">Gujarati</option>
                            <option value="Hausa">Hausa</option>
                            <option value="Hawaiian">Hawaiian</option>
                            <option value="Hebrew">Hebrew</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Hmong">Hmong</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelandic">Icelandic</option>
                            <option value="Ido">Ido</option>
                            <option value="Igbo (Ibo)">Igbo (Ibo)</option>
                            <option value="Indonesian (Bahasa)">Indonesian (Bahasa)</option>
                            <option value="Interlingua">Interlingua</option>
                            <option value="Italian">Italian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Kachchi">Kachchi</option>
                            <option value="Kannada">Kannada</option>
                            <option value="Kazakh">Kazakh</option>
                            <option value="Kituba (Kikoongo, Munukutuba)">Kituba (Kikoongo, Munukutuba)</option>
                            <option value="Konkani">Konkani</option>
                            <option value="Konkani (Kunabi, Cugani, Bankoti)">Konkani (Kunabi, Cugani, Bankoti)</option>
                            <option value="Korean">Korean</option>
                            <option value="Kurdish">Kurdish</option>
                            <option value="Kyrgyz (Kara-Kirgiz, Kirghiz, Kirgiz)">Kyrgyz (Kara-Kirgiz, Kirghiz,
                                Kirgiz)
                            </option>
                            <option value="Ladino">Ladino</option>
                            <option value="Lao">Lao</option>
                            <option value="Latin">Latin</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Ligurian">Ligurian</option>
                            <option value="Lingala (Ngala)">Lingala (Ngala)</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Lombard">Lombard</option>
                            <option value="Luxembourgeois (Luxemburgian)">Luxembourgeois (Luxemburgian)</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malagasy">Malagasy</option>
                            <option value="Malay (Bahasa Malaysia)">Malay (Bahasa Malaysia)</option>
                            <option value="Malayalam">Malayalam</option>
                            <option value="Maldivian (Dhivehi)">Maldivian (Dhivehi)</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Mandinka">Mandinka</option>
                            <option value="Maori (New Zealand Maori)">Maori (New Zealand Maori)</option>
                            <option value="Marathi">Marathi</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Montenegrin">Montenegrin</option>
                            <option value="Native American (Ojibway, Cree...)">Native American (Ojibway, Cree...)
                            </option>
                            <option value="Nepali">Nepali</option>
                            <option value="Newari">Newari</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Nyanja (Chewa, Chinyanja)">Nyanja (Chewa, Chinyanja)</option>
                            <option value="Occitan (Occitani)">Occitan (Occitani)</option>
                            <option value="Oriya">Oriya</option>
                            <option value="Oromo (Oromoo , Oromiffa)">Oromo (Oromoo , Oromiffa)</option>
                            <option value="Papiamento (or Papiamentu)">Papiamento (or Papiamentu)</option>
                            <option value="Paraguayan Guarani">Paraguayan Guarani</option>
                            <option value="Persian (Farsi, Dari)">Persian (Farsi, Dari)</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Pulaar">Pulaar</option>
                            <option value="Punjabi">Punjabi</option>
                            <option value="Purépecha (Tarascan)">Purépecha (Tarascan)</option>
                            <option value="Pushto (Pashto)">Pushto (Pashto)</option>
                            <option value="Quechua">Quechua</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Romansch">Romansch</option>
                            <option value="Romany (Gypsy, Danubian)">Romany (Gypsy, Danubian)</option>
                            <option value="Rundi (Kirundi, Urundi)">Rundi (Kirundi, Urundi)</option>
                            <option value="Russian">Russian</option>
                            <option value="Rwanda (Kinyarwanda)">Rwanda (Kinyarwanda)</option>
                            <option value="Saami (sami)">Saami (sami)</option>
                            <option value="Samoan">Samoan</option>
                            <option value="Sanskrit">Sanskrit</option>
                            <option value="Serbian (Serbo-Croatian)">Serbian (Serbo-Croatian)</option>
                            <option value="Shona">Shona</option>
                            <option value="Sicilian">Sicilian</option>
                            <option value="Sign Language">Sign Language</option>
                            <option value="Sindhi">Sindhi</option>
                            <option value="Sinhalese">Sinhalese</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovenian">Slovenian</option>
                            <option value="Somali">Somali</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Swahili">Swahili</option>
                            <option value="Swedish">Swedish</option>
                            <option value="Swiss German">Swiss German</option>
                            <option value="Tajiki (Tajiki, Tadzhik)">Tajiki (Tajiki, Tadzhik)</option>
                            <option value="Tamil">Tamil</option>
                            <option value="Tatar (Tartar)">Tatar (Tartar)</option>
                            <option value="Telugu">Telugu</option>
                            <option value="Tetum">Tetum</option>
                            <option value="Thai">Thai</option>
                            <option value="Tibetan">Tibetan</option>
                            <option value="Tigrigna (Tigray, Tigrinya)">Tigrigna (Tigray, Tigrinya)</option>
                            <option value="Tok Pisin">Tok Pisin</option>
                            <option value="Tongan">Tongan</option>
                            <option value="Tswana">Tswana</option>
                            <option value="Tumbuka">Tumbuka</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Urdu">Urdu</option>
                            <option value="Uyghur (Wighor)">Uyghur (Wighor)</option>
                            <option value="Uzbek">Uzbek</option>
                            <option value="Venetian">Venetian</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Welsh">Welsh</option>
                            <option value="Wolof">Wolof</option>
                            <option value="Xhosa">Xhosa</option>
                            <option value="Yiddish">Yiddish</option>
                            <option value="Yoruba">Yoruba</option>
                            <option value="Zulu">Zulu</option>
                        </select>
                        <?php
                    }
                        ?>

            </div>

            <div class = "border_line"></div>
            <div class = "text">Learning</div>

            <div class = "learning_language_container" id = "learning_language_container">

            <table id = "table_learninglanguage">

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
                    <?php
                    if (!empty($learning_languages[$y])) {
                        ?>
                                <td><a href = "profile.php?username=<?php echo $username; ?>&amp;learning_language=<?php echo $y+1;?>"> Remove </a></td>
                    <?php
                    }
                    ?>

                </tr>
                            <?php

                            }
                        ?>

            </table>
            <?php
                if (empty($row['learning_language_one'] || empty($row['learning_language_two']) || empty($row['learning_language_three']) || empty($row['learning_language_four']))) {
                    ?>
                    <td>
                        <label style="font-size: 14px; color: black;">Add learning language: </label>
                        <select name="add_learning_language" size="1">
                            <option value="">- Select Language -</option>
                            <option value="- Other -">- Other -</option>
                            <option value="Afrikaans">Afrikaans</option>
                            <option value="Akan">Akan</option>
                            <option value="Albanian">Albanian</option>
                            <option value="Amharic (Ethiopian)">Amharic (Ethiopian)</option>
                            <option value="Arabic, Egyptian">Arabic, Egyptian</option>
                            <option value="Arabic, Middle Eastern">Arabic, Middle Eastern</option>
                            <option value="Arabic, Moroccan">Arabic, Moroccan</option>
                            <option value="Arabic, other">Arabic, other</option>
                            <option value="Aramaic">Aramaic</option>
                            <option value="Armenian">Armenian</option>
                            <option value="Assamese">Assamese</option>
                            <option value="Assyrian">Assyrian</option>
                            <option value="Azerbaijani">Azerbaijani</option>
                            <option value="Bambara (Bamana)">Bambara (Bamana)</option>
                            <option value="Baoulé (Baule, Bawule)">Baoulé (Baule, Bawule)</option>
                            <option value="Basque">Basque</option>
                            <option value="Bavarian (Austro-Bavarian)">Bavarian (Austro-Bavarian)</option>
                            <option value="Belarusian">Belarusian</option>
                            <option value="Bemba (Chiwemba, Wemba)">Bemba (Chiwemba, Wemba)</option>
                            <option value="Bengali">Bengali</option>
                            <option value="Berber (Tamazight)">Berber (Tamazight)</option>
                            <option value="Bosnian">Bosnian</option>
                            <option value="Breton">Breton</option>
                            <option value="Bulgarian">Bulgarian</option>
                            <option value="Burmese">Burmese</option>
                            <option value="Cambodian (Khmer)">Cambodian (Khmer)</option>
                            <option value="Catalan">Catalan</option>
                            <option value="Cebuano (Bisaya)">Cebuano (Bisaya)</option>
                            <option value="Chichewa (Nyanja)">Chichewa (Nyanja)</option>
                            <option value="Chinese, Cantonese">Chinese, Cantonese</option>
                            <option value="Chinese, Mandarin">Chinese, Mandarin</option>
                            <option value="Chinese, other">Chinese, other</option>
                            <option value="Chuvash (Bulgar)">Chuvash (Bulgar)</option>
                            <option value="Creole">Creole</option>
                            <option value="Croatian">Croatian</option>
                            <option value="Czech">Czech</option>
                            <option value="Danish">Danish</option>
                            <option value="Dutch">Dutch</option>
                            <option value="English">English</option>
                            <option value="Esperanto">Esperanto</option>
                            <option value="Estonian">Estonian</option>
                            <option value="Faroese">Faroese</option>
                            <option value="Fijian">Fijian</option>
                            <option value="Filipino (Tagalog)">Filipino (Tagalog)</option>
                            <option value="Finnish">Finnish</option>
                            <option value="Fon (Dahomeen, Djedji, Fongbe)">Fon (Dahomeen, Djedji, Fongbe)</option>
                            <option value="French">French</option>
                            <option value="Gaelic (Irish)">Gaelic (Irish)</option>
                            <option value="Gaelic (Scottish)">Gaelic (Scottish)</option>
                            <option value="Galician">Galician</option>
                            <option value="Georgian">Georgian</option>
                            <option value="German">German</option>
                            <option value="Greek">Greek</option>
                            <option value="Gujarati">Gujarati</option>
                            <option value="Hausa">Hausa</option>
                            <option value="Hawaiian">Hawaiian</option>
                            <option value="Hebrew">Hebrew</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Hmong">Hmong</option>
                            <option value="Hungarian">Hungarian</option>
                            <option value="Icelandic">Icelandic</option>
                            <option value="Ido">Ido</option>
                            <option value="Igbo (Ibo)">Igbo (Ibo)</option>
                            <option value="Indonesian (Bahasa)">Indonesian (Bahasa)</option>
                            <option value="Interlingua">Interlingua</option>
                            <option value="Italian">Italian</option>
                            <option value="Japanese">Japanese</option>
                            <option value="Kachchi">Kachchi</option>
                            <option value="Kannada">Kannada</option>
                            <option value="Kazakh">Kazakh</option>
                            <option value="Kituba (Kikoongo, Munukutuba)">Kituba (Kikoongo, Munukutuba)</option>
                            <option value="Konkani">Konkani</option>
                            <option value="Konkani (Kunabi, Cugani, Bankoti)">Konkani (Kunabi, Cugani, Bankoti)</option>
                            <option value="Korean">Korean</option>
                            <option value="Kurdish">Kurdish</option>
                            <option value="Kyrgyz (Kara-Kirgiz, Kirghiz, Kirgiz)">Kyrgyz (Kara-Kirgiz, Kirghiz,
                                Kirgiz)
                            </option>
                            <option value="Ladino">Ladino</option>
                            <option value="Lao">Lao</option>
                            <option value="Latin">Latin</option>
                            <option value="Latvian">Latvian</option>
                            <option value="Ligurian">Ligurian</option>
                            <option value="Lingala (Ngala)">Lingala (Ngala)</option>
                            <option value="Lithuanian">Lithuanian</option>
                            <option value="Lombard">Lombard</option>
                            <option value="Luxembourgeois (Luxemburgian)">Luxembourgeois (Luxemburgian)</option>
                            <option value="Macedonian">Macedonian</option>
                            <option value="Malagasy">Malagasy</option>
                            <option value="Malay (Bahasa Malaysia)">Malay (Bahasa Malaysia)</option>
                            <option value="Malayalam">Malayalam</option>
                            <option value="Maldivian (Dhivehi)">Maldivian (Dhivehi)</option>
                            <option value="Maltese">Maltese</option>
                            <option value="Mandinka">Mandinka</option>
                            <option value="Maori (New Zealand Maori)">Maori (New Zealand Maori)</option>
                            <option value="Marathi">Marathi</option>
                            <option value="Mongolian">Mongolian</option>
                            <option value="Montenegrin">Montenegrin</option>
                            <option value="Native American (Ojibway, Cree...)">Native American (Ojibway, Cree...)
                            </option>
                            <option value="Nepali">Nepali</option>
                            <option value="Newari">Newari</option>
                            <option value="Norwegian">Norwegian</option>
                            <option value="Nyanja (Chewa, Chinyanja)">Nyanja (Chewa, Chinyanja)</option>
                            <option value="Occitan (Occitani)">Occitan (Occitani)</option>
                            <option value="Oriya">Oriya</option>
                            <option value="Oromo (Oromoo , Oromiffa)">Oromo (Oromoo , Oromiffa)</option>
                            <option value="Papiamento (or Papiamentu)">Papiamento (or Papiamentu)</option>
                            <option value="Paraguayan Guarani">Paraguayan Guarani</option>
                            <option value="Persian (Farsi, Dari)">Persian (Farsi, Dari)</option>
                            <option value="Polish">Polish</option>
                            <option value="Portuguese">Portuguese</option>
                            <option value="Pulaar">Pulaar</option>
                            <option value="Punjabi">Punjabi</option>
                            <option value="Purépecha (Tarascan)">Purépecha (Tarascan)</option>
                            <option value="Pushto (Pashto)">Pushto (Pashto)</option>
                            <option value="Quechua">Quechua</option>
                            <option value="Romanian">Romanian</option>
                            <option value="Romansch">Romansch</option>
                            <option value="Romany (Gypsy, Danubian)">Romany (Gypsy, Danubian)</option>
                            <option value="Rundi (Kirundi, Urundi)">Rundi (Kirundi, Urundi)</option>
                            <option value="Russian">Russian</option>
                            <option value="Rwanda (Kinyarwanda)">Rwanda (Kinyarwanda)</option>
                            <option value="Saami (sami)">Saami (sami)</option>
                            <option value="Samoan">Samoan</option>
                            <option value="Sanskrit">Sanskrit</option>
                            <option value="Serbian (Serbo-Croatian)">Serbian (Serbo-Croatian)</option>
                            <option value="Shona">Shona</option>
                            <option value="Sicilian">Sicilian</option>
                            <option value="Sign Language">Sign Language</option>
                            <option value="Sindhi">Sindhi</option>
                            <option value="Sinhalese">Sinhalese</option>
                            <option value="Slovak">Slovak</option>
                            <option value="Slovenian">Slovenian</option>
                            <option value="Somali">Somali</option>
                            <option value="Spanish">Spanish</option>
                            <option value="Swahili">Swahili</option>
                            <option value="Swedish">Swedish</option>
                            <option value="Swiss German">Swiss German</option>
                            <option value="Tajiki (Tajiki, Tadzhik)">Tajiki (Tajiki, Tadzhik)</option>
                            <option value="Tamil">Tamil</option>
                            <option value="Tatar (Tartar)">Tatar (Tartar)</option>
                            <option value="Telugu">Telugu</option>
                            <option value="Tetum">Tetum</option>
                            <option value="Thai">Thai</option>
                            <option value="Tibetan">Tibetan</option>
                            <option value="Tigrigna (Tigray, Tigrinya)">Tigrigna (Tigray, Tigrinya)</option>
                            <option value="Tok Pisin">Tok Pisin</option>
                            <option value="Tongan">Tongan</option>
                            <option value="Tswana">Tswana</option>
                            <option value="Tumbuka">Tumbuka</option>
                            <option value="Turkish">Turkish</option>
                            <option value="Ukrainian">Ukrainian</option>
                            <option value="Urdu">Urdu</option>
                            <option value="Uyghur (Wighor)">Uyghur (Wighor)</option>
                            <option value="Uzbek">Uzbek</option>
                            <option value="Venetian">Venetian</option>
                            <option value="Vietnamese">Vietnamese</option>
                            <option value="Welsh">Welsh</option>
                            <option value="Wolof">Wolof</option>
                            <option value="Xhosa">Xhosa</option>
                            <option value="Yiddish">Yiddish</option>
                            <option value="Yoruba">Yoruba</option>
                            <option value="Zulu">Zulu</option>
                        </select>

                        <select name="add_learning_level" size="1">
                            <option value="">- Select Level -</option>
                            <option value="1">Beginner</option>
                            <option value="2">Elementary</option>
                            <option value="3">Intermediate</option>
                            <option value="4">Advanced</option>
                            <option value="5">Proficient</option>
                        </select>

                    </td>
                    <?php
                }
                ?>
        </div>
    </div>

    <div class = "text"> Introduction <div class = "border_line"/></div>

    <div class="introduction" id = "introduction">
        <textarea class = "introduction_textarea" name="introText">
        <?php echo $intro?>
      </textarea>
    </div>
    <input name="update_profile" value="Save Changes" type="submit">
            <?php echo $edit_profile_error; ?>
    </form>
    </br>
    <div class = "login_date"> Last Login Date: <?php echo $last_login; ?></div>
    <div class = "profile_date"> Last Profile Change: <?php echo $last_profile_change?></div>

</div>

</div><!-- container -->

</body>
</html>
