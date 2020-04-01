<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\User;
use DPRMC\ThomsonReutersDataScopeSelect\TRDSSClient;

class UsersTest extends AbstractBase {

    /**
     * @test
     * @group Users
     */
    public function testUserShouldReturnArrayOfUserData() {
        $client = TRDSSClient::instantiate( $this->userName, $this->password, self::DEBUG );
        $users  = $client->User();
        $this->assertIsArray( $users );
        $this->assertInstanceOf( User::class, $users[ 0 ] );
    }

}