<?php
namespace App\Models;

use Core\Model;
use PDO;

class User extends Model implements Crud {

    public static function create($data) {
        $db = static::getDB();

        $sql = 'INSERT INTO users VALUES(null, :username, :fname, :lname, :age)';

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $data['username'], PDO::PARAM_STR);
        $stmt->bindParam(':fname', $data['fname'], PDO::PARAM_STR);
        $stmt->bindParam(':lname', $data['lname'], PDO::PARAM_STR);
        $stmt->bindParam(':age', $data['age'], PDO::PARAM_INT);
        return $stmt->execute();

    }

    public static function read($id = NULL) {
        $db = static::getDB();

        $sql = 'SELECT * FROM users';
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $users;

    }

    public static function update($id) {

    }

    public static function delete($id) {

    }
}