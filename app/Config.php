<?php

namespace App;

use PDO;

class Config {


    public static function DATABASE($key)
       {
          switch ($key) {
             case 'HOST' :
                return 'localhost';
             case 'NAME' :
                return 'phpcrud';
             case 'USER' :
                return 'root';
             case 'PASS' :
                return '';
             case 'OPTIONS':
                return [
                   PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ];
             default :
                return '';
          }
       }
}