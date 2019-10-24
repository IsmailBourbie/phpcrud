<?php
namespace Core;

use App\Config;
use ErrorException;
use Core\View;

class Error {


    // convert errors into excpetions
    public static function errorHandler($level, $message, $file, $line) {
       if(error_reporting() !== 0)  { // to keep @ keyword workig
            throw new ErrorException($message, 0, $level, $file, $line);
       }
    }

    // Handle exceptions
    public static function exceptionHandler($exception)
   {
      $code = $exception->getCode();
      if ($code != 404) {
         $code = 500;
      }
      http_response_code($code);
      if (Config::SHOW_ERROR()) {
         echo "<h1>Fatal error</h1>";
         echo "<p>Uncaught exception: '" . get_class($exception) . "'</p>";
         echo "<p>Message: '" . $exception->getMessage() . "'</p>";
         echo "<p>Stack trace:<pre>" . $exception->getTraceAsString() . "</pre></p>";
         echo "<p>Throw in '" . $exception->getFile() . "' on line " . $exception->getLine() . "</p>";
      } else {
         $log = Config::ROOT('DIR') . '/logs/' . date('Y-m-d') . '.txt';
         ini_set('error_log', $log);
         $message = "\nUncaught exception: '" . get_class($exception) . "'";
         $message .= "Message: '" . $exception->getMessage() . "'";
         $message .= "\nStack trace:" . $exception->getTraceAsString();
         $message .= "\nThrow in '" . $exception->getFile() . "' on line " . $exception->getLine();
         $message .= "\n----------------------------------------------------------";
         error_log($message);
            View::render($code . '.php');
      }
   }
}