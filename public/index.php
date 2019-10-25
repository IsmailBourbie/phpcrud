<?php

use Core\Request;
use Core\Router;

/**
 *  require the autoloader
 */
require '../vendor/autoload.php';


/**
 * Errors and Exceptions handling
 */
error_reporting(E_ALL); // report all errors
set_error_handler('Core\Error::errorHandler'); // set a user-defined errors handler function
set_exception_handler('Core\Error::exceptionHandler'); // set a user-defined exceptions handler function


/**
 * Load routes file and dispatch the url
 */
Router::load('routes.php')->dispatch(Request::url(), Request::method());
