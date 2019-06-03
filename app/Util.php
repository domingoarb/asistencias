<?php
namespace App;
use DateTime;
class Util {
    public static function validarFecha($dateStr){
        $formato = 'Y-m-d H:m';
        $date = \DateTime::createFromFormat($formato, $dateStr);
        return $date && ($date->format($formato) === $dateStr);
  }
}