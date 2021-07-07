function validateRegistration(form)
{
    name_fail = validateName(form.name.value);
    //surname_fail = validateSurname(form.surname.value);
    //username_fail = validateUsername(form.username.value);
    //pwd_fail = validatePassword(form.password.value);
    //cpwd_fail = validateCpassword(form.cpassword.value, form.password.value);
    email_fail = validateEmail(form.email.value);
    contact_fail = phonenumber(form.contact.value);
    
    /*surname_fail === "" && username_fail === "" && pwd_fail === "" && cpwd_fail === "" &&*/
    if( name_fail === "" &&  email_fail === "" && contact_fail === "")
    {
        return true;
    }else
    {
        var nameEl = document.getElementById('msgName');
        nameEl.style.color = 'red';
        nameEl.textContent = name_fail;
        /*
        var surnameEl = document.getElementById('msgSurname');
        surnameEl.style.color = 'red';
        surnameEl.textContent = surname_fail;
        
        var usernameEl = document.getElementById('msgUsername');
        usernameEl.style.color = 'red';
        usernameEl.textContent = username_fail;
        
        var passwordEl = document.getElementById('msgPassword');
        passwordEl.style.color = 'red';
        passwordEl.textContent = pwd_fail;
        
        var c_pwdEl = document.getElementById('msgconfirm');
        c_pwdEl.style.color = 'red';
        c_pwdEl.textContent = cpwd_fail;
        */
        var emailEl = document.getElementById('msgEmail');
        emailEl.style.color = 'red';
        emailEl.textContent = email_fail;

        var contactEl = document.getElementById('msgContact');
        contactEl.style.color = 'red';
        contactEl.textContent = contact_fail;
        
        return false;
    }
}

function validateName(field)
{
    if (field === "")
    {
        return "Please enter your name.\n";
    }else if(/[^a-zA-Z]/.test(field))
    {
        return "invalid Name\n";
    }
        return "";
}
/*validate surname & username
function validateSurname(field)
{
    
    if(field === "")
    {
        return textContent = "No Surname was entered";
    }else if(/[^a-zA-Z]/.test(field))
    {
        return "invalid Name\n";
    }
    return "";
}

function validateUsername(field)
{

    if(field === "")
    {
        return "No Username was entered.\n";
    }else if(field.length < 5)
    {
        return "Username is too short.\n";
    }else if(/[^a-zA-Z0-9_-]/.test(field))
    {
        return "Only a-z, A-Z, 0-9, - and _ allowed in Usernames.\n";
    }
    
    return "";    
}
*/

/* Validate password
function validatePassword(field)
{
    if(field === "")
    {
        return "No Password was entered.\n";
    }else if(field.length < 6)
    {
        return "Passwords must be at least 6 characters.\n"; 
    }else if(!/[a-z]/.test(field) || ! /[A-Z]/.test(field) || !/[0-9]/.test(field))
    {
        return "Passwords require one each of a-z, A-Z and 0-9.\n";
    }
    
    return "";
}

function validateCpassword(field, field2)
{
    if(field === "")
    {
        return "No Password was entered.\n";
    }else if(field.length < 6)
    {
        return "Passwords must be at least 6 characters.\n"; 
    }else if( field !== field2)
    {
        return "passwords do not match";
    }
    
    return "";
}
*/
function validateEmail(field)
{
    if(field === "")
    {
        return  "Please enter a valid email address.\n";
    }else if(!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field))
    {
        return  "The Email address is invalid.\n";
    }
    return "";
}

function phonenumber(field)
{
  var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
  if(field === "")
    {
        return  "Please enter a valid phone number.\n";
    }else if(field.match(phoneno))
    {
      return "";
    }else{
        return  "The Phone number is invalid.\n";
    }
}