//Create a new button
function createButton(id, class_name, value, onclick_function, context) {
  //Display the save changes one
  var button = document.createElement("input");
  button.type = "button";
  button.id = id;
  button.value = value;
  button.className = class_name;
  button.onclick = onclick_function;
  context.appendChild(button);
}

$('table_nativelanguage').on('click', 'input[type="button"]', function(e){
   $(this).closest('tr').remove()
})

function removeElement(id) {
  element = document.getElementById(id);
  if (typeof(element) != 'undefined' && element != null) {
    element.parentNode.removeChild(element);
  }
}

// Removing the editing elements
function removeEditElements() {

  removeElement("div_native");
  removeElement("div_learning");


  for (var i=0; i<document.getElementById("table_nativelanguage").rows.length; i++) {
    removeElement("div_native_language_" + i);
  }

  for (var i=0; i<document.getElementById("table_learninglanguage").rows.length; i++) {
    removeElement("div_learning_language_" + i);
  }
}

// Add an option to a select box
function addOptionElement(select, name, value) {
  var element = document.createElement("option");
  element.value = value;
  element.innerHTML = name;
  select.appendChild(element);
}

//Add the language select element
function addLanguageSelect(id, class_name, context) {
    var select = document.createElement("select");
    select.id = id;

    addOptionElement(select, "Afrikaans",77);
    addOptionElement(select, "Akan",106);
    addOptionElement(select, "Albanian",60);
    addOptionElement(select, "Amharic (Ethiopian)",94);
    addOptionElement(select, "Arabic, Egyptian",18);
    addOptionElement(select, "Arabic, Middle Eastern",3);
    addOptionElement(select, "Arabic, Moroccan",2);
    addOptionElement(select, "Arabic, other",4);
    addOptionElement(select, "Aramaic",82);
    addOptionElement(select, "Armenian",64);
    addOptionElement(select, "Assamese",112);
    addOptionElement(select, "Assyrian",78);
    addOptionElement(select, "Azerbaijani",72);
    addOptionElement(select, "Bambara (Bamana)",165);
    addOptionElement(select, "Baoulé (Baule, Bawule)",145);
    addOptionElement(select, "Basque",7);
    addOptionElement(select, "Bavarian",144);
    addOptionElement(select, "Belarusian",100);
    addOptionElement(select, "Bemba (Chiwemba, Wemba)",153);
    addOptionElement(select, "Bengali",8);
    addOptionElement(select, "Berber (Tamazight)",9);
    addOptionElement(select, "Bosnian",59);
    addOptionElement(select, "Breton",116);
    addOptionElement(select, "Bulgarian",10);
    addOptionElement(select, "Burmese",96);
    addOptionElement(select, "Cambodian (Khmer)",65);
    addOptionElement(select, "Catalan",55);
    addOptionElement(select, "Cebuano (Bisaya)",136);
    addOptionElement(select, "Chichewa",95);
    addOptionElement(select, "Chichewa (Nyanja)",95);
    addOptionElement(select, "Chinese, Cantonese",11);
    addOptionElement(select, "Chinese, Mandarin",12);
    addOptionElement(select, "Chinese, other",13);
    addOptionElement(select, "Chuvash (Bulgar)",147);
    addOptionElement(select, "Creole",14);
    addOptionElement(select, "Croatian",83);
    addOptionElement(select, "Czech",15);
    addOptionElement(select, "Danish",16);
    addOptionElement(select, "Dutch",17);
    addOptionElement(select, "English",1);
    addOptionElement(select, "Esperanto",19);
    addOptionElement(select, "Estonian",63);
    addOptionElement(select, "Faroese",146);
    addOptionElement(select, "Fijian",88);
    addOptionElement(select, "Filipino (Tagalog)",20);
    addOptionElement(select, "Finnish",21);
    addOptionElement(select, "Fon (Dahomeen, Djedji, Fongbe)",155);
    addOptionElement(select, "French",22);
    addOptionElement(select, "Gaelic (Irish)",68);
    addOptionElement(select, "Gaelic (Scottish)",69);
    addOptionElement(select, "Galician",79);
    addOptionElement(select, "Georgian",71);
    addOptionElement(select, "German",23);
    addOptionElement(select, "Greek",24);
    addOptionElement(select, "Gujarati",74);
    addOptionElement(select, "Hausa",138);
    addOptionElement(select, "Hawaiian",73);
    addOptionElement(select, "Hebrew",25);
    addOptionElement(select, "Hindi",26);
    addOptionElement(select, "Hmong",117);
    addOptionElement(select, "Hungarian",27);
    addOptionElement(select, "Icelandic",56);
    addOptionElement(select, "Ido",109);
    addOptionElement(select, "Igbo (Ibo)",157);
    addOptionElement(select, "Indonesian (Bahasa)",5);
    addOptionElement(select, "Interlingua",108);
    addOptionElement(select, "Italian",29);
    addOptionElement(select, "Japanese",30);
    addOptionElement(select, "Kachchi",159);
    addOptionElement(select, "Kannada",67);
    addOptionElement(select, "Kazakh",91);
    addOptionElement(select, "Kituba (Kikoongo, Munukutuba)",141);
    addOptionElement(select, "Konkani",123);
    addOptionElement(select, "Konkani (Kunabi, Cugani, Bankoti)",143);
    addOptionElement(select, "Korean",31);
    addOptionElement(select, "Kurdish",53);
    addOptionElement(select, "Kyrgyz (Kara-Kirgiz, Kirghiz, Kirgiz)",135);
    addOptionElement(select, "Ladino",133);
    addOptionElement(select, "Lao",84);
    addOptionElement(select, "Latin",57);
    addOptionElement(select, "Latvian",62);
    addOptionElement(select, "Ligurian",114);
    addOptionElement(select, "Lingala (Ngala)",142);
    addOptionElement(select, "Lithuanian",61);
    addOptionElement(select, "Lombard",66);
    addOptionElement(select, "Luxembourgeois (Luxemburgian)",148);
    addOptionElement(select, "Macedonian",87);
    addOptionElement(select, "Malagasy",115);
    addOptionElement(select, "Malay (Bahasa Malaysia)",6);
    addOptionElement(select, "Malayalam",93);
    addOptionElement(select, "Maldivian (Dhivehi)",119);
    addOptionElement(select, "Maltese",101);
    addOptionElement(select, "Mandinka",160);
    addOptionElement(select, "Maori (New Zealand Maori)",122);
    addOptionElement(select, "Marathi",85);
    addOptionElement(select, "Mongolian",105);
    addOptionElement(select, "Montenegrin",158);
    addOptionElement(select, "Native American (Ojibway, Cree...)",104);
    addOptionElement(select, "Nepali",81);
    addOptionElement(select, "Newari",102);
    addOptionElement(select, "Norwegian",32);
    addOptionElement(select, "Nyanja (Chewa, Chinyanja)",151);
    addOptionElement(select, "Occitan (Occitani)",154);
    addOptionElement(select, "Oriya",90);
    addOptionElement(select, "Oromo (Oromoo , Oromiffa)",152);
    addOptionElement(select, "Papiamento (or Papiamentu)",161);
    addOptionElement(select, "Paraguayan Guarani",124);
    addOptionElement(select, "Persian (Farsi, Dari)",33);
    addOptionElement(select, "Polish",34);
    addOptionElement(select, "Portuguese",35);
    addOptionElement(select, "Pulaar",128);
    addOptionElement(select, "Punjabi",36);
    addOptionElement(select, "Purépecha (Tarascan)",166);
    addOptionElement(select, "Pushto (Pashto)",58);
    addOptionElement(select, "Quechua",80);
    addOptionElement(select, "Romanian",37);
    addOptionElement(select, "Romansch",89);
    addOptionElement(select, "Romany (Gypsy, Danubian)",150);
    addOptionElement(select, "Rundi (Kirundi, Urundi)",140);
    addOptionElement(select, "Russian",38);
    addOptionElement(select, "Rwanda (Kinyarwanda)",139);
    addOptionElement(select, "Saami (sami)",121);
    addOptionElement(select, "Samoan",132);
    addOptionElement(select, "Sanskrit",111);
    addOptionElement(select, "Serbian (Serbo-Croatian)",39);
    addOptionElement(select, "Shona",98);
    addOptionElement(select, "Sicilian",131);
    addOptionElement(select, "Sign Language",40);
    addOptionElement(select, "Sindhi",76);
    addOptionElement(select, "Sinhalese",86);
    addOptionElement(select, "Slovak",41);
    addOptionElement(select, "Slovenian",54);
    addOptionElement(select, "Somali",99);
    addOptionElement(select, "Spanish",42);
    addOptionElement(select, "Swahili",43);
    addOptionElement(select, "Swedish",44);
    addOptionElement(select, "Swiss German",163);
    addOptionElement(select, "Tajiki (Tajiki, Tadzhik)",149);
    addOptionElement(select, "Tamil",45);
    addOptionElement(select, "Tatar (Tartar)",126);
    addOptionElement(select, "Telugu",75);
    addOptionElement(select, "Tetum",103);
    addOptionElement(select, "Thai",46);
    addOptionElement(select, "Tibetan",47);
    addOptionElement(select, "Tigrigna (Tigray, Tigrinya)",137);
    addOptionElement(select, "Tok Pisin",162);
    addOptionElement(select, "Tongan",107);
    addOptionElement(select, "Tswana",92);
    addOptionElement(select, "Tumbuka",134);
    addOptionElement(select, "Turkish",48);
    addOptionElement(select, "Ukrainian",49);
    addOptionElement(select, "Urdu",50);
    addOptionElement(select, "Uyghur (Wighor)",127);
    addOptionElement(select, "Uzbek",97);
    addOptionElement(select, "Venetian",113);
    addOptionElement(select, "Vietnamese",51);
    addOptionElement(select, "Welsh",70);
    addOptionElement(select, "Wolof",129);
    addOptionElement(select, "Wolof",129);
    addOptionElement(select, "Xhosa",118);
    addOptionElement(select, "Yiddish",52);
    addOptionElement(select, "Yoruba",130);
    addOptionElement(select, "Zulu",125);

    context.appendChild(select);
}

//Add the language level select
function addLanguageLevel(id, class_name, context) {

  //The select box for languages
  var select = document.createElement("select");
  select.id = id;

  addOptionElement(select, "Beginner",0);
  addOptionElement(select, "Elementary",1);
  addOptionElement(select, "Intermediate",2);
  addOptionElement(select, "Advanced",3);
  addOptionElement(select, "Proficient",4);

  context.appendChild(select);
}

//Edit a user's picture
function changePicture() {

  return false;
}

//Add all the editing elements
function addEditElements() {

  var table = document.getElementById("table_nativelanguage");

  for (var i=0, row; row = table.rows[i]; i++) {
    var div_native_language = document.createElement("div");
    div_native_language.id = "div_native_language_" + i;
    cell = row.insertCell(1);
    createButton("remove_nativelanguage"+i,"remove_nativelanguage"+i,"Remove",null,div_native_language);
    cell.appendChild(div_native_language);
  }

  //Add the buttons for the native language
  var native_language_container = document.getElementById("native_language");

  var div_native = document.createElement("div");
  div_native.id = "div_native";

  addLanguageSelect("native_mainselect","native_mainselect",div_native);
  createButton("button_addnative", "button_addnative", "Add", addNewNativeLangauge, div_native);

  var native_mainselect = document.getElementById("native_mainselect")
  native_language_container.appendChild(div_native);

  var table = document.getElementById("table_learninglanguage");

  for (var i=0, row; row = table.rows[i]; i++) {
    var div_learning_language = document.createElement("div");
    div_learning_language.id = "div_learning_language_" + i;
    cell = row.insertCell(2);
    createButton("remove_nativelanguage"+i,"remove_nativelanguage"+i,"Remove",
    $('table').on('click', 'input[type="button"]', function(e){
    $(this).closest('tr').remove()
   })

    ,div_learning_language);
    cell.appendChild(div_learning_language);

    // Add the langauge box and level box
    cell = row.insertCell(3);
    addLanguageSelect("select_learning_language"+i,"select_learning_language"+i, div_learning_language);
    addLanguageLevel("select_learning_languagelevel"+i,"select_learning_languagelevel"+i,div_learning_language);

    cell.appendChild(div_learning_language);

  }

 //Add the buttons for the learning language
  var div_learning = document.createElement("div");
  div_learning.id = "div_learning";

  //Add the "Language" "Level" "Add"
  addLanguageSelect("select_learning_language","select_learning_language", div_learning);
  addLanguageLevel("select_learning_languagelevel","select_learning_languagelevel",div_learning);
  createButton("button_addlearning", "button_addlearning", "Add", addNewLearningLangauge, div_learning);

  var learning_language_container = document.getElementById("learning_language_container");
  learning_language_container.appendChild(div_learning);

  // Add the change picture for a user
  var div_picture = document.getElementById("profile_picture_box");
  createButton("button_editpicture", "button_editpicture", "Change picture", changePicture, div_picture);

}

//Restore the profile back to it's original state
function restoreProfile() {

  //Remove all those elements we added
  removeElement("button_saveprofile");
  removeElement("button_cancel");
  removeElement("introduction_textarea");
  removeElement("button_editpicture");

  document.getElementById("button_editprofile").style.display = "block";
  document.getElementById("introduction_text").style.display = "block";

  removeEditElements();

}

// Set the selected option based on text
function setSelectedText(select, text) {
  for (var i = 0; i < select.options.length; i++) {
    if (select.options[i].text === text) {
      select.selectedIndex = i;
      break;
    }
  }
}

// Set the selected option based on text
function setSelectedLevel(select, level) {
  if (level == "images/01.png") {
    select.value = 0;
  } else if (level == "images/02.png") {
    select.value = 1;
  } else if (level == "images/03.png") {
    select.value = 2;
  } else if (level == "images/04.png") {
    select.value = 3;
  } else {
    select.value = 4;
  }
}

//Update the changes
function updateProfile() {
  //$.get("update_profile.php");
  document.getElementById("introduction_text").innerHTML = document.getElementById("introduction_textarea").value;
  restoreProfile();
  return false;
}

// Cancel the profile and restore the data
function cancelProfile() {
  //$.get("fetch_profile.php");
  restoreProfile();
  removeEditElements();
}

//Fetch the original database
function fetchProfile() {
  //$.get("fetch_profile.php");
}

//Client side user side profile edit
function editProfile() {

	var introduction = document.getElementById("introduction");

  //Create the textarea
  var textArea = document.createElement("textarea");
  textArea.id = "introduction_textarea";
  textArea.className = "introduction_textarea";
  //Hide the text
  var introduction_text = document.getElementById("introduction_text");
  introduction_text.style.display = "none";

  var textNode = document.createTextNode(introduction_text.innerHTML);

  textArea.appendChild(textNode);
  introduction.appendChild(textArea);

  //Hide the edit button
  var button_editprofile = document.getElementById("button_editprofile");
  button_editprofile.style.display = "none";

  var editProfile = document.getElementById("edit_profile");
  //Create a save button
  createButton("button_saveprofile", "button_saveprofile", "Save changes", updateProfile, editProfile);

  //Create a cancel button
  createButton("button_cancel", "button_cancel", "Cancel", restoreProfile, editProfile);

  //Add all the editing elements
  addEditElements();
}

// Get the flag from a country
function getFlagFromCountry(language) {
    //Credit to Jin for his hard work on this! 
    if (language == "Afrikaans") {
    	return "images/16/South-Africa.png";
    } else if (language == "Akan") {
    	return "images/16/Ghana.png";
    } else if (language == "Albanian") {
    	return "images/16/Albania.png";
    } else if (language == "Amharic (Ethiopian)") {
    	return "images/16/Ethiopia.png";
    } else if (language == "Arabic, Egyptian") {
    	return "images/16/Egypt.png";
    } else if (language == "Arabic, Middle Eastern") {
    	return "images/16/Iraq.png";
    } else if (language == "Arabic, Moroccan") {
    	return "images/16/Morocco.png";
    } else if (language == "Arabic, other") {
    	return "images/16/Guam.png";
    } else if (language == "Aramaic") {
    	return "images/16/Armenia.png";
    } else if (language == "Armenian") {
    	return "images/16/Armenia.png";
    } else if (language == "Assamese") {
    	return "images/16/India.png";
    } else if (language == "Assyrian") {
    	return "images/16/Iraq.png";
    } else if (language == "Azerbaijani") {
    	return "images/16/Iran.png";
    } else if (language == "Bambara (Bamana)") {
    	return "images/16/Mali.png";
    } else if (language == "Baoulé (Baule, Bawule)") {
    	return "images/16/Bahamas.png";
    } else if (language == "Basque") {
    	return "images/16/Spain.png";
    } else if (language == "Bavarian") {
    	return "images/16/Bavaria.png";
    } else if (language == "Belarusian") {
    	return "images/16/Belarus.png";
    } else if (language == "Bemba (Chiwemba, Wemba)") {
    	return "images/16/Unknown.png";
    } else if (language == "Bengali") {
    	return "images/16/Bangladesh.png";
    } else if (language == "Berber (Tamazight)") {
    	return "images/16/Algeria.png";
    } else if (language == "Bosnian") {
    	return "images/16/Croatia.png";
    } else if (language == "Breton") {
    	return "images/16/France.png";
    } else if (language == "Bulgarian") {
    	return "images/16/Bulgaria.png";
    } else if (language == "Burmese") {
    	return "images/16/Burma.png";
    } else if (language == "Cambodian (Khmer)") {
    	return "images/16/Cambodia.png";
    } else if (language == "Catalan") {
    	return "images/16/Andorra.png";
    } else if (language == "Cebuano (Bisaya)") {
    	return "images/16/Philippines.png";
    } else if (language == "Chichewa") {
    	return "images/16/Unknown.png";
    } else if (language == "Chichewa (Nyanja)") {
    	return "images/16/Unknown.png";
    } else if (language == "Chinese, Cantonese") {
    	return "images/16/Hong-Kong.png";
    } else if (language == "Chinese, Mandarin") {
    	return "images/16/China.png";
    } else if (language == "Chinese, other") {
    	return "images/16/China.png";
    } else if (language == "Chuvash (Bulgar)") {
    	return "images/16/Unknown.png";
    } else if (language == "Creole") {
    	return "images/16/Seychelles.png";
    } else if (language == "Croatian") {
    	return "images/16/Croatia.png";
    } else if (language == "Czech") {
    	return "images/16/Czech-Republic.png";
    } else if (language == "Danish") {
    	return "images/16/Denmark.png";
    } else if (language == "Dutch") {
    	return "images/16/Belgium.png";
    } else if (language == "English") {
    	return "images/16/United-Kingdom.png";
    } else if (language == "Esperanto") {
    	return "images/16/Unknown.png";
    } else if (language == "Estonian") {
    	return "images/16/Estonia.png";
    } else if (language == "Faroese") {
    	return "images/16/Faroes.png";
    } else if (language == "Fijian") {
    	return "images/16/Fiji.png";
    } else if (language == "Filipino (Tagalog)") {
    	return "images/16/Philippines.png";
    } else if (language == "Finnish") {
    	return "images/16/Finland.png";
    } else if (language == "Fon (Dahomeen, Djedji, Fongbe)") {
    	return "images/16/Unknown.png";
    } else if (language == "French") {
    	return "images/16/France.png";
    } else if (language == "Gaelic (Irish)") {
    	return "images/16/Ireland.png";
    } else if (language == "Gaelic (Scottish)") {
    	return "images/16/Scotland.png";
    } else if (language == "Galician") {
    	return "images/16/Galicia.png";
    } else if (language == "Georgian") {
    	return "images/16/Georgia.png";
    } else if (language == "German") {
    	return "images/16/Germany.png";
    } else if (language == "Greek") {
    	return "images/16/Greece.png";
    } else if (language == "Gujarati") {
    	return "images/16/India.png";
    } else if (language == "Hausa") {
    	return "images/16/Unknown.png";
    } else if (language == "Hawaiian") {
    	return "images/16/Unknown.png";
    } else if (language == "Hebrew") {
    	return "images/16/Israel.png";
    } else if (language == "Hindi") {
    	return "images/16/Unknown.png";
    } else if (language == "Hmong") {
    	return "images/16/Unknown.png";
    } else if (language == "Hungarian") {
    	return "images/16/Hungary.png";
    } else if (language == "Icelandic") {
    	return "images/16/Iceland.png";
    } else if (language == "Ido") {
    	return "images/16/Unknown.png";
    } else if (language == "Igbo (Ibo)") {
    	return "images/16/Unknown.png";
    } else if (language == "Indonesian (Bahasa)") {
    	return "images/16/Indonesia.png";
    } else if (language == "Interlingua") {
    	return "images/16/Unknown.png";
    } else if (language == "Italian") {
    	return "images/16/Italy.png";
    } else if (language == "Japanese") {
    	return "images/16/Japan.png";
    } else if (language == "Kachchi") {
    	return "images/16/Unknown.png";
    } else if (language == "Kannada") {
    	return "images/16/India.png";
    } else if (language == "Kazakh") {
    	return "images/16/Kazakhstan.png";
    } else if (language == "Kituba (Kikoongo, Munukutuba)") {
    	return "images/16/Unknown.png";
    } else if (language == "Konkani") {
    	return "images/16/Unknown.png";
    } else if (language == "Konkani (Kunabi, Cugani, Bankoti)") {
    	return "images/16/Unknown.png";
    } else if (language == "Korean") {
    	return "images/16/South-Korea.png";
    } else if (language == "Kurdish") {
    	return "images/16/Iraq.png";
    } else if (language == "Kyrgyz (Kara-Kirgiz, Kirghiz, Kirgiz)") {
    	return "images/16/Unknown.png";
    } else if (language == "Ladino") {
    	return "images/16/Unknown.png";
    } else if (language == "Lao") {
    	return "images/16/Laos.png";
    } else if (language == "Latin") {
    	return "images/16/Vatican-City.png";
    } else if (language == "Latvian") {
    	return "images/16/Latvia.png";
    } else if (language == "Ligurian") {
    	return "images/16/Unknown.png";
    } else if (language == "Lingala (Ngala)") {
    	return "images/16/Unknown.png";
    } else if (language == "Lithuanian") {
    	return "images/16/Lithuania.png";
    } else if (language == "Lombard") {
    	return "images/16/Unknown.png";
    } else if (language == "Luxembourgeois (Luxemburgian)") {
    	return "images/16/Unknown.png";
    } else if (language == "Macedonian") {
    	return "images/16/Macedonia.png";
    } else if (language == "Malagasy") {
    	return "images/16/Madagascar.png";
    } else if (language == "Malay (Bahasa Malaysia)") {
    	return "images/16/Malaysia.png";
    } else if (language == "Malayalam") {
    	return "images/16/India.png";
    } else if (language == "Maldivian (Dhivehi)") {
    	return "images/16/Unknown.png";
    } else if (language == "Maltese") {
    	return "images/16/Malta.png";
    } else if (language == "Mandinka") {
    	return "images/16/Unknown.png";
    } else if (language == "Maori (New Zealand Maori)") {
    	return "images/16/New-Zealand.png";
    } else if (language == "Marathi") {
    	return "images/16/India.png";
    } else if (language == "Mongolian") {
    	return "images/16/Mongolia.png";
    } else if (language == "Montenegrin") {
    	return "images/16/Unknown.png";
    } else if (language == "Native American (Ojibway, Cree...)") {
    	return "images/16/Unknown.png";
    } else if (language == "Nepali") {
    	return "images/16/Nepal.png";
    } else if (language == "Newari") {
    	return "images/16/Unknown.png";
    } else if (language == "Norwegian") {
    	return "images/16/Norway.png";
    } else if (language == "Nyanja (Chewa, Chinyanja)") {
    	return "images/16/Unknown.png";
    } else if (language == "Occitan (Occitani)") {
    	return "images/16/Unknown.png";
    } else if (language == "Oriya") {
    	return "images/16/India.png";
    } else if (language == "Oromo (Oromoo , Oromiffa)") {
    	return "images/16/Unknown.png";
    } else if (language == "Papiamento (or Papiamentu)") {
    	return "images/16/Aruba.png";
    } else if (language == "Paraguayan Guarani") {
    	return "images/16/Unknown.png";
    } else if (language == "Persian (Farsi, Dari)") {
    	return "images/16/Iran.png";
    } else if (language == "Polish") {
    	return "images/16/Poland.png";
    } else if (language == "Portuguese") {
    	return "images/16/Portugal.png";
    } else if (language == "Pulaar") {
    	return "images/16/Unknown.png";
    } else if (language == "Punjabi") {
    	return "images/16/India.png";
    } else if (language == "Purépecha (Tarascan)") {
    	return "images/16/Unknown.png";
    } else if (language == "Pushto (Pashto)") {
    	return "images/16/Unknown.png";
    } else if (language == "Quechua") {
    	return "images/16/Unknown.png";
    } else if (language == "Romanian") {
    	return "images/16/Romania.png";
    } else if (language == "Romansch") {
    	return "images/16/Unknown.png";
    } else if (language == "Romany (Gypsy, Danubian)") {
    	return "images/16/Unknown.png";
    } else if (language == "Rundi (Kirundi, Urundi)") {
    	return "images/16/Unknown.png";
    } else if (language == "Russian") {
    	return "images/16/Russia.png";
    } else if (language == "Rwanda (Kinyarwanda)") {
    	return "images/16/Rwanda.png";
    } else if (language == "Saami (sami)") {
    	return "images/16/Unknown.png";
    } else if (language == "Samoan") {
    	return "images/16/American-Samoa.png";
    } else if (language == "Sanskrit") {
    	return "images/16/Bangladesh.png";
    } else if (language == "Serbian (Serbo-Croatian)") {
    	return "images/16/Bosnia-and-Herzegovina.png";
    } else if (language == "Shona") {
    	return "images/16/Unknown.png";
    } else if (language == "Sicilian") {
    	return "images/16/Unknown.png";
    } else if (language == "Sign Language") {
    	return "images/16/Unknown.png";
    } else if (language == "Sindhi") {
    	return "images/16/Philippines.png";
    } else if (language == "Sinhalese") {
    	return "images/16/Sri-Lanka.png";
    } else if (language == "Slovak") {
    	return "images/16/Slovakia.png";
    } else if (language == "Slovenian") {
    	return "images/16/Slovenia.png";
    } else if (language == "Somali") {
    	return "images/16/Somalia.png";
    } else if (language == "Spanish") {
    	return "images/16/Spain.png";
    } else if (language == "Swahili") {
    	return "images/16/Kenya.png";
    } else if (language == "Swedish") {
    	return "images/16/Sweden.png";
    } else if (language == "Swiss German") {
    	return "images/16/Switzerland.png";
    } else if (language == "Tajiki (Tajiki, Tadzhik)") {
    	return "images/16/Unknown.png";
    } else if (language == "Tamil") {
    	return "images/16/Singapore.png";
    } else if (language == "Tatar (Tartar)") {
    	return "images/16/Unknown.png";
    } else if (language == "Telugu") {
    	return "images/16/Unknown.png";
    } else if (language == "Tetum") {
    	return "images/16/Unknown.png";
    } else if (language == "Thai") {
    	return "images/16/Thailand.png";
    } else if (language == "Tibetan") {
    	return "images/16/China.png";
    } else if (language == "Tigrigna (Tigray, Tigrinya)") {
    	return "images/16/Unknown.png";
    } else if (language == "Tok Pisin") {
    	return "images/16/Unknown.png";
    } else if (language == "Tongan") {
    	return "images/16/Tonga.png";
    } else if (language == "Tswana") {
    	return "images/16/Botswana.png";
    } else if (language == "Tumbuka") {
    	return "images/16/Unknown.png";
    } else if (language == "Turkish") {
    	return "images/16/Turkey.png";
    } else if (language == "Ukrainian") {
    	return "images/16/Ukraine.png";
    } else if (language == "Urdu") {
    	return "images/16/Pakistan.png";
    } else if (language == "Uyghur (Wighor)") {
    	return "images/16/China.png";
    } else if (language == "Uzbek") {
    	return "images/16/Unknown.png";
    } else if (language == "Venetian") {
    	return "images/16/Unknown.png";
    } else if (language == "Vietnamese") {
    	return "images/16/Vietnam.png";
    } else if (language == "Welsh") {
    	return "images/16/United-Kingdom.png";
    } else if (language == "Wolof") {
    	return "images/16/Senegal.png";
    } else if (language == "Xhosa") {
    	return "images/16/Unknown.png";
    } else if (language == "Yiddish") {
    	return "images/16/Unknown.png";
    } else if (language == "Yoruba") {
    	return "images/16/Unknown.png";
    } else if (language == "Zulu") {
    	return "images/16/Unknown.png";
    }
}

//Add a new native language
function addNewNativeLangauge() {
  //Inset a new row at the end
  var table = document.getElementById("table_nativelanguage");
  var row = table.insertRow(-1);
  cell = row.insertCell(0);

  // "Language" "Flag"
  var div = document.createElement("div");
  var selected_language = document.getElementById("native_mainselect");
  var country = selected_language.options[selected_language.selectedIndex].text;
  div.style = "font-size: 14px;";
  div.innerHTML += country;
  div.innerHTML += '<img class = flag src = "'  + getFlagFromCountry(country) + '"/>';
  cell.appendChild(div);

}

//Add a new learning language
function addNewLearningLangauge() {
  //Inset a new row at the end
  var table = document.getElementById("table_learninglanguage");
  var row = table.insertRow(-1);
  cell = row.insertCell(0);

  // ["Language" "Flag"] [Language Level]
  var div = document.createElement("div");
  var selected_language = document.getElementById("select_learning_language");
  var country = selected_language.options[selected_language.selectedIndex].text;
  div.style = "font-size: 14px;";
  div.innerHTML += country;
  div.innerHTML += '<img class = flag src = "' + getFlagFromCountry(country) +  '"/>';

  var selected_language_level = document.getElementById("select_learning_languagelevel");
  var level = selected_language_level.options[selected_language_level.selectedIndex].text;
  cell.appendChild(div);

  cell = row.insertCell(1);
  var div = document.createElement("div");
  div.className = "language_level";

  if (level == "Beginner") {
    div.innerHTML += '<img src="images/01.png"/></br>';
  } else if (level == "Elementary"){
    div.innerHTML += '<img src="images/02.png"/></br>';
  } else if (level == "Intermediate"){
    div.innerHTML += '<img src="images/03.png"/></br>';
  } else if (level == "Advanced"){
    div.innerHTML += '<img src="images/04.png"/></br>';
  } else {
    div.innerHTML += '<img src="images/05.png"/></br>';
  }

  cell.appendChild(div);
}
