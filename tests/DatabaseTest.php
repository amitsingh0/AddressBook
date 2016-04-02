<?php
/**
 * Class to test Database functionality
 * 
 * @author amit.php@gmail.com
 * 
 */

namespace AddressBook\Database;

class DatabaseTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers \AddressBook\Database::getInstance
     */
    public function testObjectCanBeConstructedFromGetInstance()
    {
        $db = AddressBook\Database::getInstance();
        $this->assertInstanceOf(Money::class, $db);
    }
    
    /**
     * @expectedException \Exception
     */
    public function testObjectCanNotBeCloned()
    {
        $db = AddressBook\Database::getInstance();
        $db2 = clone $db;
    }
}