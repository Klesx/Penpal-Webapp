<!DOCTYPE html>
<html>
<head>
    <title> Penpal - Search for a language partner </title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="css/search.css" type="text/css">
    <link rel="stylesheet" href="css/text.css" type="text/css">
    <link rel="stylesheet" href="css/profile.css" type="text/css">
    <link rel="stylesheet" href="css/tab.css" type="text/css">
    <script type="text/javascript" src="js/search.js"></script>
</head>
<style>
    td {
        padding: 10px;
    }
</style>
<body>


<?php
require_once('connectvars.php');
require_once('user_data.php');
require_once('search_data.php');
?>

<div class="container">

    <ul class="tabs">
        <li class="tab-link" data-tab="tab-1">
            <a href="home_tab.php">Home</a>
        </li>
        <li class="tab-link" data-tab="tab-2">
            <a href="my_profile_tab.php">My profile</a>
        </li>
        <li class="tab-link" data-tab="tab-3">
            <a href="messaging_tab.php">Messaging<font color="green"> (2) </font></a>
        </li>
        <li class="tab-link" data-tab="tab-4">
            <a href="personal_details_tab.php">Personal Details</a>
        </li>
        <li class="tab-link" data-tab="tab-5">
            <a href="edit_profile_tab.php">Edit Profile</a>
        </li>
        <li class="tab-link current" data-tab="tab-6">
            <a href="search_tab.php">Language partner search</a>
        </li>
    </ul>
    <div id="tab-6" class="tab-content current">
        <div class="search_result_container">
            <div class="search_box">
                <h2> Search for a language partner </h2>
                <table>
                    <tbody>
                    <tr>
                        <form method="post" id="language_partner_search" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <td>
                                <table class="search_table" cellpadding="2" cellspacing="2">
                                    <tr>
                                        <td>Native language</td>
                                        <td>
                                            <select name="native_language"
                                                    value="<?php echo !empty($native_language) ? $native_language : ''; ?>"
                                                    size="1">
                                                <option value="">- All -</option>
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
                                                <option value="Bavarian (Austro-Bavarian)">Bavarian (Austro-Bavarian)
                                                </option>
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
                                                <option value="Fon (Dahomeen, Djedji, Fongbe)">Fon (Dahomeen, Djedji,
                                                    Fongbe)
                                                </option>
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
                                                <option value="Kituba (Kikoongo, Munukutuba)">Kituba (Kikoongo,
                                                    Munukutuba)
                                                </option>
                                                <option value="Konkani">Konkani</option>
                                                <option value="Konkani (Kunabi, Cugani, Bankoti)">Konkani (Kunabi,
                                                    Cugani, Bankoti)
                                                </option>
                                                <option value="Korean">Korean</option>
                                                <option value="Kurdish">Kurdish</option>
                                                <option value="Kyrgyz (Kara-Kirgiz, Kirghiz, Kirgiz)">Kyrgyz
                                                    (Kara-Kirgiz, Kirghiz, Kirgiz)
                                                </option>
                                                <option value="Ladino">Ladino</option>
                                                <option value="Lao">Lao</option>
                                                <option value="Latin">Latin</option>
                                                <option value="Latvian">Latvian</option>
                                                <option value="Ligurian">Ligurian</option>
                                                <option value="Lingala (Ngala)">Lingala (Ngala)</option>
                                                <option value="Lithuanian">Lithuanian</option>
                                                <option value="Lombard">Lombard</option>
                                                <option value="Luxembourgeois (Luxemburgian)">Luxembourgeois
                                                    (Luxemburgian)
                                                </option>
                                                <option value="Macedonian">Macedonian</option>
                                                <option value="Malagasy">Malagasy</option>
                                                <option value="Malay (Bahasa Malaysia)">Malay (Bahasa Malaysia)</option>
                                                <option value="Malayalam">Malayalam</option>
                                                <option value="Maldivian (Dhivehi)">Maldivian (Dhivehi)</option>
                                                <option value="Maltese">Maltese</option>
                                                <option value="Mandinka">Mandinka</option>
                                                <option value="Maori (New Zealand Maori)">Maori (New Zealand Maori)
                                                </option>
                                                <option value="Marathi">Marathi</option>
                                                <option value="Mongolian">Mongolian</option>
                                                <option value="Montenegrin">Montenegrin</option>
                                                <option value="Native American (Ojibway, Cree...)">Native American
                                                    (Ojibway, Cree...)
                                                </option>
                                                <option value="Nepali">Nepali</option>
                                                <option value="Newari">Newari</option>
                                                <option value="Norwegian">Norwegian</option>
                                                <option value="Nyanja (Chewa, Chinyanja)">Nyanja (Chewa, Chinyanja)
                                                </option>
                                                <option value="Occitan (Occitani)">Occitan (Occitani)</option>
                                                <option value="Oriya">Oriya</option>
                                                <option value="Oromo (Oromoo , Oromiffa)">Oromo (Oromoo , Oromiffa)
                                                </option>
                                                <option value="Papiamento (or Papiamentu)">Papiamento (or Papiamentu)
                                                </option>
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
                                                <option value="Romany (Gypsy, Danubian)">Romany (Gypsy, Danubian)
                                                </option>
                                                <option value="Rundi (Kirundi, Urundi)">Rundi (Kirundi, Urundi)</option>
                                                <option value="Russian">Russian</option>
                                                <option value="Rwanda (Kinyarwanda)">Rwanda (Kinyarwanda)</option>
                                                <option value="Saami (sami)">Saami (sami)</option>
                                                <option value="Samoan">Samoan</option>
                                                <option value="Sanskrit">Sanskrit</option>
                                                <option value="Serbian (Serbo-Croatian)">Serbian (Serbo-Croatian)
                                                </option>
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
                                                <option value="Tajiki (Tajiki, Tadzhik)">Tajiki (Tajiki, Tadzhik)
                                                </option>
                                                <option value="Tamil">Tamil</option>
                                                <option value="Tatar (Tartar)">Tatar (Tartar)</option>
                                                <option value="Telugu">Telugu</option>
                                                <option value="Tetum">Tetum</option>
                                                <option value="Thai">Thai</option>
                                                <option value="Tibetan">Tibetan</option>
                                                <option value="Tigrigna (Tigray, Tigrinya)">Tigrigna (Tigray,
                                                    Tigrinya)
                                                </option>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="">Learning language</td>
                                        <td>
                                            <select name="learning_language" size="1">
                                                <option value="" selected="">- All -</option>
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
                                                <option value="Bavarian (Austro-Bavarian)">Bavarian (Austro-Bavarian)
                                                </option>
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
                                                <option value="Fon (Dahomeen, Djedji, Fongbe)">Fon (Dahomeen, Djedji,
                                                    Fongbe)
                                                </option>
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
                                                <option value="Kituba (Kikoongo, Munukutuba)">Kituba (Kikoongo,
                                                    Munukutuba)
                                                </option>
                                                <option value="Konkani">Konkani</option>
                                                <option value="Konkani (Kunabi, Cugani, Bankoti)">Konkani (Kunabi,
                                                    Cugani, Bankoti)
                                                </option>
                                                <option value="Korean">Korean</option>
                                                <option value="Kurdish">Kurdish</option>
                                                <option value="Kyrgyz (Kara-Kirgiz, Kirghiz, Kirgiz)">Kyrgyz
                                                    (Kara-Kirgiz, Kirghiz, Kirgiz)
                                                </option>
                                                <option value="Ladino">Ladino</option>
                                                <option value="Lao">Lao</option>
                                                <option value="Latin">Latin</option>
                                                <option value="Latvian">Latvian</option>
                                                <option value="Ligurian">Ligurian</option>
                                                <option value="Lingala (Ngala)">Lingala (Ngala)</option>
                                                <option value="Lithuanian">Lithuanian</option>
                                                <option value="Lombard">Lombard</option>
                                                <option value="Luxembourgeois (Luxemburgian)">Luxembourgeois
                                                    (Luxemburgian)
                                                </option>
                                                <option value="Macedonian">Macedonian</option>
                                                <option value="Malagasy">Malagasy</option>
                                                <option value="Malay (Bahasa Malaysia)">Malay (Bahasa Malaysia)</option>
                                                <option value="Malayalam">Malayalam</option>
                                                <option value="Maldivian (Dhivehi)">Maldivian (Dhivehi)</option>
                                                <option value="Maltese">Maltese</option>
                                                <option value="Mandinka">Mandinka</option>
                                                <option value="Maori (New Zealand Maori)">Maori (New Zealand Maori)
                                                </option>
                                                <option value="Marathi">Marathi</option>
                                                <option value="Mongolian">Mongolian</option>
                                                <option value="Montenegrin">Montenegrin</option>
                                                <option value="Native American (Ojibway, Cree...)">Native American
                                                    (Ojibway, Cree...)
                                                </option>
                                                <option value="Nepali">Nepali</option>
                                                <option value="Newari">Newari</option>
                                                <option value="Norwegian">Norwegian</option>
                                                <option value="Nyanja (Chewa, Chinyanja)">Nyanja (Chewa, Chinyanja)
                                                </option>
                                                <option value="Occitan (Occitani)">Occitan (Occitani)</option>
                                                <option value="Oriya">Oriya</option>
                                                <option value="Oromo (Oromoo , Oromiffa)">Oromo (Oromoo , Oromiffa)
                                                </option>
                                                <option value="Papiamento (or Papiamentu)">Papiamento (or Papiamentu)
                                                </option>
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
                                                <option value="Romany (Gypsy, Danubian)">Romany (Gypsy, Danubian)
                                                </option>
                                                <option value="Rundi (Kirundi, Urundi)">Rundi (Kirundi, Urundi)</option>
                                                <option value="Russian">Russian</option>
                                                <option value="Rwanda (Kinyarwanda)">Rwanda (Kinyarwanda)</option>
                                                <option value="Saami (sami)">Saami (sami)</option>
                                                <option value="Samoan">Samoan</option>
                                                <option value="Sanskrit">Sanskrit</option>
                                                <option value="Serbian (Serbo-Croatian)">Serbian (Serbo-Croatian)
                                                </option>
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
                                                <option value="Tajiki (Tajiki, Tadzhik)">Tajiki (Tajiki, Tadzhik)
                                                </option>
                                                <option value="Tamil">Tamil</option>
                                                <option value="Tatar (Tartar)">Tatar (Tartar)</option>
                                                <option value="Telugu">Telugu</option>
                                                <option value="Tetum">Tetum</option>
                                                <option value="Thai">Thai</option>
                                                <option value="Tibetan">Tibetan</option>
                                                <option value="Tigrigna (Tigray, Tigrinya)">Tigrigna (Tigray,
                                                    Tigrinya)
                                                </option>
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
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="">Language level</td>
                                        <td>
                                            <select name="language_level">
                                                <option value="" selected="">
                                                </option>
                                                <option value="1">Beginner
                                                </option>
                                                <option value="2">Elementary
                                                </option>
                                                <option value="3">Intermediate
                                                </option>
                                                <option value="4">Advanced
                                                </option>
                                                <option value="5">Proficient
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Country</td>
                                        <td>
                                            <select name="country" size="1">
                                                <option value="" selected="">- All -</option>
                                                <option value="- Other -">- Other -</option>
                                                <option value="Afghanistan">Afghanistan</option>
                                                <option value="Albania">Albania</option>
                                                <option value="Algeria">Algeria</option>
                                                <option value="Andorra">Andorra</option>
                                                <option value="Argentina">Argentina</option>
                                                <option value="Armenia">Armenia</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Austria">Austria</option>
                                                <option value="Azerbaijan">Azerbaijan</option>
                                                <option value="Bahamas">Bahamas</option>
                                                <option value="Bahrain">Bahrain</option>
                                                <option value="Bangladesh">Bangladesh</option>
                                                <option value="Barbados">Barbados</option>
                                                <option value="Belarus">Belarus</option>
                                                <option value="Belgium">Belgium</option>
                                                <option value="Belize">Belize</option>
                                                <option value="Benin">Benin</option>
                                                <option value="Bermuda">Bermuda</option>
                                                <option value="Bhutan">Bhutan</option>
                                                <option value="Bolivia">Bolivia</option>
                                                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                <option value="Botswana">Botswana</option>
                                                <option value="Brazil">Brazil</option>
                                                <option value="Bulgaria">Bulgaria</option>
                                                <option value="Burkina Faso">Burkina Faso</option>
                                                <option value="Burma (Myanmar)">Burma (Myanmar)</option>
                                                <option value="Cambodia">Cambodia</option>
                                                <option value="Cameroon">Cameroon</option>
                                                <option value="Canada">Canada</option>
                                                <option value="Cayman Islands">Cayman Islands</option>
                                                <option value="Central African Republic">Central African Republic
                                                </option>
                                                <option value="Chad">Chad</option>
                                                <option value="Chile">Chile</option>
                                                <option value="China">China</option>
                                                <option value="Colombia">Colombia</option>
                                                <option value="Comoros">Comoros</option>
                                                <option value="Congo">Congo</option>
                                                <option value="Costa Rica">Costa Rica</option>
                                                <option value="Croatia">Croatia</option>
                                                <option value="Cuba">Cuba</option>
                                                <option value="Curacao">Curacao</option>
                                                <option value="Cyprus">Cyprus</option>
                                                <option value="Czech Republic">Czech Republic</option>
                                                <option value="Denmark">Denmark</option>
                                                <option value="Dominican Republic">Dominican Republic</option>
                                                <option value="Ecuador">Ecuador</option>
                                                <option value="Egypt">Egypt</option>
                                                <option value="El Salvador">El Salvador</option>
                                                <option value="England">England</option>
                                                <option value="Estonia">Estonia</option>
                                                <option value="Ethiopia">Ethiopia</option>
                                                <option value="Faroe Islands (Faeroe Islands)">Faroe Islands (Faeroe
                                                    Islands)
                                                </option>
                                                <option value="Fiji">Fiji</option>
                                                <option value="Finland">Finland</option>
                                                <option value="France">France</option>
                                                <option value="French Polynesia">French Polynesia</option>
                                                <option value="Gambia">Gambia</option>
                                                <option value="Georgia">Georgia</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Ghana">Ghana</option>
                                                <option value="Greece">Greece</option>
                                                <option value="Greenland">Greenland</option>
                                                <option value="Guam">Guam</option>
                                                <option value="Guatemala">Guatemala</option>
                                                <option value="Guyana">Guyana</option>
                                                <option value="Haiti">Haiti</option>
                                                <option value="Honduras">Honduras</option>
                                                <option value="Hong Kong">Hong Kong</option>
                                                <option value="Hungary">Hungary</option>
                                                <option value="Iceland">Iceland</option>
                                                <option value="India">India</option>
                                                <option value="Indonesia">Indonesia</option>
                                                <option value="Iran">Iran</option>
                                                <option value="Iraq">Iraq</option>
                                                <option value="Ireland (Republic of)">Ireland (Republic of)</option>
                                                <option value="Israel">Israel</option>
                                                <option value="Italy">Italy</option>
                                                <option value="Ivory Coast">Ivory Coast</option>
                                                <option value="Jamaica">Jamaica</option>
                                                <option value="Japan">Japan</option>
                                                <option value="Jordan">Jordan</option>
                                                <option value="Kazakhstan">Kazakhstan</option>
                                                <option value="Kenya">Kenya</option>
                                                <option value="Kuwait">Kuwait</option>
                                                <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                <option value="Laos">Laos</option>
                                                <option value="Latvia">Latvia</option>
                                                <option value="Lebanon">Lebanon</option>
                                                <option value="Liberia">Liberia</option>
                                                <option value="Libya">Libya</option>
                                                <option value="Liechtenstein">Liechtenstein</option>
                                                <option value="Lithuania">Lithuania</option>
                                                <option value="Luxembourg">Luxembourg</option>
                                                <option value="Macedonia">Macedonia</option>
                                                <option value="Madagascar">Madagascar</option>
                                                <option value="Malawi">Malawi</option>
                                                <option value="Malaysia">Malaysia</option>
                                                <option value="Maldives">Maldives</option>
                                                <option value="Mali">Mali</option>
                                                <option value="Malta">Malta</option>
                                                <option value="Mauritania">Mauritania</option>
                                                <option value="Mauritius">Mauritius</option>
                                                <option value="Mexico">Mexico</option>
                                                <option value="Moldova">Moldova</option>
                                                <option value="Monaco">Monaco</option>
                                                <option value="Mongolia">Mongolia</option>
                                                <option value="Morocco">Morocco</option>
                                                <option value="Mozambique">Mozambique</option>
                                                <option value="Namibia">Namibia</option>
                                                <option value="Nepal">Nepal</option>
                                                <option value="Netherlands">Netherlands</option>
                                                <option value="New Caledonia">New Caledonia</option>
                                                <option value="New Zealand">New Zealand</option>
                                                <option value="Nicaragua">Nicaragua</option>
                                                <option value="Niger">Niger</option>
                                                <option value="Nigeria">Nigeria</option>
                                                <option value="North Korea">North Korea</option>
                                                <option value="Northern Ireland">Northern Ireland</option>
                                                <option value="Norway">Norway</option>
                                                <option value="Oman">Oman</option>
                                                <option value="Pakistan">Pakistan</option>
                                                <option value="Panama">Panama</option>
                                                <option value="Papua New Guinea">Papua New Guinea</option>
                                                <option value="Paraguay">Paraguay</option>
                                                <option value="Peru">Peru</option>
                                                <option value="Philippines">Philippines</option>
                                                <option value="Poland">Poland</option>
                                                <option value="Portugal">Portugal</option>
                                                <option value="Puerto Rico">Puerto Rico</option>
                                                <option value="Qatar">Qatar</option>
                                                <option value="Romania">Romania</option>
                                                <option value="Russia">Russia</option>
                                                <option value="Rwanda">Rwanda</option>
                                                <option value="Saudi Arabia">Saudi Arabia</option>
                                                <option value="Scotland">Scotland</option>
                                                <option value="Senegal">Senegal</option>
                                                <option value="Serbia">Serbia</option>
                                                <option value="Seychelles">Seychelles</option>
                                                <option value="Singapore">Singapore</option>
                                                <option value="Slovakia">Slovakia</option>
                                                <option value="Slovenia">Slovenia</option>
                                                <option value="Somalia">Somalia</option>
                                                <option value="South Africa">South Africa</option>
                                                <option value="South Korea">South Korea</option>
                                                <option value="Spain">Spain</option>
                                                <option value="Sri Lanka">Sri Lanka</option>
                                                <option value="Sudan">Sudan</option>
                                                <option value="Suriname">Suriname</option>
                                                <option value="Sweden">Sweden</option>
                                                <option value="Switzerland">Switzerland</option>
                                                <option value="Syria">Syria</option>
                                                <option value="Taiwan">Taiwan</option>
                                                <option value="Tajikistan">Tajikistan</option>
                                                <option value="Tanzania">Tanzania</option>
                                                <option value="Thailand">Thailand</option>
                                                <option value="Togo">Togo</option>
                                                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                <option value="Tunisia">Tunisia</option>
                                                <option value="Turkey">Turkey</option>
                                                <option value="Uganda">Uganda</option>
                                                <option value="Ukraine">Ukraine</option>
                                                <option value="United Arab Emirates">United Arab Emirates</option>
                                                <option value="United States">United States</option>
                                                <option value="Uruguay">Uruguay</option>
                                                <option value="Uzbekistan">Uzbekistan</option>
                                                <option value="Venezuela">Venezuela</option>
                                                <option value="Vietnam">Vietnam</option>
                                                <option value="Wales">Wales</option>
                                                <option value="Yemen">Yemen</option>
                                                <option value="Yugoslavia">Yugoslavia</option>
                                                <option value="Zambia">Zambia</option>
                                                <option value="Zimbabwe">Zimbabwe</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td valign="top" align="left">City<br></td>
                                        <td valign="top" align="left">
                                            <input type="text" name="city" style="width: 227px;"><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="">Age</td>
                                        <td>
                                            From: <input type="text" name="age_min" value="" size="2">
                                            To: <input type="text" name="age_max" value="" size="2">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="">Gender</td>
                                        <td>
                                            <select name="selSex" id="selSex">
                                                <option value="" selected="">
                                                </option>
                                                <option value="male">Male
                                                </option>
                                                <option value="female">Female
                                                </option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="">Username</td>
                                        <td>
                                            <input type="text" id="name" name="name" style="width: 227px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td nowrap="">Introduction contains</td>
                                        <td>
                                            <input type="text" id="introduction_contains" name="introduction_contains"
                                                   style="width: 227px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sort results by</td>
                                        <td>
                                            <select name="order_by" id="order_by">
                                                <option value="Login Date">Login Date</option>
                                                <option value="Profile Date">Profile Date</option>
                                                <option value="Name">Name</option>
                                                <option value="Age">Age</option>
                                                <option value="Language level">Language level</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <input style="float: right;" name="submit" type="submit"
                                       value="Find me a language partner!"/>
                        </form>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <?php
            if (isset($_COOKIE['username'])){
            if (isset($_POST['submit'])){
            ?>
            <div class="result_text">
                <h2> Results - Found <font color="green"><?php echo mysqli_num_rows($user_results); ?></font> possible
                    langauge partners!</h2>
                Page 1 of 10,11,12...
            </div>
            <div class="results_box">
                <table >
                    <?php
                    while ($user_row = mysqli_fetch_array($user_results)) {
                        $learning_languages = array();
                        $native_languages = array();
                        $learning_languages_levels = array();

                        if (!empty($user_row['native_language_one'])) {
                            array_push($native_languages, $user_row['native_language_one']);
                        }
                        if (!empty($user_row['native_language_two'])) {
                            array_push($native_languages, $user_row['native_language_two']);
                        }
                        if (!empty($user_row['native_language_three'])) {
                            array_push($native_languages, $user_row['native_language_three']);
                        }
                        if (!empty($user_row['native_language_four'])) {
                            array_push($native_languages, $user_row['native_language_four']);
                        }

                        if (!empty($user_row['learning_language_one'])) {
                            array_push($learning_languages, $user_row['learning_language_one']);
                        }
                        if (!empty($user_row['learning_language_two'])) {
                            array_push($learning_languages, $user_row['learning_language_two']);
                        }
                        if (!empty($user_row['learning_language_three'])) {
                            array_push($learning_languages, $user_row['learning_language_three']);
                        }
                        if (!empty($user_row['learning_language_four'])) {
                            array_push($learning_languages, $user_row['learning_language_four']);
                        }

                        if (!empty($user_row['learning_language_level_one'])) {
                            array_push($learning_languages_levels, $user_row['learning_language_level_one']);
                        }
                        if (!empty($user_row['learning_language_level_two'])) {
                            array_push($learning_languages_levels, $user_row['learning_language_level_two']);
                        }
                        if (!empty($user_row['learning_language_level_three'])) {
                            array_push($learning_languages_levels, $user_row['learning_language_level_three']);
                        }
                        if (!empty($user_row['learning_language_level_four'])) {
                            array_push($learning_languages_levels, $user_row['learning_language_level_four']);
                        }
                        ?>
                        <tr>
                            <td width="100px" align="center"><img class="results_image" src="images/<?php echo $user_row['profile_pic']; ?>"/>Offline</td>
                            <td style="vertical-align:top" ><?php echo $user_row['first_name'] . " " . $user_row['last_name'] . "<br/> Born on: " . $user_row['year']; ?></td>
                            <td style="vertical-align:top">
                                <table style="margin:auto">
                                    <tr> Native Languages</tr>
                                    <?php
                                    foreach ($native_languages as $native) {
                                    ?>
                                    <tr>
                                    <td><div class="search_native_language"><?php echo $native; ?> </div></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </td>
                            <td style="vertical-align:top">
                                <table>
                                    <tr text-align="center"> Learning Languages</tr>
                                    <?php
                                    $x = 0;
                                    foreach ($learning_languages as $learn) {
                                        ?>
                                        <tr>
                                            <td><div class="search_native_language"><?php echo $learn; ?></div></td>
                                            <td width="100px"><img class="search_learning_language_level" src="images/0<?php echo $learning_languages_levels[$x] ?>.png"/></td>
                                        </tr>
                                        <?php
                                        $x++;
                                    }
                                    ?>
                                </table>
                            </td>
                            <td style="vertical-align:top">  <?php echo $user_row['introduction'] ?></td>
                            <td style="vertical-align:top">Match:<br/><font color="green" size="20pt">89% </font>
                            </td>


                            <?php
                                $dbc = mysqli_connect('localhost', 'root', 'Master95', 'penpal_database')
                                or die('Error connecting to mysql server');
                                $conv_friend = $user_row['username'];
                                $check_conv_query = "SELECT * FROM conversation WHERE (user_one = '$username' AND user_two = '$conv_friend') OR (user_one = '$conv_friend' AND user_two = '$username')";

                                $check_conv_result = mysqli_query($dbc, $check_conv_query);
                                if (mysqli_num_rows($check_conv_result) == 0) {

                                    ?>
                                    <td style="vertical-align:top"><a href = "messaging_tab.php?username=<?php echo $username; ?>&amp;friend=<?php echo $conv_friend;?>"> Send Message </a></td>
                                <?php
                                }
                            ?>

                        </tr>
                        <?php
                    }
                    ?>
                </table>
                <?php }
                } ?>
                <script type="text/javascript">
                    var len = 235;
                    var p = document.getElementById('table_data_description');
                    if (p) {

                        var trunc = p.innerHTML;
                        if (trunc.length > len) {

                            /* Truncate the content of the P, then go back to the end of the
                             previous word to ensure that we don't truncate in the middle of
                             a word */
                            trunc = trunc.substring(0, len);
                            trunc = trunc.replace(/\w+$/, '');

                            /* Add an ellipses to the end and make it a link that expands
                             the paragraph back to its original size */
                            trunc += '...';
                            p.innerHTML = trunc;
                        }
                    }


                </script>
            </div>
        </div>
    </div>
</div><!-- container -->

</body>
</html>