<?php

class messages{
    public static $messages;
    public static function setmsg($title,$msg,$type){
        self::$messages='<div style="margin-top:1%" class="alert alert-'.$type.' text-center" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  '.$title.' <a class="alert-link">'.$msg.'
</div></a>';
    }
    public static function getmsg(){
        return self::$messages;
    }
}