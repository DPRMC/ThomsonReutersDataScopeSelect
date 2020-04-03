<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\InstrumentList\InstrumentList;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use GuzzleHttp\Exception\ClientException;

trait InstrumentList {

    use Client;
    use Authenticate;


    /**
     * Pass in a name for your InstrumentList and one will be created in your account.
     *
     * You can view your InstrumentLists at the link below:
     * @link https://hosted.datascope.reuters.com/datascope/extractions/instrumentlists
     *
     * The docs for this REST API call can be found at the link below:
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=Create
     *
     * @param string $name A user supplied name for this Instrument List Ex: FUND_20200331
     * @return \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList
     * @throws ClientException
     */
    public function Create( string $name ): \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList {
        $relativeUrl = 'Extractions/InstrumentLists';

        $options = [
            'headers' => [
                'Content-Type' => 'application/json; odata=minimalmetadata',
            ],
            'json'    => [
                '@odata.type' => '#ThomsonReuters.Dss.Api.Extractions.SubjectLists.InstrumentList',
                'Name'        => $name,
            ],
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $result   = json_decode( $response->getBody()->getContents(), TRUE );
        return new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $result );
    }


    /**
     * This method will return an array of all your InstrumentLists.
     *
     * You can view your InstrumentLists at the link below:
     * @link https://hosted.datascope.reuters.com/datascope/extractions/instrumentlists
     *
     * The docs for this REST API call can be found at the link below:
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=GetAll
     *
     * @return array An array of InstrumentList objects indexed by their list ids.
     */
    public function GetAll(): array {
        $relativeUrl     = 'Extractions/InstrumentLists';
        $response        = $this->getRequest( $relativeUrl );
        $result          = json_decode( $response->getBody()->getContents(), TRUE );
        $instrumentLists = [];
        foreach ( $result[ 'value' ] as $instrumentListData ):
            $instrumentList                             = new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $instrumentListData );
            $instrumentLists[ $instrumentList->ListId ] = $instrumentList;
        endforeach;

        return $instrumentLists;
    }


    /**
     * @param string $instrumentListId
     * @return \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList
     */
    public function Get( string $instrumentListId ): \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList {
        $relativeUrl = "Extractions/InstrumentLists('" . $instrumentListId . "')";
        $response    = $this->getRequest( $relativeUrl );
        $result      = json_decode( $response->getBody()->getContents(), TRUE );

        return new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $result );
    }


    /**
     * Returns true if a list of this id exists.
     * TODO NO EXAMPLES AVAILABLE
     * @param string $instrumentListId
     * @return bool
     */
    public function Exists( string $instrumentListId ): bool {
        $relativeUrl = "Extractions/InstrumentListExists";

        $options = [

            'query' => [
                'ListId' => $instrumentListId,
            ],
        ];


        $response = $this->getRequest( $relativeUrl, $options );
        $result   = json_decode( $response->getBody()->getContents(), TRUE );

        var_dump( $result );

        return (bool)$result;
    }


    /**
     * @param string $instrumentListId
     * @param string $format
     * @param bool $includeSource
     * @throws \Exception
     */
    public function Export( string $instrumentListId, string $format, bool $includeSource = TRUE ) {

        switch ( $format ):
            case 'Csv':
            case 'Xml':
                break;
            default:
                throw new \Exception( "The format parameter needs to be Csv or Xml" );
        endswitch;

        $includeSourceString = $includeSource ? 'true' : 'false';
        $parameterString     = "Format=ThomsonReuters.Dss.Api.Extractions.SubjectLists.InstrumentListExportFormat'" . $format . "',IncludeSource=" . $includeSourceString;
        $relativeUrl         = "Extractions/InstrumentLists('" . $instrumentListId . "')/ThomsonReuters.Dss.Api.Extractions.InstrumentListExport(" . $parameterString . ")";


        $response = $this->getRequest( $relativeUrl );
        $result   = json_decode( $response->getBody()->getContents(), TRUE );
        $data     = $result[ 'value' ];
        $string   = base64_decode( $data );


    }


    /**
     * @param string $instrumentListId
     * @param array $identifiers
     * @return array
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=AppendIdentifiers
     */
    public function AppendIdentifiers( string $instrumentListId, array $identifiers ) {
        $relativeUrl = 'Extractions/InstrumentLists(' . $instrumentListId . ')/ThomsonReuters.Dss.Api.Extractions.InstrumentListAppendIdentifiers';

        $options = [
            'headers' => [
                'Content-Type' => 'application/json; odata=minimalmetadata',
            ],
            'json'    => [
                'ListName' => 'CommoditiesCriteriaList',
                'Type'     => 'Commodities',
                'Filters'  => $filters,
            ],
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $body     = json_decode( $response->getBody()->getContents(), TRUE );

        var_dump( $body );
        return [];
    }


    /**
     * Adds the already-validated instruments to the existing InstrumentList.
     * TODO NO EXAMPLES AVAILABLE
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=AppendValidated
     * @param string $instrumentListId
     * @param array $identifiers
     */
    public function AppendValidated( string $instrumentListId, array $identifiers ) {
        $relativeUrl = 'Extractions/InstrumentLists({id})/ThomsonReuters.Dss.Api.Extractions.InstrumentListAppendValidated';
        $options     = [];

    }

}