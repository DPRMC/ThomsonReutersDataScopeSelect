<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests;

use PHPUnit\Framework\TestCase;

abstract class AbstractBase extends TestCase {

    const DEBUG = TRUE;

    protected $userName;
    protected $password;

    protected function setUp(): void {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->userName = getenv( 'TR_USER' );
        $this->password = getenv( 'TR_PASS' );

    }

}