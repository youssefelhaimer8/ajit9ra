<?php

class login extends mysqlconn{
    private $email , $password ;
    
    public function setInput($email , $password){
        $this->email = $this->esc($this->html($email));
        $this->password = $this->esc($this->html($password));
       
    }
    
    public function DisplayError(){
        if(empty($this->email)){
             messages::setmsg('<span class="fal fa-ban"></span>','حقل ايميل أو الرقم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }else if(empty ($this->password)){
            messages::setmsg(' <span class="fal fa-ban"></span>','حقل كلمة السر فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
            
        }else if(!$this->checkUser()){
            messages::setmsg(' <span class="fal fa-ban"></span>','لم يتم العتور على حسابك ربما نسيت معلومات التسجيل يمكنك التواصل  معنا لحل المشكلة  <span class="fal fa-ban"></span>','warning');
                     echo messages::getmsg();
        }
        else{
           if($this->checkUser()){
            $this->query('*', 'users', "WHERE `email` = '$this->email'  AND `password` = '$this->password'");
            $this->execute();
           // $user = $this->fetch();
            while( $row = $this->fetch()) {
                   $_SESSION['is_logged'] = true;
                   $_SESSION['id_users'] = $row['id_users'];
                   $_SESSION['email'] = $row['email'];
                   $_SESSION['nember'] = $row['nember'];
                   $_SESSION['password'] = $row['password'];
              
            messages::setmsg(' <span class="fal fa-check"></span>','  تم تسجيل دخولك بنجاح سيتم  توجهك بعد قليل
                 <span class="fal fa-check"></span>','success');
                     echo messages::getmsg();
           echo "<script type='text/javascript'>function Redirect() { window.location='../admin'; } setTimeout('Redirect()', 3000);</script>";
         exit();
            
                 }
        
             }else{
                messages::setmsg('خطأ !!','غير متوقع  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
             }
       
    
        }
       
    }
    
    private function checkUser(){
        $this->query('id_users', 'users', "WHERE `email` = '$this->email' AND `password` = '$this->password' ");
        $this->execute();
        if($this->rowCount() > 0){
            return TRUE;
        }  else {
            return FALSE;
            
        }
       
    }
    
  
    
}

