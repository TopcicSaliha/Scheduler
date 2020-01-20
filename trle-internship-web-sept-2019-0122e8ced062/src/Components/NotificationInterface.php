<?php
/**
 * Author: igor.golub@wetek.com
 * Date: 12/9/2019
 */

namespace App\Components;


interface NotificationInterface
{
    /**
     * Function that using guzzle sends notification to configured firebase url
     * @param string $to Firebase hash to identify user
     * @param array $message
     * @return boolean
     */
    public function send(string $to, array $message) : bool;

    /**
     * Function that returns error message if exists
     * @return string
     */
    public function getErrorMessage() : string;
}
