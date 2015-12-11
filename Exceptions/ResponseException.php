<?php

namespace CSTruter\Misc\Exceptions;

/**
 * Exception that must be thrown when something goes wrong with the web response
 *
 * @package CSTruter\Misc\Exceptions
 * @author Christoff Truter <christoff@cstruter.com>
 * @copyright 2005-2015 CS Truter
 * @version 0.0.1
*/
class ResponseException extends \Exception
{
    public function __construct($message, $code = 500, \Exception $previous = null) {
        parent::__construct($message, $code, $previous);
    }
}

?>