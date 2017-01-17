function isEmail() {
    var email = document.getElementById("Email").value
    if (email.indexOf("@") < 0) alert('Email shoud contain @');
}

function confirmEmail() {
    var email = document.getElementById("Email").value
    var confirmEmail = document.getElementById("ConfirmEmail").value
    if(email != confirmEmail) alert('Email Not Matching!');
}

function checkPasswordMatch() {
    var password = document.getElementById("Password").value;
    var confirmPassword = document.getElementById("ConfirmPassword").value;
    if(password != confirmPassword) alert('Password Not Matching!');
}
