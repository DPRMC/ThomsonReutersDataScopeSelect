<?php

namespace DPRMC\ThomsonReutersDataScopeSelect;

class TRDSSClient {

    protected $userName;
    protected $password;

    public function __construct( string $userName, string $password ) {
        $this->userName = $userName;
        $this->password = $password;
    }


}