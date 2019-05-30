
function check()
{

 if(document.form2.username.value=="")
  {
    alert("Please Enter Username or email");
  document.form2.username.focus();
  return false;
  }
   if(document.form2.password.value=="")
  {
    alert("Please Enter password");
  document.form2.password.focus();
  return false;
  }

  if (document.getElementById("cpatchaTextBox").value != code)
   {
    alert("Invalid Captcha. try Again");
    createCaptcha();
  }

  return true;
}

function myFunction() {
    var x = document.getElementById("myInput");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
