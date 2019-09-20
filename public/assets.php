<?php
/**
 * Created by PhpStorm.
 * User: trada
 * Date: 8/14/2017
 * Time: 4:24 AM
 */
require 'vendor/autoload.php';
// Echo out the response
echo \Munee\Dispatcher::run(new \Munee\Request([
    'image' => [
        'checkReferrer' => false,
        'numberOfAllowedFilters' => 30,
        'placeholders' => [
            '*' => WEBROOT . DS . 'uploads' . DS . 'images' . DS . 'default.png'
        ]
    ]]));