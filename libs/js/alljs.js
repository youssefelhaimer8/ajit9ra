 $('#addlike').click(function(){
         var like = $(this).attr('data')
    
         $.post('<?php echo $site ?>/include/addlike.php',{id_like:like},function(data){
           $('#clike').text(data)
            
         })
      })
      $('#addnolike').click(function(){
           var nolike = $(this).attr('data')
         $.post('../include/addlike.php',{id_nolike:nolike },function(data){
             $('#cnolike').text(data)
         })
      })
      $('.goplayer').click(function(){
          var src = $(this).attr('src');
          $(".clr").css('background-color','rgba(250, 30, 30, 0)')
          $(".hes"+src).css('background','rgba(252, 0, 126, 0.74)')
          $(".hesp").html(' <span class="text-success float-left"></span> ')
          $(".hesp"+src).html(' <span class="text-dark float-left"><i class="fal fa-eye"></i> أنت تشاهد الأن</span> ')
          
          var link= "https://www.youtube.com/embed/";
          $('#player').attr("src",link+src)
          window.location.href = '#player'
          
      })
      $('.logovideo').html("<img src='../libs/img/logo' width:'70px' height='70px' style='border-radius:50%'>")
      