<?php

#membuat class
class Person {
    #properti

    public $nama;
    public $umur;
    public $email;

    # method constructor
  public function __construct($nama, $umur, $email){
    $this->nama = $nama;
    $this->umur = $umur;
    $this->email = $email;
  }
    
    #membuat method
    function setNama($data){
        $this->nama = $data;
    }

    function getNama(){
        return $this->nama;
    }

    function setUmur($data){
        $this->umur = $data;
    }

    function getUmur(){
        return $this->umur;
    }

    function setEmail($data){
        $this->email = $data;
    }

    function getEmail(){
        return $this->email;
    }
}

#membuat objek
$etka = new person("etka", 20, "etka@gmail");
echo $etka->getNama() . "<br>";
echo $etka->getUmur() . "<br>";
echo $etka->getEmail() . "<br>";