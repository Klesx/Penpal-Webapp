<!DOCTYPE html>
<html>
<head>
    <title> Penpal - Edit Profile </title>
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
    require_once('edit_profile_data.php');
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
        <li class="tab-link" data-tab="tab-4">
            <a href="personal_details_tab.php" >Personal Details</a>
        </li>
        <li class="tab-link current" data-tab="tab-5">
            <a href="edit_profile_tab.php" >Edit Profile</a>
        </li>
        <li class="tab-link" data-tab="tab-6">
            <a href="search_tab.php" >Language partner search</a>
        </li>
    </ul>

    <div id="tab-5" class="tab-content current">
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
                                <td><a href="edit_profile_tab.php?username=<?php echo $username; ?>&amp;native_language=<?php echo $z+1;?>"> Remove </a></td>


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
                                        <td><a href = "edit_profile_tab.php?username=<?php echo $username; ?>&amp;learning_language=<?php echo $y+1;?>"> Remove </a></td>
                                        <?php
                                    }
                                    ?>

                                </tr>
                                <?php

                            }
                            ?>

                        </table>
                        <?php
                        if (empty($row['learning_language_one']) || empty($row['learning_language_two']) || empty($row['learning_language_three']) || empty($row['learning_language_four'])) {
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
        <textarea class = "introduction_textarea" name="introText"><?php echo trim($intro)?></textarea>
                </div>
                <input name="update_profile" value="Save Changes" type="submit">
                <?php echo $edit_profile_error; ?>
            </form>
            </br>
            <div class = "login_date"> Last Login Date: <?php echo $last_login; ?></div>
            <div class = "profile_date"> Last Profile Change: <?php echo $last_profile_change?></div>
     </div>
    </div>


</div><!-- container -->

</body>
</html>