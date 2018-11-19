<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 09/11/18
 * Time: 20:32
 */

namespace App;


class stripe
{

    private $serial = null;

    public function __construct()
    {


    }


    public function set($key){

        return $this->serial = $key;

    }


    public function get(){

        if(is_null($this->serial)){

            $this->serial = rand(0,100)."sdsq".rand(20,100);

        }

        return $this->serial;

    }

}