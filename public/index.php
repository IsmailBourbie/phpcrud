<?php

use Core\Request;
use Core\Router;

// require the autoload
require '../vendor/autoload.php';


/**
 * Errors and Exceptions handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');

Router::load('routes.php')->dispatch(Request::url(), Request::method());
