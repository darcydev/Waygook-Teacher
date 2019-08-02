<?php
class MyPDO
{

    protected static $instance;
    protected $pdo;

    protected function __construct()
    {
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_EMULATE_PREPARES   => FALSE,
        );
        $DB_HOST = 'localhost';
        $DB_NAME = 'waygook-teacher';
        $DB_USER = 'root';
        $DB_PASS = '';
        $DB_CHAR = 'utf8mb4';

        $dsn = 'mysql:host=' . $DB_HOST . ';dbname=' . $DB_NAME . ';charset=' . $DB_CHAR;

        try {
            // BUG: I suspect that this is making a new connection every time the page loads
            $this->pdo = new PDO($dsn, $DB_USER, $DB_PASS, $opt);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int) $e->getCode());
        }
    }

    // a classical static method to make it universally available
    public static function instance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    // a proxy to native PDO methods
    public function __call($method, $args)
    {
        return call_user_func_array(array($this->pdo, $method), $args);
    }

    // a helper function to run prepared statements smoothly
    public function run($sql, $args = [])
    {
        if (!$args) {
            return $this->query($sql);
        }
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($args);
        return $stmt;
    }
}
