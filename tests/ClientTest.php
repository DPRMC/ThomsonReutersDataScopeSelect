<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use DPRMC\ThomsonReutersDataScopeSelect\TRDSSClient;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase {



    public function testClientConstructorShouldCreateInstance(){
        $client = new TRDSSClient($userName, $password);
    }

}