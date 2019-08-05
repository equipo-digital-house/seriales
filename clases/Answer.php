<?php
class Answer{
    private $name;
    private $correctAnswer;
    private $question_id;
    private $image;


    public function __construct($name,$correctAnswer,$question_id,$image=null){
        $this->name = $name;
        $this->correctAnswer = $correctAnswer;
        $this->question_id= $question_id;
        $this->image= $image;
    }
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name = $name;
    }

    public function getCorrectAnswer(){
        return $this->correctAnswer;
    }
    public function setCorrectAnswer($correctAnswer){
        $this->$correctAnswer = $correctAnswer;
    }

    public function getQuestion_id(){
        return $this->question_id;
    }
    public function setQuestion_id($question_id){
        $this->question_id = $question_id;
    }
    public function getImage(){
       return $this->image;
    }
    public function setImage($image){
        $this->image = $image;
    }

}
