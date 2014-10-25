<?php 
/**
 * SVGRenderer AutoLoad
 * @author R.Borgniet
 * @version 1.0
 */

function __autoload($class)
{
    $root = dirname(__FILE__);
    $file = $root.'/'.$class.'.class.php';
    if(file_exists($file))
        include($file);
}

?>