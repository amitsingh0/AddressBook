<?php
/**
 * Class to serve api calls to manange address book
 * 
 * @author amit.php@gmail.com
 * 
 */

namespace AddressBook;

class Contacts
{
   /**
    * Database instance
    * 
    * @var Database
    */
    protected $db = null;
    
    /*
     * Table name for the model
     */
    protected $tableName = 'contacts';
    
    /**
     * Constructor: __construct
     */
    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    
    /**
     * Add a contact to database
     */
    public function add($contact)
    {
        $query = 'INSERT INTO `'.$this->tableName.'` SET name=:name, email=:email, phone=:phone, company=:company, city=:city';
        $statement = $this->db->prepare($query);
        unset($contact['id']);
        $statement = $this->db->bindParams($statement, $contact);
        return $statement->execute();
    }
    
    /**
     * update a contact to database
     */
    public function update($contact)
    {
        $query = 'UPDATE `'.$this->tableName.'` SET name=:name, email=:email, phone=:phone, company=:company, city=:city WHERE id=:id LIMIT 1';
        $statement = $this->db->prepare($query);
        $id = $contact['id'];
        unset($contact['id']);
        $statement = $this->db->bindParams($statement, $contact);
        $statement->bindValue(':id', $id, \PDO::PARAM_INT);
        return $statement->execute();
    }
    
    /**
     * delete a contact from database
     */
    public function delete($contact)
    {
        $query = 'DELETE FROM `'.$this->tableName.'` WHERE id=:id LIMIT 1';
        $statement = $this->db->prepare($query);
        $statement->bindValue(':id', $contact[id], \PDO::PARAM_INT);
        return $statement->execute();
    }
    
    /**
     * listing of all contacts from database
     */
    public function listContacts($search=null)
    {
        $query = 'SELECT * FROM `'.$this->tableName.'`';
        $statement = $this->db->prepare($query);
        return $statement->execute();
    }
    
}