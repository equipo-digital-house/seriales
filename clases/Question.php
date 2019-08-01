<?php
class Question{
    private $name;
    private $serie_id;
    private $level_id;
    private $image;


    public function __construct($name,$serie_id,$level_id,$image=null){
        $this->name = $name;
        $this->serie_id = $serie_id;
        $this->level_id= $level_id;
        $this->image= $image;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getSerie_id(){
        return $this->serie_id;
    }
    public function setSerie_id($serie_id){
        $this->serie_id = $serie_id;
    }

    public function getLevel_id(){
        return $this->level_id;
    }
    public function setLevel_id($level_id){
        $this->level_id = $level_id;
    }
    public function getImage(){
       return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

}
