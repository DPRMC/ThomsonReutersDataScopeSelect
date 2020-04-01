<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Users;


use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\User;
use Illuminate\Support\Collection;

trait Users {

    use Client;
    use Authenticate;

    /**
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Entity?ctx=Users&ent=User
     */
    public function User(): array {
        $users           = [];
        $relativeUrl     = 'Users/Users';
        $response        = $this->getRequest( $relativeUrl );
        $body            = json_decode( $response->getBody()->getContents(), TRUE );
        $arrayOfUserData = $body[ 'value' ];
        foreach ( $arrayOfUserData as $user ):
            $users[] = new User( $user );
        endforeach;

        return $users;
    }


}