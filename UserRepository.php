<?php

/**
 * Created by PhpStorm.
 * User: harryp
 * Date: 01/06/2016
 * Time: 10:26
 */

/**
 * A class responsible for retrieving, updating, etc. users in the database
 */
class UserRepository
{
    /**
     * @var DbHandler
     */
    private $db;

    /**
     * UserRepository constructor. Simply sets the database handler to use
     * @param DbHandler $db
     */
    public function __construct(DbHandler $db){
        $this->db = $db;
    }

    /**
     * Get a user by its username. If the user does not exist, an exception is thrown. Otherwise a new User object
     * is returned.
     * @param $username string
     * @return User
     * @throws Exception
     */
    public function getUser($username){
        $results = $this->db->query("select * from users_table where name='".$username."'");
        if(count($results) == 0){
            throw new Exception("Username $username does not exist.");
        }else{
            return new User($results[0]['id'], $results[0]['name'], $results[0]['address']);
        }
    }
}