<?php
require_once __DIR__.'/../include/header.php'; 
$title="admiin";
require_once  __DIR__.'/../include/head.php';
require_once  __DIR__.'/../include/navbar.php';


?>


<?php if(isset($_SESSION['is_logged']) AND $_SESSION['is_logged'] == TRUE   ){ ?>
  
  <h3>إضافة مستوى</h3>
<div class="col-md-6 text-center">
    

<form method="post" style="padding:1%;border-radius:15px;border:1px solid rgba(255, 255, 255, 0.31)">
   <?php
  if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['send'])){

   $school->addClass($_POST['nameclass'] ,$_POST['color']);

}
?>

    <div class="form-group">
    <label for="exampleInputEmail1" class="float-right">إسم الموسم</label>
    <input type="text" class="form-control input" name="nameclass" placeholder="إسم الموسم" required>
    <label for="exampleInputEmail1" class="float-right">لون الهيدر</label>
   </div>
     
      <div class="form-group">
    <label for="exampleInputEmail1" class="float-right">لون الهيدر</label>
    <select class="form-control input" name="color">
         <option value="success">success</option>
         <option value="danger">danger</option>
         <option value="primary">primary</option>
         <option value="secondary">secondary</option>
         <option value="warning">warning</option>
         <option value="dark">dark</option>
          </select>
   </div>
     
     
      <button type="submit"  class="btn btn-outline-primary btn-lg" name="send"><i class="fal fa-paper-plane"> </i> إرسال</button>
</form>
</div>
<hr style="clear:both">
<h3>إضافة مادة</h3>
<div class="col-md-6 text-center">
    

<form method="post" style="padding:1%;border-radius:15px;border:1px solid rgba(255, 255, 255, 0.31)">
   <?php
  if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['sendm'])){

   $school->addMat($_POST['namematier'] ,$_POST['nameclass']);

}
?>

    <div class="form-group">
    <label for="exampleInputEmail1" class="float-right">إسم المادة</label>
    <input type="text" class="form-control input" name="namematier" placeholder="إسم المادة" required>
   </div>
      <div class="form-group">
    <label for="exampleInputEmail1" class="float-right">الأموسم الدراسي</label>
   <select class="form-control input" name="nameclass">
       <?php
	$tech = $school->articleClass("order by id_class desc");
 if(!empty($tech)):
			
	foreach ($tech as $class):?>

       <option value="<?php echo $class['link'] ?>"><?php echo $class['nameclass'] ?></option>
        <?php endforeach; else: ?>
       <p style="text-align: center" class="text-center text-danger"><span class="fal fa-frown-open fa-1x"></span></p>
          <p class="text-danger"></p>
      
		 <?php  endif; ?>


   </select>
   </div>
     
      <button type="submit"  class="btn btn-outline-danger btn-lg" name="sendm"><i class="fal fa-paper-plane"> </i> إرسال</button>
  
    
</form>
</div>
  
 
<?php }else{ ?>
 
<script type='text/javascript'>function Redirect() { window.location='<?php echo $site ?>/admin/login'; } setTimeout('Redirect()', 3);</script>
<?php } ?>