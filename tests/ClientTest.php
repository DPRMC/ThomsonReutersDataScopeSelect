<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use DPRMC\ThomsonReutersDataScopeSelect\TRDSSClient;

class ClientTest extends AbstractBase {



    /**
     * @test
     */
    public function testClientConstructorShouldCreateInstance() {
        $client = TRDSSClient::instantiate( $this->userName, $this->password );
        $this->assertInstanceOf( TRDSSClient::class, $client );
    }

}