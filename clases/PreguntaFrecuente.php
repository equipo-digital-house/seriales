<?php
class PreguntaFrecuente{
  private $name;
  private $answer;


public function __construct($name, $answer){
$this->name = $name;
$this->answer = $answer;
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
