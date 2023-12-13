<?php
    session_start();
    session_destroy();
    header("location: ../C_login.php")
    ?>