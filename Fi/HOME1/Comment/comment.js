$(document).ready(function(){

    //Comment
    $("#submitButton").click(function(){
    
    var token = $('#name').val();
    var body = $('#comment').val();
    var cid = $(".reply").attr("id");
    var bodyR = $('#comment').val();
    var Eid = $('#name').val(); 
    if(body == null)
    {
    window.alert(body);
    }
    else if (cid ==0)
    {
    $.ajax({
      type: 'post', 
      url: 'post.php',
      data: {
        'user' : token ,
        'comment_body' : body,
        
      },
      success: function(result){
         // alert(result);
          listComment();
          // $('.comment-post').toggleClass("comment-hide");
          //$('.comment-sucess-hide').toggleClass("comment-sucess");
          //$('#comments_post').load(document.URL +  ' #comments_post');
        }   
        });
      }
      else
      {
      $.ajax({
                type: 'post', 
                url: 'reply.php',
                data: {
                    
                    'Cid' : cid ,
                    'comment_body' : bodyR,
                    'eid' : Eid
           },
                     success: function(result){
                       //alert(result);
                       listComment();
                     // $('.comment-post').toggleClass("comment-hide");
                      //$('.comment-sucess-hide').toggleClass("comment-sucess");
                      //$('#comments_post').load(document.URL +  ' #comments_post');
                                 }   
                        });
            
      }
      
        //return false;
        });
        
      $(document).on('click','.reply',function(){
          
        $('#comment').focus();
        var cid = $(this).attr("id");
        
        
      
       
       
        });
      
        listComment();
        function listComment()
        {
                    var token = $('#name').val();
                    
                    $.ajax({
                    url:'fetch.php',
                    method : 'post',
                    data : {
                    'user' : token
                    },
                    success : function(data)
                    {
                        $('#display_comment').html(data);
                    }
                    
                    });
                
        }
     
});       

