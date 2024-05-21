<?php

$config = require(__DIR__ . '/../config.php');

class Database {
    public $connection;

    public function __construct($config) {
        $this->connection = mysqli_connect($config['host'], $config['username'], $config['password'], $config['database']);

        if ($this->connection) {
            echo "";
        } else {
            echo "Connection failed: " . mysqli_connect_error();
        }
    }

    public function DB() {
        return $this->connection;
    }
}

$call = new Database($config);
$callconn = $call->DB();
?>
