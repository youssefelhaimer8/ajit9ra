<?php


 if($_SERVER['REQUEST_METHOD'] =='POST' and isset($_POST['id_like'])){
	require_once __DIR__.'/../app/ini.php';
	 
  
 
 $school->addlike($_POST['id_like'],$ip);
   
  
    
   
   }

else  if($_SERVER['REQUEST_METHOD'] =='POST' and isset($_POST['id_nolike'])){
	require_once __DIR__.'/../app/ini.php';
	 

  
 $school->addnolike($_POST['id_nolike'],$ip);
    
   
   }

else  if($_SERVER['REQUEST_METHOD'] =='POST' and isset($_POST['name'])){
	require_once __DIR__.'/../app/ini.php';
	 

  
 $school->addcmc($_POST['name'],$_POST['text'],$_POST['link'],$ip);
    
   
   }

else  if($_SERVER['REQUEST_METHOD'] =='POST' and isset($_POST['link'])){
	require_once __DIR__.'/../app/ini.php';
	 

  
 $school->checkLink($_POST['link']);
    
   
   }

