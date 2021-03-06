<?php
/**
 * Class InvalidPageException.php
 *
 * Class documentation
 *
 * @author: Jonty Sponsleee <jsponselee@student.scalda.nl>
 * @since: 09/09/2018
 * @version 0.1 09/09/2018 Initial class definition.
 */
declare(strict_types=1);

namespace RinB\Page;

class InvalidPageException extends \Exception
{
    public function __construct($slug, $code = 0, \Exception $previous = null)
    {
        $message = "No page with the slug `$slug` was found";
        parent::__construct($message, $code, $previous);
    }
}