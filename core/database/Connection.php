<?php
/**
 * Database manager
 */

class Connection
{
    //private static $instance = null;
    private $pdo;

    protected $host;
    protected $name;
    protected $user;
    protected $pass;
    protected $charset;

    protected $dsn = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false
        ];

        $this->host = $_ENV['DB_HOST'];
        $this->name = $_ENV['DB_NAME'];
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASSWORD'];
        $this->charset = $_ENV['DB_CHARSET'];

        $this->dsn = "mysql:host=$this->host;dbname=$this->name;charset=$this->charset";
        $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $options);
    }

    /**
     * Run a MySQL query using PDO
     * TODO: This should accept a QueryBuilder object
     *
     * @param string $query The sql query to run
     * @param array $args Argements to resolve in the query
     *
     * @return array $data result from query
     */
    public function run($query, $args = [])
    {
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($args);
            $data = $stmt->fetchAll();
        } catch (PDOException $e) {
            throw new PDOException($e->getMessage(), (int)$e->getCode());
        }

        return $data;
    }
}