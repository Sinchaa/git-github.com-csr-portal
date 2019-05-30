function check()
{

 if(document.form1.username.value=="")
  {
    alert("Plese Enter Username");
  document.form1.username.focus();
  return false;
  }

  if(document.form1.email.value=="")
  {
    alert("Plese Enter email address");
  document.form1.email.focus();
  return false;
  }

  if(document.form1.mobilenumber.value=="")
  {
    alert("Plese Enter Contact No");
  document.form1.phone.focus();
  return false;
  }

  if(document.form1.address.value=="")
  {
    alert("Plese Enter The Address");
  document.form1.address.focus();
  return false;
  }

  if( document.form1.state.value == "" )
   {
     alert( "Please provide state!" );
     document.form1.state.focus() ;
     return false;
   } 

   if( document.form1.district.value == "" )
   {
     alert( "Please provide district!" );
     document.form1.district.focus() ;
     return false;
   }  

    if( document.form1.usertype.value == "" )
   {
     alert( "Please provide your user type!" );
     document.form1.usertype.focus() ;
     return false;
   }    
 

  if( document.form1.sector.value == "" )
   {
     alert( "Please provide your area of interest!" );
     document.form1.sector.focus() ;
     return false;
   }     
 
 if(document.form1.password.value=="")
  {
    alert("Plese Enter Your Password");
  document.form1.password.focus();
  return false;
  } 

  return true;
}