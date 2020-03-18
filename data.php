 <?php
	require_once __DIR__.'/app/ini.php';
   $cla = $_POST['link'];
	$mat = $school->articleMat("where class = '$cla' order by id_mat desc");
 if(!empty($mat)):
			
	foreach ($mat as $Matier):?>
    <div class="text-right float-right ms nn ll<?php echo $Matier['link'] ?>" style="">
   <input type="radio" class="lls" name="mats" value="<?php echo $Matier['link'] ?>" required>
<label for="male"><?php echo $Matier['name'] ?></label><br>
</div>
       <?php endforeach; else: ?>
     
       <p style="text-align: center" class="text-center text-danger"><span class="fal fa-frown-open fa-1x"></span></p>
          <p class="text-danger"></p>

		 <?php  endif; ?>

<script>
    $('.lls').click(function(){
        var d =$(this).attr('value');
         $('.nn').css('background','rgba(0, 186, 255, 0)');
        $('.ll'+d).css('background','#4e18c7');
       

          
})
          </script>