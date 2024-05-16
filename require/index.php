<?php 

$route = null;

if(isset($_GET['route']) && !empty($_GET['route']) ) 
{
    
        $route = $_GET['route'];
        
}

require "layout.phtml";
?>