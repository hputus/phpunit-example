<?php
include_once '../DbHandler.php';
include_once '../User.php';
include_once '../UserRepository.php';

/**
 * Created by PhpStorm.
 * User: harryp
 * Date: 01/06/2016
 * Time: 10:47
 */
class UserRepositoryTest extends PHPUnit_Framework_TestCase
{
    public function testGetUserThrowsExceptionIfUserDoesNotExist()
    {
        //create a mock database connection - this means we can simulate different database conditions
        //without having to connect to a real database.
        $db = $this->getMock('DbHandler');

        //we make any database query return a blank array, as if no users exist in the database
        $db->expects($this->any())
           ->method('query')
           ->will($this->returnValue(array()));

        //pass the database connection into the repository
        $repo = new UserRepository($db);

        //because we told our mock database connection to return a blank array, the getUser method should throw an exception
        $this->setExpectedException('Exception','Username RandomUsername does not exist.');
        $repo->getUser('RandomUsername');
    }


    public function testGetUserReturnsInstanceOfUserIfUserExists(){
        //create a mock database connection - this means we can simulate different database conditions
        //without having to connect to a real database.
        $db = $this->getMock('DbHandler');

        //we make any database query return an array with one row
        $db->expects($this->any())
           ->method('query')
           ->will($this->returnValue(array(
               array('id' => 100, 'name' => 'RandomUserName', 'address' => '1 Fake Road, FakeTown')
           )));

        //create the repository
        $repo = new UserRepository($db);

        //attempt to retrieve the user...
        $user = $repo->getUser('RandomUsername');

        //let's check that it has actually returned an instance of user
        $this->assertInstanceOf('User',$user);
        
        //and now check that the correct name, address, and id have been set
        $this->assertEquals(100,$user->getId());
        $this->assertEquals('RandomUserName',$user->getName());
        $this->assertEquals('1 Fake Road, FakeTown',$user->getAddress());
    }
}
