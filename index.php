<?php

$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_pass = '';
$mysql_db = 'a_database1';

class ServerException extends Exception {
    public function showSpecific() {
        return 'Error thown on line'.$this->getLine().' in '.$this->getFile();
    }
}

class DatabaseException extends Exception {
    public function showSpecific() {
        return 'Error thown on line'.$this->getLine().' in '.$this->getFile();
    }
}

try {
    if (!@mysql_connect($mysql_host, $mysql_user, $mysql_pass)) {
        throw new ServerException();
    } else if (!@mysql_select_db($mysql_db)) {
        throw new DatabaseException();
    } else {
        echo 'Connected';
    }
} catch (ServerException $exc) {
    echo $exc->showSpecific();
} catch (DatabaseException $exc) {
    echo $exc->showSpecific();
}

/* Output
Error thown on line24 in index.php
*/
?>
