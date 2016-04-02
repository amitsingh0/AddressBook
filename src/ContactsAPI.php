<?php
/**
 * Class to serve api calls to manange address book
 * 
 * @author amit.php@gmail.com
 * 
 */

namespace AddressBook;

class ContactsAPI extends API
{
    private $model = null;
    
    /**
     * Constructor: __construct
     */
    public function __construct($request, $origin)
    {
        parent::__construct($request);
        $this->model = new Contacts();
    }
    
    /**
     * Persist contacts
     * 
     * @throws \Exception
     */
    public function persist()
    {
        if ($this->method == 'POST') {
            $contacts = json_decode($this->request['data']);
            if (count($contacts) > 0) {
                foreach ($contacts as $contact) {
                    $this->model->add((array)$contact);
                }
            }
        } else {
            throw new \Exception("Invalid request");
        }
    }
    
}