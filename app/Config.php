<?php

namespace App;

use PDO;

class Config
{

   public static function SHOW_ERROR() {
      return true;
   }

   public static function DATABASE($key) {
      switch ($key) {
         case 'HOST':
            return 'localhost';
         case 'NAME':
            return 'phpcrud';
         case 'USER':
            return 'root';
         case 'PASS':
            return '';
         case 'OPTIONS':
            return [
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];
         default:
            return '';
      }
   }

   public static function ROOT($key) {
      switch ($key) {
         case 'APP':
            return str_replace('\\', '/', __DIR__ . DIRECTORY_SEPARATOR);
         case 'URL':
            return 'http://' . $_SERVER['HTTP_HOST'] . str_replace(
                  $_SERVER["DOCUMENT_ROOT"], "", str_replace(
                  '\\', '/', dirname(__DIR__) . DIRECTORY_SEPARATOR));
         case 'DIR' :
            return str_replace('\\', '/', dirname(__DIR__) . DIRECTORY_SEPARATOR);
         default :
            return '';
      }
   }
}
