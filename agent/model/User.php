<?php
include_once 'Model.php';
class User extends Model
{
    public $email;
    public $username;
    public $password;

    public function __construct(array $data) {
        $this->email = (isset($data['email']) ? $data['email'] : "");
        $this->username = (isset($data['username']) ? $data['username'] : "");
        $this->password = (isset($data['password']) ? $data['password'] : "");
    }

    public function save(array $data) {
        $sql = "INSERT INTO users(username, email, password) VALUES(?,?,?)";
        $params = [$data['username'], $data['email'], $data['password']];
        $connection = $this->getDBConnection();
        $stmt = $connection->prepare($sql);
        if ($stmt->execute($params)) {
            return ['success' => true, 'row_id' => $connection->lastInsertId()];
        }
        return false;
    }

    public static function findBy($column, $value) {
        $sql = "select * from users where $column = ?";
        $params = [$value];
        $connection = self::getConnectionInstance();
        $statement = $connection->prepare($sql);
        if ($statement->execute($params)) {
            return ['success' => true, 'results' => $statement->fetch(PDO::FETCH_ASSOC)];
        } else {
            return ['success' => false];
        }
    }

    public static function find($id) {
        return self::findBy('id', $id);
    }
}