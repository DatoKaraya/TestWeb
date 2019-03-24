<?php


foreach ($_POST['day'] as $names)
{
    unlink("upload/$names");

}
header("Location: index.php");
