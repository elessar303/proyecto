<?php

session_start();
session_destroy();
 echo "<script type='text/javascript'>"
        . "alert('Se ha Cerrado la Sesion');"
              . "document.location.href='index.php';"
            ."</script>";
?>