<?php
require_once __DIR__.'/include/header.php'; 
$title="أجي تقرا";
require_once  __DIR__.'/include/head.php';
require_once  __DIR__.'/include/navbar.php';


?>
<div style="margin-left:3%">
<span class="text-primary bor">عدد الدروس المرفوعة :  <?php echo $school->darsCount() ?></span>
<span class="text-danger bor">عدد المواد :  <?php echo $school->matierCount() ?></span>
<span class="text-success bor">عدد التعليقات :  <?php echo $school->comCount() ?></span>
<hr>
 <?php
	$tech = $school->articleClass("order by id_class desc");
 if(!empty($tech)):
			
	foreach ($tech as $class):?>

    <div class="card text-dark bg-light  col-md-3" style="float-right;margin-right: 10px;margin-top: 15px;padding:3px;height:100%;margin-left:2%">
  <div class="card-header alert  bg-<?php echo $class['color'] ?> text-center" style="clip-path: polygon(50% 0%, 100% 0, 99% 100%, 91% 69%, 6% 68%, 0 100%, 0 0);height:100px;width:100%;border:1px solid red"><i class="fad fa-school"></i> <?php echo $class['nameclass'] ?></div>
  <div class="card-body" style="padding-top:2px">
    <h5 class="card-title text-primary"><i class="fal fa-books"></i> قائمة المواد</h5>
    
    <?php
    $cla = $class['link'];
	$mat = $school->articleMat("where class = '$cla' order by id_mat asc");
 if(!empty($mat)):
			
	foreach ($mat as $Matier):?>

      <a href="post/<?php echo $Matier['link'] ?>" class="links"> <p class="card-text"><i class="far fa-book"></i> <?php echo $Matier['name'] ?> (<?php echo $school->darsCount("where linkmat = '$Matier[link]'") ?>)</p><hr> </a>  
    <?php endforeach; else: ?>
       <p style="text-align: center" class="text-center text-danger"><span class="fal fa-frown-open fa-1x"></span></p>
          <p class="text-danger"></p>
      
		 <?php  endif; ?>


  </div>
</div>



 <?php endforeach; else: ?>
       <p style="text-align: center" class="text-center text-danger"><span class="fal fa-frown-open fa-1x"></span></p>
          <p class="text-danger"></p>
      
		 <?php  endif; ?>

</div>


  <?php
require_once  __DIR__.'/include/footer.php';

?>