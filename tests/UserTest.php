<?php
include_once '../User.php';

/**
 * Created by PhpStorm.
 * User: harryp
 * Date: 01/06/2016
 * Time: 10:41
 */
class UserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider userProvider
     * @param $id int
     * @param $name string
     * @param $address string
     */
    public function testConstructorSetsPropertiesCorrectly($id, $name, $address)
    {
        $user = new User($id, $name, $address);
        $this->assertEquals($id, $user->getId());
        $this->assertEquals($name, $user->getName());
        $this->assertEquals($address, $user->getAddress());
    }

    /**
     * Data provider for the above test
     * @return array
     */
    public function userProvider()
    {
        return array(
            array(1, 'harry', '100 Main Road, London')
        );
    }
}
