<?php

# PDO Wrapper, supporting MySQL and Sqlite
# Usage:
#   $db = new db();
#
#   // table, data
#   $db->create('users', array(
#     'fname' => 'john',
#     'lname' => 'doe'
#   ));
#   
#   // table, where, where-bind
#   $db->find('all', 'users', "fname LIKE :search", array(
#     ':search' => 'j%'
#   ));
#
#   // table, data, where, where-bind
#   $db->update('users', array(
#     'fname' => 'jame'
#   ), 'gender = :gender', array(
#     ':gender' => 'female'
#   ));
#   
#   // table, where, where-bind
#   $db->delete('users', 'lname = :lname', array(
#     ':lname' => 'doe'
#   ));

class db {

    private $config = array(
        # "dbdriver" => "sqlite",
        # "sqlitedb" => "path/to/db.sqlite"

        "dbdriver" => "mysql",
        #"dbhost" => "localhost",
        "dbhost" => "50.87.226.168",
        "dbuser" => "boostpr1_boostpr",
        "dbpass" => "Draper24@",
        "dbname" => "boostpr1_boostpromotions"
    );

    function db($db = null) {
        $dbhost = $this->config['dbhost'];
        $dbuser = $this->config['dbuser'];
        $dbpass = $this->config['dbpass'];
        $dbname = $db ? $db : $this->config['dbname'];

        # $sqlitedb = $this->config['sqlitedb'];

        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            switch ($this->config["dbdriver"]) {
                case "sqlite":
                    $conn = "sqlite:{$sqlitedb}";
                    break;
                case "mysql":
                    $conn = "mysql:host={$dbhost};dbname={$dbname}";
                    break;
                default:
                    echo "Unsuportted DB Driver! Check the configuration.";
                    exit(1);
            }

            $this->db = new PDO($conn, $dbuser, $dbpass, $options);
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

    function raw($sql, $bind = array()) {
        $sql = trim($sql);

        try {

            $result = $this->db->prepare($sql);
            $result->execute($bind);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit(1);
        }
    }

    function create($table, $data) {
        $fields = $this->filter($table, $data);

        $sql = "INSERT INTO " . $table . " (" . implode($fields, ", ") . ") VALUES (:" . implode($fields, ", :") . ");";

        $bind = array();
        foreach ($fields as $field):
            $bind[":$field"] = $data[$field];
        endforeach;

        $this->raw($sql, $bind);
        return $this->db->lastInsertId();
    }

    function createAll($table, $data) {
        $this->db->beginTransaction(); // also helps speed up your inserts.
        $fields = array_keys($data[0]);

        $bind = array();
        foreach ($data as $d) {
            $question_marks[] = '(' . $this->placeholders('?', sizeof($d)) . ')';
            $bind = array_merge($bind, array_values($d));
        }

        $sql = "INSERT INTO " . $table . " (" . implode(",", $fields) . ") VALUES " . implode(',', $question_marks);
        $result = $this->raw($sql, $bind);
        $this->db->commit();

        return $result->rowCount();
    }

    function find($type, $table, $where = "", $bind = array(), $fields = "*") {
        $sql = "SELECT " . $fields . " FROM " . $table;
        if (!empty($where)) {
            $sql .= " WHERE " . $where;
        }
        if ($type == 'first') {
            $sql .= " LIMIT 1";
        }
        $sql .= ";";

        $result = $this->raw($sql, $bind);
        $result->setFetchMode(PDO::FETCH_ASSOC);

        switch ($type) {
            case 'first':
                $rows = $result->fetch();
                break;
            case 'all':
                $rows = array();
                while ($row = $result->fetch()) {
                    $rows[] = $row;
                }
                break;
        }
        return $rows;
    }

    function update($table, $data, $where, $bind = array()) {
        $fields = $this->filter($table, $data);
        $fieldSize = sizeof($fields);

        $sql = "UPDATE " . $table . " SET ";
        for ($f = 0; $f < $fieldSize; ++$f) {
            if ($f > 0)
                $sql .= ", ";
            $sql .= $fields[$f] . " = :update_" . $fields[$f];
        }
        $sql .= " WHERE " . $where . ";";

        foreach ($fields as $field)
            $bind[":update_$field"] = $data[$field];

        $result = $this->raw($sql, $bind);
        return $result->rowCount();
    }

    function delete($table, $where, $bind = "") {
        $sql = "DELETE FROM " . $table . " WHERE " . $where . ";";
        $result = $this->raw($sql, $bind);
        return $result->rowCount();
    }

    private function filter($table, $data) {
        $driver = $this->config['dbdriver'];

        if ($driver == 'sqlite') {
            $sql = "PRAGMA table_info('" . $table . "');";
            $key = "name";
        } elseif ($driver == 'mysql') {
            $sql = "DESCRIBE " . $table . ";";
            $key = "Field";
        } else {
            $sql = "SELECT column_name FROM information_schema.columns WHERE table_name = '" . $table . "';";
            $key = "column_name";
        }

        if (false !== ($list = $this->raw($sql))) {
            $fields = array();
            foreach ($list as $record):
                $fields[] = $record[$key];
            endforeach;

            return array_values(array_intersect($fields, array_keys($data)));
        }

        return array();
    }

    private function placeholders($text, $count = 0, $separator = ",") {
        $result = array();
        if ($count > 0) {
            for ($x = 0; $x < $count; $x++) {
                $result[] = $text;
            }
        }

        return implode($separator, $result);
    }

}
