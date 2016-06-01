<?php

/**
 * Created by PhpStorm.
 * User: harryp
 * Date: 01/06/2016
 * Time: 10:33
 */

/**
 * A class that represents a user.
 */
class User
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $address;

    /**
     * User constructor. Set the id, name and address of the user
     * @param $id int
     * @param $name string
     * @param $address string
     */
    public function __construct($id, $name, $address)
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }
}