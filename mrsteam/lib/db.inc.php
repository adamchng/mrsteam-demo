<?php

// MySQL function libraries
if (!function_exists('dbconnect')) {
    function dbconnect() {
        $link = mysql_connect("localhost","root","") or die ("Could not connect");
        mysql_select_db("vspa") or die ('The database specified in database_name must exist');
        return $link;
    }
}

?>
