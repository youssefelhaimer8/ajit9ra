<?php

require_once __DIR__.'/include/header.php'; 


$id = $school->viewpost(@$_GET['v']);

$postss = $school->articleMat("WHERE `link` = '$id'");

$addvue = $school->addvuea($id);

foreach ($postss as $postid){
    $postid;
}
//$what->updatev($postid['id']);
$title=  $postid['name'] ;
$link=  $postid['link'] ;
require_once  __DIR__.'/include/head.php';
require_once  __DIR__.'/include/navbar.php';
$count = $school->voteCount("WHERE `post` = '{$id}' AND `ip` = '$ip'");
?>
 
  <br>
  <div class="container-fluid ">
   <div class="row">

            <!-- Content Column -->
            <div class="col-lg-4 mb-4">

 <!-- Project Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                <div class="header-title alert bg-success"><i class="fad fa-books"></i> قائمة الدروس</div>
                <div  style=" overflow: scroll;height:500px">
             <?php
   
	$mat = $school->articleDoros("where linkmat = '$link' order by id_dars desc");
 if(!empty($mat)):
			
	foreach ($mat as $Doross):?>
<div class="clr hes<?php echo $Doross['link'] ?> goplayer"  src="<?php echo $Doross['link'] ?>">
      <span > <strong class="text-dark" style="font-size:12px"><i class="far fa-book"></i> <?php echo (mb_strlen($Doross['title'] , 'utf8') > 50 ? mb_substr($Doross['title'],0,50).' ...' : $Doross['title']) ?></strong>
        </span> 
   <span style="font-size:9px" class="hesp hesp<?php echo $Doross['link'] ?>"></span>
        </div>
    <?php endforeach; else: ?>
      <div class="alert alert-warning" style="margin:5%">
              <p style="text-align: center" class="text-center text-danger"><span class="fal fa-frown-open fa-3x"></span></p>
          <p class="text-danger text-center">لا توجد أي دروس لهده المادة حاليا حاول لاحقاً</p>
      </div>
   
      
		 <?php  endif; ?>
                 </div>
                  </div>
</div>
</div>
     <div class="col-lg-7 mb-4">
  <div class="card shadow mb-4">
                <div class="card-header py-3">
              <div >
                 <div class="logovideo"></div>
                  <iframe id="player" width="100%" height="315" src="../libs/img/logo.jpg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
             <span>
                <a <?php if($count ==0){ ?>  href="#like" id="addlike" data="<?php echo $postid['link'] ?>" <?php } ?> > <span class="btn btn-primary"><i class="fal fa-thumbs-up"></i> فهمت <strong id="clike">(<?php echo $postid['yes'] ?>)</strong></span></a>
                 <a <?php if($count ==0){ ?> href="#nolike" id="addnolike" data="<?php echo $postid['link'] ?>" <?php }else{ ?>  <?php } ?> > <span class="btn btn-danger"><i class="fal fa-thumbs-down"></i> لم أفهم <strong id="cnolike">(<?php echo $postid['no'] ?>)</strong></span></a>
                 
             </span> 
               <span class="text-dark float-left" style="font-size:10px"><i class="fal fa-eye"></i> شاهده  <?php echo $postid['vue'] ?> </span>
       
               <div class="cmn">
                  <div class="logo_cmn"><i class="fal fa-comments fa-2x text-dark"></i></div>
                   <div class="loadcom"></div>
             
           
               <div class="addcmn">
                 <input type="hidden" id="names" placeholder="add your name" value="مستخدم موقع <?php echo substr($ip,8,12) ?>">
                  <textarea rows="2" id="texts" style="padding:1%"></textarea>
                  <button class="btn btn-primary addcmntrs"><i class="fal fa-comments"></i> إضافة تعليق</button>
                   <hr style="clear:both">
               </div>
                <p class="text-danger"><i class="fal fa-check"></i> الموقع غير مسؤول عن أي تعليق من تعليقات الزوار</p>
              </div>
             
      </div>
</div>
</div>
  </div>
  <script>
           $.post('../datacom.php',{link:<?php echo $id ?>},function(data){
        
          $('.loadcom').html(data)
          
})
      $('.addcmntrs').click(function(){
         var text = $('#texts').val()
         var name = $('#names').val()
         var link = <?php echo $id ?>;
       if( text ==''){
               alert('التعليق فارغ')                     
                                   }else{
    
         $.post('<?php echo $site ?>/include/addlike.php',{name:name,text:text,link:link},function(data){
               $('#texts').val('')
          $.post('../datacom.php',{link:<?php echo $id ?>},function(dataz){
        
          $('.loadcom').html(dataz)
          
})
            
        })
           }
      })
      $('#addlike').click(function(){
         var like = $(this).attr('data')
    
         $.post('<?php echo $site ?>/include/addlike.php',{id_like:like},function(data){
              $('#addlike').attr("id","no")
              $('#addnolike').attr("id","no")
           $('#clike').text(data)
            
            
         })
      })
      $('#addnolike').click(function(){
           var nolike = $(this).attr('data')
         $.post('<?php echo $site ?>/include/addlike.php',{id_nolike:nolike },function(data){
              $('#addnolike').attr("disabled","disabled")
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
      
      </script>
     <?php
require_once  __DIR__.'/include/footer.php';

?>