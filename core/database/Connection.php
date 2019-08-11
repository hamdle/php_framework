<?php
/**
 * Database manager
 */

class Connection
{
    //private static $instance = null;
    private $pdo;

    protected $host = '127.0.0.1';
    protected $name = 'project1';
    protected $user = 'root';
    protected $pass = 'root';
    protected $charset = 'utf8mb4';

    protected $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false
    ];

    protected $dsn = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->dsn = "mysql:host=$this->host;dbname=$this->name;charset=$this->charset";
        $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $this->options);
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