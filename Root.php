<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aicha
 * Date: 13/03/13
 * Time: 09:44
 * To change this template use File | Settings | File Templates.
 */
class Root
{
    private $_name;
    private $_version;
    private $_children;

    public function name(){
        return $this->_name;
    }

    public function version(){
        return $this->_version;
    }

    public function children(){
        return $this->_children;
    }

    public function setName($name){
        if(is_string($name)){
            $this->_name=$name;
        }
    }

    public function setVersion($version){
        if(is_string($version)){
            $this->_version=$version;
        }
    }

    public function addChild(Node $child){

        array_push($this_children,$child);
    }


}
