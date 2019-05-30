$(document).ready(function(){
  
    $(document).on('click','#dropdowntoggle', function(){
     //alert('k');
     $('.count').html('');
     load_unseen_notification('yes');
    });
    setInterval(function(){
     load_unseen_notification();;
    }, 5000);
  
    load_unseen_notification();
   // load new notifications
    
    
    // updating the view with notifications using ajax
    function load_unseen_notification(view = '')
    {
     $.ajax({
      url:"fetch.php",
      method:"post",
      data:{
      view : view
      },dataType:"json",
      success:function(data)
      {
      
      //alert('J');
      // $('#dropdownmenu').html(data);
      $('#dropdownmenu').html(data.notification);
       if(data.unseen_notification > 0)
       {
        $('.count').html(data.unseen_notification);
       }
      }
     });
    }
    
    
   
   
    
});

