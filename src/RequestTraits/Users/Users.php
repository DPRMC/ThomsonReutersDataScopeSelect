<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Users;


use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\User;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserClaim;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Users\UserPreference;

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


    /**
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Entity?ctx=Users&ent=UserClaim
     * @return array
     */
    public function UserClaim(): array {
        $userClaims           = [];
        $relativeUrl          = 'Users/UserClaims';
        $response             = $this->getRequest( $relativeUrl );
        $body                 = json_decode( $response->getBody()->getContents(), TRUE );
        $arrayOfUserClaimData = $body[ 'value' ];
        foreach ( $arrayOfUserClaimData as $userClaim ):
            $userClaims[] = new UserClaim( $userClaim );
        endforeach;

        return $userClaims;
    }

    public function UserPreferences( int $UserId ): UserPreference {
        $relativeUrl = 'Users/Users(' . $UserId . ')/Preferences';
        $response    = $this->getRequest( $relativeUrl );
        $body        = json_decode( $response->getBody()->getContents(), TRUE );
        return new UserPreference( $body );
    }


}