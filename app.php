<?php

/**
 * Bootstrap file for the AddressBook application
 */
require_once __DIR__ . '/src/autoload.php';

try {
    $contactsAPI = new AddressBook\ContactsAPI($_REQUEST['request'], $_SERVER['HTTP_ORIGIN']);
    $result = $contactsAPI->processAPI();
    echo json_encode(array('data' => $result));
} catch (Exception $e) {
    echo json_encode(array('error' => $e->getMessage()));
}