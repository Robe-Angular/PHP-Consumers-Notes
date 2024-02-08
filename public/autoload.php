<?php
function app_autoloader($class){
    $class_rep = str_replace('\\','/',$class);
    require_once 'controllers/'.$class_rep.'.php';
}
#This function call the 'autoloader' every time a class have not been loaded
spl_autoload_register('app_autoloader');
