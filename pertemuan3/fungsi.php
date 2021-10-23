<?php

function luas_lingkaran($jari){
    $phi = 3.14;
    $hasil = $phi * $jari * $jari;
    return $hasil;
}

echo luas_lingkaran(5);
echo "<br>";
echo luas_lingkaran(10);