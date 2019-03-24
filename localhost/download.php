<?php
/**
 * Created by PhpStorm.
 * User: Дато
 * Date: 22.03.2019
 * Time: 10:50
 */
header("Content-Type: text/plain");

foreach ($_POST['day'] as $names)
{

    $attachment_location = "upload/$names";
    if (file_exists($attachment_location)) {

        header($_SERVER["SERVER_PROTOCOL"] . " 200 OK");
        header("Cache-Control: public"); // needed for internet explorer
        header("Content-Type: application/zip");
        header("Content-Transfer-Encoding: Binary");
        header("Content-Length:".filesize($attachment_location));
        header("Content-Disposition: attachment; filename=$names");
        readfile($attachment_location);
        die();
    } else {
        die("Error: File not found.");
    }
    
}
