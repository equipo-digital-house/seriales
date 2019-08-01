<?php
class Serie{
    private $nombre;
    private $avatar;

    public function __construct($nombre,$avatar=null){
        $this->nombre = $nombre;
        $this->avatar = $avatar;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function getAvatar(){
       return $this->avatar;
    }
    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

}
