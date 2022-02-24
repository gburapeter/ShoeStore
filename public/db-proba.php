<?php


class DB
{
    public PDO $conn;
    private static DB $instance;

    private function __construct()
    {
        require_once "../app/db_credentials.php";
        $this->conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function getInstance()
    {

        if (!isset(self::$instance)) {
            self::$instance = new DB();
        }

        return self::$instance;
    }
}

class Person
{


    private $id;
    private $name;

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    private $age;

    /**
     * Person constructor.
     * @param $id
     * @param $name
     * @param $age
     */
    public function __construct($id = null)
    {
        $db = DB::getInstance();
        $statement = $db->conn->prepare("SELECT * FROM proba WHERE id = :id");
        $statement->bindValue(":id", $id);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            foreach ($row as $name => $value) {
                $this->{$name} = $value;
            }
        }
    }

    public function save()
    {
        $db = DB::getInstance();
        $statement = $db->conn->prepare("INSERT INTO proba (id, name, age) VALUES (:id, :name, :age)
                                            ON DUPLICATE  KEY UPDATE name=:name, age=:age");
        $statement->bindValue(":id", $this->id);
        $statement->bindValue(":name", $this->name);
        $statement->bindValue(":age", $this->age);

        $statement->execute();
    }


    public function __toString(): string
    {
        return "#$this->id $this->name ($this->age)";
    }


}


$e = new Person();
$e->setName("Peti");
$e->setAge(23);

$e->save();
print("Az ember neve az hogy {$e->getName()}");