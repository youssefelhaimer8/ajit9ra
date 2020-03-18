 <?php
	require_once __DIR__.'/app/ini.php';
   $cla = $_POST['link'];
	$mat = $school->articleCom("where link = '$cla' order by id_cmnt asc");
 if(!empty($mat)):
			
	foreach ($mat as $Cmnt):?>
         <div class="commenture">
                 <div><span class="fad fa-user fa-2x"></span> <span><?php echo $Cmnt['name'] ?></span> <span style="font-size:10px"><?php echo $Cmnt['date'] ?></span>
                 <p style="color:gray"><?php echo $Cmnt['text'] ?></p>
                 </div>
               </div>
       <?php endforeach; else: ?>
     
       <div style="text-align: center" class="text-center text-danger"><span class="fal fa-frown-open fa-2x"></span>
          <p class="text-danger text-center">لا توجد أي تعاليق لهده
المادة</p></div>

		 <?php  endif; ?>

<script>
    $('.lls').click(function(){
        var d =$(this).attr('value');
         $('.nn').css('background','rgba(0, 186, 255, 0)');
        $('.ll'+d).css('background','#4e18c7');
       

          
})
          </script>