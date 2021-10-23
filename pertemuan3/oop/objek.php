<?php

#membuat class
class Person {
    #properti

    public $nama;
    public $umur;
    public $email;
    
}

#membuat objek
$etka = new person();
$etka->nama = 'etka';
$etka->umur = 20;
echo $etka->nama;
echo $etka->umur;

echo "<br>";
$udin = new person();
$udin->nama = 'udin';
$udin->email = 'udinuyeh@maling.com';
echo $udin->nama;
