<?php
session_start();
//date_default_timezone_set('America/Chicago');

function load_inc($name)
{
    if (is_file('inc/'.$name.'.php')) {
        include 'inc/'.$name.'.php';
    }
}
spl_autoload_register('load_inc');


if (!isset($_GET['request'])) {
    $_GET['request'] = 'home/page';
}

/**
 * APP router
 */

$APP = new app($_GET['request']);


/**
 * Load the App
 */
ob_start();
include $APP->view;
$APP->output = ob_get_contents();
ob_end_clean();

/**
 * Load the template if needed
 */
if (isset($APP->template)) {
    $templateFile = 'templates/'.$APP->template.'.php';
    if (is_file($templateFile)) {
        include $templateFile;
    } else {
        die('Invalid Template');
    }
} else {
    echo $APP->output;
}
