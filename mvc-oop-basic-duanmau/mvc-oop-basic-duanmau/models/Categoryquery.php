<?php
class Category {
    public $id;
    public $name;
    public $date;

    public static function all() {
        $sql = "SELECT * FROM category";
        $stmt = connectDB()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>