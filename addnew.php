<?php
require_once __DIR__.'/include/header.php'; 
$title='إضافة درس جديد';
require_once  __DIR__.'/include/head.php';
require_once  __DIR__.'/include/navbar.php';


?>

<div class="col-md-6 text-center" style="border:1px solid rgba(255, 255, 255, 0.62);margin:1%;padding:1%;border-radius:15px;width:97%">
    

<form method="post">
   <?php
  if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['sendm'])){

   $school->addDars($_POST['title'] ,$_POST['link'],$_POST['anne'],$_POST['mats']);

}
?>

    <div class="form-group">
    <label for="exampleInputEmail1" class="float-right"><i class="fad fa-pencil-alt"></i> العنوان لدرس</label>
    <input type="text" class="form-control input" name="title" placeholder="العنوان لدرس" required>
   </div>
    <div class="form-group">
    <label for="exampleInputEmail1" class="float-right"><i class="fad fa-link"></i> رابط الفيديو</label>
    <input type="url" class="form-control inputy" value="https://www.youtube.com/watch?v=" name="link" placeholder="رابط الفيديو" required>
    <p class="shows text-warning"></p>
    <hr>
    <label>الإخوان الروابط كين من يوتيوب   انوافر القنوات في أقرب وقت إو نشائ الله <i class="fab fa-youtube"></i></label>
    <iframe id="playerpreview" width="100%" height="115" src="libs/img/logo.jpg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
   </div>
      <div class="form-group">
    <p class="float-right text-warning"> <i class="fad fa-school"></i> إختر ألسنة الدراسية</p>
    <hr style="clear:both">
  
       <?php
	$tech = $school->articleClass("order by id_class desc");
 if(!empty($tech)):
			
	foreach ($tech as $class):?>
      <div class="text-right float-right ms kr<?php echo $class['link'] ?>" style="">
           
            <input type="radio" class="sss" name="anne" value="<?php echo $class['link'] ?>" required>
<label for="male"><?php echo $class['nameclass'] ?></label><hr>
 
      </div>
    
     
        <?php endforeach; else: ?>
       <p style="text-align: center" class="text-center text-danger"><span class="fal fa-frown-open fa-1x"></span></p>
          <p class="text-danger"></p>
      
		 <?php  endif; ?>


<script>
    $('.inputy').keyup(function(){
        var url =  $('.inputy').val()
        var linkres = url.replace("https://www.youtube.com/watch?v=", "https://www.youtube.com/embed/");
        var linkdelimage = url.replace("https://img.youtube.com/vi/", "");
    
        $('.inputy').val(linkdelimage)
       
        $('#playerpreview').attr("src",linkres)
        $.post('include/addlike.php',{link:url},function(data){
        
          $('.shows').html(data)
          
})
    })
    $('.sss').click(function(){
        var d =$(this).attr('value');
         $('.ms').css('background','rgba(0, 186, 255, 0)');
        $('.kr'+d).css('background','#00baff');
       
      $.post('data.php',{link:d},function(data){
        
          $('.show').html(data)
          
})
    })
  
          </script>
   </div>
    <hr style="clear:both">
    <p class="float-right text-warning"> <i class="fad fa-school"></i> إختر المادة </p>
      <hr style="clear:both">
     <div class="show"></div>
     <hr style="clear:both">
      <button type="submit"  class="btn btn-outline-danger btn-lg" name="sendm"><i class="fal fa-paper-plane"> </i> نشر الأن</button>
  
    
</form>
</div>