<?php
class app
{
    public $view;
    public $output;
    public $parts;
    public $template;
    public $JS;

    public function __construct($route)
    {
        $parts = explode('/', $route);
        $len = sizeof($parts);
        array_walk($parts, 'app::clean'); #clean the parts
        $this->parts = $parts;
        for ($i=$len;$i>0;$i--) {
            $file = 'app/'.implode('/', $parts).'.php';
            if (is_file($file)) {
                break;
            } else {
                array_pop($parts);
            }
        }
        if (is_file($file)) {
            $this->view = $file;
        } else {
            $this->send_404();
        }
    }

    //only alpha numeric
    public static function clean($string)
    {
        return preg_replace("/[^A-Za-z0-9\-]/", '', $string);
    }

    //trigger a 404
    public function send_404()
    {
        header("HTTP/1.0 404 Not Found");
        header('Location: /404.php');
        die();
    }
}
