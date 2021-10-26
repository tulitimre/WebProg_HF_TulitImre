<?php
spl_autoload_register(function ($className) {
    $parts = explode('\\', $className);
    $file = end($parts) . '.php';
    if (file_exists($file)) {
        include($file);
    } else {
        echo "$file is not found!";
    }
});

