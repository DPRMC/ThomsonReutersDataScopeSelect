<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\User;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserClaim;
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


    /**
     * @test
     * @group Users
     */
    public function testUserClaimShouldReturnArrayOfUserClaimData() {
        $client     = TRDSSClient::instantiate( $this->userName, $this->password, self::DEBUG );
        $userClaims = $client->UserClaim();
        $this->assertIsArray( $userClaims );
        $this->assertInstanceOf( UserClaim::class, $userClaims[ 0 ] );
    }

}