<?php

class school extends mysqlconn{
    protected $title,$lien,$vue;
    public function  addClass($name,$color){
       
        $this->name = $this->esc($this->html($name));
        $this->color= $this->esc($this->html($color));
       
        $this->time = time();
        $this->date = date("d.m.Y");
        $this->rand= rand(2000,9999999);
      
     
        if(empty($this->name)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }

      else if(empty($this->color)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }else{
          $this->insert("class","`nameclass`, `date`, `time`, `link`, `color`","'$this->name','$this->date','$this->time','$this->rand','$this->color'");
          if($this->execute()){
               messages::setmsg('خطأ !!',' تم الإضافة بنجاح  <span class="fal fa-check"></span>','success');
                     echo messages::getmsg();
          }else{
               messages::setmsg('خطأ !!',' لم يتم الإضافة  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
          }
      }

      
        
  }
    
     public function  addMat($name,$link){
       
        $this->name = $this->esc($this->html($name));
        $this->link= $this->esc($this->html($link));
       
        $this->time = time();
        $this->date = date("d.m.Y");
        $this->rand= rand(2000,9999999);
      
     
        if(empty($this->name)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }

      else if(empty($this->link)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }else{
          $this->insert("matier","`name`, `link`, `date`, `time`, `class`","'$this->name','$this->rand','$this->date','$this->time','$this->link'");
          if($this->execute()){
               messages::setmsg('!!',' تم الإضافة بنجاح  <span class="fal fa-check"></span>','success');
                     echo messages::getmsg();
          }else{
               messages::setmsg('خطأ !!',' لم يتم الإضافة  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
          }
      }

      
        
  }
    public function  checkLink($link){
      $this->link= $this->esc($this->html($link));
      
     $video_id = explode("?v=", $this->link); // For videos like http://www.youtube.com/watch?v=...
      if (empty($video_id[1]))
       $video_id = explode("/v/", $this->link); // For videos like http://www.youtube.com/watch/v/..

       @$video_id = explode("&", $video_id[1]); // Deleting any other params
       $video_id = $video_id[0];  
      $video_id= str_replace('/hqdefault.jpg','',$video_id);
          $this->query("*","doros","WHERE `link` = '$video_id'");
           if($this->execute() and $this->rowCount() > 0){
               echo "الرابط موجود بالفعل قبل حول أن تنشر رابط أخر";
           }else{
               
           }
    }
     public function  addcmc($name,$text,$link,$ip){
       
        $this->name = $this->esc($this->html($name));
        $this->text= $this->esc($this->html($text));
       
        $this->time = time();
        $this->date = date("d.m.Y");
        $this->rand= rand(2000,9999999);
      
     
        if(empty($this->name)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }

      else if(empty($this->text)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }else{
          $this->insert("comment","`name`, `text`, `date`, `time`, `ip`, `link`","'$this->name','$this->text','$this->date','$this->time','$ip','$link'");
          if($this->execute()){
               messages::setmsg('!!',' تم الإضافة بنجاح  <span class="fal fa-check"></span>','success');
                     echo messages::getmsg();
          }else{
               messages::setmsg('خطأ !!',' لم يتم الإضافة  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
          }
      }

      
        
  }
    
    
  public function  addDars($title,$link,$anne,$mats){
       
        $this->title = $this->esc($this->html($title));
        $this->anne = $this->esc($this->html($anne));
        $this->mats = $this->esc($this->html($mats));
        $this->link= $this->esc($this->html($link));
      
     $video_id = explode("?v=", $this->link); // For videos like http://www.youtube.com/watch?v=...
      if (empty($video_id[1]))
    $video_id = explode("/v/", $this->link); // For videos like http://www.youtube.com/watch/v/..

       $video_id = explode("&", $video_id[1]); // Deleting any other params
       $video_id = $video_id[0];  
      $video_id= str_replace('/hqdefault.jpg','',$video_id);
       
        $this->time = time();
        $this->date = date("d.m.Y");
        $this->rand= rand(2000,9999999);
      
     
        if(empty($this->title)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }
      elseif(!preg_match("/^https:\/\/(?:www\.)?(?:youtube.com)\/(?:watch\?(?=.*v=([\w\-]+))(?:\S+)?|([\w\-]+))$/", $this->link)){
            messages::setmsg('خطأ', "الرجاء ادخال رابط يوتيوب صحيح", 'danger');
            echo messages::getmsg();
        }
      else if(empty($video_id)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }

      else if(empty($this->link)){
           messages::setmsg('خطأ !!',' حقل الإسم فارغ  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
        }else{
           $this->query("*","doros","WHERE `link` = '$video_id'");
           if($this->execute() and $this->rowCount() > 0){
          
               messages::setmsg('خطأ !!',' is uploaded لم يتم الإضافة  <span class="fal fa-ban"></span>','warning');
                     echo messages::getmsg();
       
          
           }else{
                  $this->insert("doros","`title`, `link`, `linkclass`, `linkmat`, `date`, `time`","'$this->title','$video_id','$this->anne','$this->mats','$this->date','$this->time'");
          if($this->execute()){
               messages::setmsg('!!',' تم الإضافة بنجاح  <span class="fal fa-check"></span>','success');
                     echo messages::getmsg();
          }else{
               messages::setmsg('خطأ !!',' لم يتم الإضافة  <span class="fal fa-ban"></span>','danger');
                     echo messages::getmsg();
          }
                
           }
          
          
      }

      
        
  }
    
    

       public function viewpost($id){
        $id =$id;
         $this->query('link', 'matier', "WHERE `link` = '{$id}'");
         if($this->execute() and $this->rowCount() > 0){
             $id = $this->fetch();
         
             return $id['link'];
             
             
         }else{
            
            echo '<div style="padding:1%"><div class=" alert alert-danger text-center col-md-12" style=";">this groupe no disponible OR delete by admin</div></div>';
             die();
         }
     }
   
     public function articleClass($other = null){
        $this->query('*', 'class',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    }  
    public function articleMat($other = null){
        $this->query('*', 'matier',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    }
    public function articleDoros($other = null){
        $this->query('*', 'doros',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    }
      
     public function articleCom($other = null){
        $this->query('*', 'comment',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    }
       public function articleVote($other = null){
        $this->query('*', 'lastvote',$other);
        $this->execute();
        while ($row = $this->fetch()){
            $rows[] = $row;
        }
        if(empty($rows))
            return NULL;
        return $rows;
    }
      
    
    
  
    public function matierCount($other=null){
        $this->query('*', "matier" ,$other);
        if($this->execute() and $this->rowCount() > 0){
            return $this->rowCount();
        }else{
            return 0;
        }
    }
    public function darsCount($other=null){
        $this->query('*', "doros" ,$other);
        if($this->execute() and $this->rowCount() > 0){
            return $this->rowCount();
        }else{
            return 0;
        }
    }
 public function voteCount($other=null){
        $this->query('*', "lastvote" ,$other);
        if($this->execute() and $this->rowCount() > 0){
            return $this->rowCount();
        }else{
            return 0;
        }
    }
 public function comCount($other=null){
        $this->query('*', "comment" ,$other);
        if($this->execute() and $this->rowCount() > 0){
            return $this->rowCount();
        }else{
            return 0;
        }
    }

        public function addvuea($id){
       $this->query('vue', 'matier', "WHERE `link` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $view = $this->fetch();
            $newView = $view['vue']+1;
            $this->update('matier', "`vue` = '$newView'", 'link', $id);
            $this->execute();
        }
    }
       public function addlike($id,$ip){
             $this->date = date("m.d.y");
             $this->time =time();
        
        $this->query("*","lastvote","WHERE `post` = '{$id}' AND `ip` = '$ip'");
         if($this->execute() and $this->rowCount() > 0){
         echo  "error";
     
    }else{
       $this->query('yes', 'matier', "WHERE `link` = '{$id}'");
        if($this->execute() and $this->rowCount() > 0){
            $view = $this->fetch();
            $newView = $view['yes']+1;
            $this->update('matier', "`yes` = '$newView'", 'link', $id);
            $this->execute();
            echo  $newView;
           $this->insert('lastvote',"`ip`,`post`, `date`, `time`","'$ip','$id','$this->date','$this->time'");
             $this->execute();
        }
    }
    }
    public function addnolike($id,$ip){
        $this->date = date("m.d.y");
        $this->time =time();
        
        $this->query("*","lastvote","WHERE `post` = '{$id}' AND `ip` = '$ip'");
         if($this->execute() and $this->rowCount() > 0){
         echo  "error";
     
    }else{
                
       $this->query('no', 'matier', "WHERE `link` = '{$id}'");
             
             
        if($this->execute() and $this->rowCount() > 0){
            $view = $this->fetch();
            $newView = $view['no']+1;
            $this->update('matier', "`no` = '$newView'", 'link', $id);
            $this->execute();
            echo  $newView;
             $this->insert('lastvote',"`ip`,`post`, `date`, `time`","'$ip','$id','$this->date','$this->time'");
             $this->execute();
        }
          
         }
    }
    
    public function lastvote($type){
        $this->date = date("m.d.y");
        $this->time =time();
         
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
         $ip = $_SERVER['REMOTE_ADDR'];
        }
        $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$ip"));
$city = $geo["geoplugin_city"];
$region = $geo["geoplugin_regionName"];
$country = $geo["geoplugin_countryName"];

        
          
      
            $this->insert('lastvote',"`ip`,`post`, `date`, `time`,","'$ip','$id','$this->date','$this->time'");
             $this->execute();
            
        
    }
     public function time($time){
        $val = $time;
        $time =time();




$timeall = $time-$val;
 if ($timeall < 60){
       echo'few second';
 }else if ($timeall > 60 and $timeall <3600){
     $timed = $timeall/60;
     $timed = floor($timed);
     echo ''.$timed.' دقيقة';
    
 }else if($timeall > 3600 and $timeall <86400){
     $timed = $timeall/3600;
     $timed = floor($timed);
    echo ''.$timed.'ساعة';
 }

else if($timeall > 86400 and $timeall <604800){
     $timed = $timeall/86400;
     $timed = floor($timed);
    echo ''.$timed.' يوم';
 }


else if($timeall > 604800 and $timeall <18144000){
     $timed = $timeall/604800;
     $timed = floor($timed);
    echo ''.$timed.' اسبوع';
 }


else {
     echo'غير محدد';
 }


    }
    
}
