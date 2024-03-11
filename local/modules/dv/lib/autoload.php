<?php

spl_autoload_register(function ($class_name) {

    $class_name =  str_replace("\\", '/', $class_name);
    include ( $_SERVER[ "DOCUMENT_ROOT" ] . "/local/modules/dv/lib/" . $class_name . '.php' );

});