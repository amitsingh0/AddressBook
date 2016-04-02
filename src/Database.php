<?php
/**
 * Class to intract with Database
 * 
 * @author amit.php@gmail.com
 * 
 */

namespace AddressBook;

class Database
{
    /*
     * property to hold the class instance
     */
    private static $instance = null;
    
    /*
     * Property to hold PDO instance
     */
    private $pdo = null;
    
    /**
     * Class private constructor to stop creation of Database instance from outside.
     */
    private function __construct($dsn, $user, $password, array $options = array())
    {
        try {
             $this->pdo = new \PDO($dsn, $user, $password, $options);
        } catch (\PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }
    
    /**
     * Method to get instance for the Database class
     * 
     * @return \AddressBook\Database
     */
    public static function getInstance($dsn='mysql:host=localhost;dbname=addressbook', 
        $user='root', $password=null, array $options = array())
    {
        if (self::$instance === null) {
            self::$instance = new self($dsn, $user, $password, $options);
        }
        
        return self::$instance;
    }
    
    /**
     * Bind multiple parameters together
     * 
     * @param \PDOStatement $statement
     * @param array $params
     * @return PDOStatement
     */
    public function bindParams(\PDOStatement $statement, array $params)
    {
        foreach ($params as $param => $value) {
            $statement->bindValue(':'.$param, $value);
        }
        
        return $statement;
    }
    
    /**
     * Magic method to process all method calls for PDO object
     * 
     * @param string $method
     * @param mixed $args
     * @throws \BadMethodCallException
     * @return mixed
     */
    public function __call($method, $args)
    {
        if (is_callable(array($this->pdo, $method))) {
            return call_user_func_array(array($this->pdo, $method), $args);
        } else {
            throw new \BadMethodCallException('Undefined method Database::' . $method);
        }
    }
    
    /**
     * Preventing from clone creation
     * 
     * @throws \Exception
     */
    public function __clone()
    {
        throw new \Exception("Clone is not allowed for the Database class");
    }
}