<?php
class PreguntaFrecuente{
  private $id;
  private $name;
  private $answer;


public function __construct($name, $answer, $id = null){
$this->id = $id;
$this->name = $name;
$this->answer = $answer;
}

public function getId(){
  return $this->id;
}

public function setId($nuevoId){
  $this->id = $nuevoId;
}


public function getName(){
  return $this->name;
}

public function setName($name){
  $this->name = $name;
}

public function getAnswer(){
  return $this->answer;
}

public function setAnswer($answer){
  $this->answer = $answer;
}
}
 ?>
