<?php
namespace App\Models;

use Core\Model;
use PDO;

class User extends Model {


    public static function add ($username) {
        $db = static::getDB();

        $sql = 'INSERT INTO users VALUES(null, :username);';
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);

        return $stmt->execute();

    }
}