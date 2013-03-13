<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aicha
 * Date: 13/03/13
 * Time: 09:19
 * To change this template use File | Settings | File Templates.
 */
class Node
{
    private $_name;
    private $_attributes=array();
    private $_value;
    private $_children=array();
    private $_parent;

    public function name(){
        return $this->_name;
    }

    public function attributes(){
        return $this->_attributes;

    }

    public function value(){
        return $this->_value;
    }

    public function children(){
        return $this->_children;

    }

    public function parent(){
        return $this->_parent;
    }

    public function setName($name){
        if(is_string($name)){
            $this->_name=$name;
        }
    }

    public function setValue($value){
        if(is_string($value)){
            $this->_value=$value;
        }

    }

    public function addAttribute($attribute,$value){

        array_push($this->_attributes,$attribute,$value);

    }

    public function addChild(Node $child){

        array_push($this->_children,$child);
    }


}
