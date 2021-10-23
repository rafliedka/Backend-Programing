<?php

#membuat class
class Person {
    #properti

    public $nama;
    public $umur;
    public $email;
    
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
$etka = new person();
$etka->setNama("etka");
$etka->setUmur(20);
$etka->setEmail("etka@gmail");
echo $etka->getNama();
echo "<br>";
echo $etka->getUmur();
echo "<br>";
echo $etka->getEmail();
