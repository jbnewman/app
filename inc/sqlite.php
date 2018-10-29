<?php

class sqlite
{
    public $conn;
    private $path = '/var/sqlite/';

    public function __construct($db=':memory:')
    {
        if ($db != ':memory:') {
            $db = $this->path.$db.'sqlite3';
        }
        $this->conn = new SQLite3($db);
    }

    public function query($query, $bind=array())
    {
        $statement = $this->conn->prepare($query);
        foreach ($bind as $k => $v) {
            $statement->bindValue($k, $v);
        }
        return $statement->execute();
    }

    public function get($query, $bind=array())
    {
        $result = $this->query($query, $bind);

        $data = array();
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }
}
