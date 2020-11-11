<?php
spl_autoload_register(function($class){
    $array = explode("\\", $class);
    $classname = $array[count($array)-1];

    if (file_exists(APP_DIR . "/" . $classname . '.php')){
        require_once APP_DIR . "/" . $classname . '.php';
    }
    else if (file_exists(FRAMEWORK_DIR . "/" . $classname . '.php')){
        require_once FRAMEWORK_DIR . "/" . $classname . '.php';
    }
    else if (file_exists(TPL_DIR . "/" . $classname . '.php')){
        require_once TPL_DIR . "/" . $classname . '.php';
    }
    else if (file_exists(DATA_DIR . "/" . $classname . '.php')){
        require_once DATA_DIR . "/" . $classname . '.php';
    }
});
