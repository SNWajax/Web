<?php

    define ('db_user', 'root');
    define ('db_password','AlanTuring');
    define ('db_host','localhost:3306');
    define ('db_name','dbproj');

$dbc = mysqli_connect(db_host, db_user, db_password, db_name)
    or die ('Could not connect to MySQL ' . mysqli_connect_error());

?>