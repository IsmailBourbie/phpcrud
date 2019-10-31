<?php
namespace App\Models;

interface Crud {

public static function create($data);

public static function read($id = NUll);

public static function update($id);

public static function delete($id);

}