<?php

/*
 * @package     RubricatePHP
 * @author      Estefanio NS <estefanions AT gmail DOT com>
 * @link        http://rubricate.github.io
 * @copyright   2016
 * 
 */

namespace Rubricate\Session;



class StorageSession
{




    public function start()
    {
        if(!self::hasStart())
        {
            session_start();
        }

        return $this;
    }  








    public function cacheExpire($num)
    {
        if(is_numeric($num))
        {
            session_cache_expire($num);
        }

        return $this;
    } 
    






    public function delAll() 
    {
        session_unset();
        session_destroy();

        return $this;
    }






    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
        return $this;
    }









    public function get($key, $default = '') 
    {
        return (!self::has($key))? $default : $_SESSION[$key];
    }









    public function del($key) 
    {

        if ($this->has($key)) 
        {
            unset($_SESSION[$key]);
            return TRUE;
        }

        return FALSE;
    }




    public function getId() 
    {
        return session_id();
    }







    public function getAll()
    {
        return $_SESSION;
    }





    public function has($key) 
    {
        return array_key_exists($key, self::getAll() );
    }






    public function hasInArr($key, $valueValidArr) 
    {
        return ( in_array(self::get($key), $valueValidArr) );
    }






    private function hasStart()
    {
        return (self::getId() !== '');
    } 
    


}
