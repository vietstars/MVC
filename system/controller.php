<?php
class controller extends model
{

	function __construct()
	{      
        parent::__construct();
        $this->view = new view();
    }

    // public function lang( $transFile,$error=false )
    // { 
    //     if( isset($_COOKIE['lg']) )
    //         $language = $_COOKIE['lg'];
    //     else
    //         $language = 'en';
    //     include LANG.$language.S.$transFile._EXT; 
    //     if( !$error )
    //         $this->session();
    //     return $lang;       
    // }

    // public function getLang( $name=false )
    // {
    //     if( isset($_COOKIE['lg']) )
    //         $language = $_COOKIE['lg'];
    //     else
    //         $language = 'en';
    //     $lg = $this->lang('system');        
    //     if( file_exists(LANG.$language.S.$name._EXT) )
    //         $lg = array_merge($lg,$this->lang($name));
    //     $this->lg = $this->view->lg = (object) $lg;
    //     return $this;
    // } 

    protected function cookie( $key=false,$val=false ){
        if( $val&&$val!='del' )
            setcookie($key,$val,_NOW+7200, S,$_SERVER['SERVER_NAME'], false);
        else{
            if( $val=='del' )
                setcookie($key,'',_NOW-3600, S,$_SERVER['SERVER_NAME'], false);
            else 
                return $_COOKIE[$key];
        }
    }

    protected function norand( $min = 0,$max = 0 )
    {
        mt_srand(crc32(microtime()));
        if ( $max AND $max <= mt_getrandmax() )
        {
            $number = mt_rand($min, $max);
        }else{
            $number = mt_rand();
        }
        mt_srand();
        return $number;
    }

    protected function user_salt( $length = 30 )
    {
        $salt = '';
        for ( $i = 0; $i < $length; $i++ )
        {
            $salt .= chr(self::norand(33, 126));
        }
        return $salt;
    }
}