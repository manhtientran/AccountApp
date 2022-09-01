<?php 
namespace app\core;

use app\models\User;

abstract class DbModel extends Model {
    abstract public function tableName(): string;

    abstract public function attributes(): array;   // return all attributes of the Table

    abstract public function primaryKey(): string;

    public function save() {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(', ', $attributes) . ") VALUES (" . implode(', ', $params) . ")");
        foreach($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }
        
        // echo "<pre>";
        // var_dump($params, $attributes, $statement);
        // echo "</pre>";


        $statement->execute();
        return true;
    }

    public static function prepare($sql) {
        return Application::$app->db->pdo->prepare($sql);
    }

    public function findOne($where) {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }

        $statement->execute();
        return $statement->fetchObject(static::class);

    }

    public function updateOne($where) {

    }
}

?>