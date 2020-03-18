<?php
$title="تسجيل دخول لحسابي";
require_once  __DIR__.'/../include/header.php';
require_once  __DIR__.'/../include/head.php';
require_once  __DIR__.'/../include/navbar.php';
?>

<?php
  if($_SERVER['REQUEST_METHOD']=='POST' and isset($_POST['login'])){

   $login->setInput($_POST['email'] ,$_POST['password']);
      $login->DisplayError();
}
?>

<?php if(isset($_SESSION['is_logged']) AND $_SESSION['is_logged'] == TRUE   ){ ?>
  
<script type='text/javascript'>function Redirect() { window.location='<?php echo $site ?>/admin'; } setTimeout('Redirect()', 3000);</script>
<?php }else{?>

<!--form login users -->
   <form method="post" class="col-md-5">
  <div class="form-group">
    <label for="exampleInputEmail1" class="float-right">ضع هنا رقمك أو ايميلك </label>
    <input type="text" class="form-control input" name="email" placeholder="ضع هنا رقمك أو ايميلك ">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="float-right">ضع هنا كلمات السر الخاصة بك</label>
    <input type="password" class="form-control input" name="password" placeholder="ضع هنا كلمات السر الخاصة بك">
  </div>
 
  <button type="submit"  class="btn btn-outline-primary btn-lg" name="login"><i class="fal fa-sign-in-alt"> </i> تسجيل الدخول</button>
</form>

   
   <!-- fin form login users last sign-up -->
 

<?php } ?>
 
 
  <?php
require_once  __DIR__.'/../include/footer.php';

?>


