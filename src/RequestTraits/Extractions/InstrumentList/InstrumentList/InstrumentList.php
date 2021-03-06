<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\InstrumentList\InstrumentList;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Instrument;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentListItem;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\Schedule\InstrumentAppendIdentifiers\InstrumentsAppendIdentifiersResult;
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
    public function CreateInstrumentList( string $name ): \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList {
        $relativeUrl = 'Extractions/InstrumentLists';

        $options = [
            'json' => [
                '@odata.type' => '#ThomsonReuters.Dss.Api.Extractions.SubjectLists.InstrumentList',
                'Name'        => $name,
            ],
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $result   = json_decode( $response->getBody()->getContents(), TRUE );
        $listId   = $result[ 'ListId' ];
        $name     = $result[ 'Name' ];
        $count    = $result[ 'Count' ];
        $created  = $result[ 'Created' ];
        $modified = $result[ 'Modified' ];
        return new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $listId,
                                                                                              $name,
                                                                                              $count,
                                                                                              $created,
                                                                                              $modified );
    }


    /**
     * @param string $instrumentListId
     * @param string $newName Friendly name that can be used for retrieving the list by name.
     * @param bool $debug
     * @return bool
     * @throws \Exception
     */
    public function Update( string $instrumentListId, string $newName, bool $debug = FALSE ) {
        $relativeUrl = "Extractions/InstrumentLists('" . $instrumentListId . "')";
        $options     = [
            'json'  => [
                '@odata.type' => '#ThomsonReuters.Dss.Api.Extractions.SubjectLists.InstrumentList',
                "ListId"      => $instrumentListId,
                "Name"        => $newName,
            ],
            'debug' => $debug,
        ];
        $response    = $this->putRequest( $relativeUrl, $options );
        $statusCode  = $response->getStatusCode();
        if ( 204 == $statusCode ):
            return TRUE;
        endif;
        throw new \Exception( "Unable to delete instrument list with id: " . $instrumentListId );
    }


    /**
     * Deletes an Instrument List by id.
     * @param string $instrumentListId
     * @return bool
     * @throws \Exception
     */
    public function DeleteInstrumentList( string $instrumentListId ) {
        $relativeUrl = "Extractions/InstrumentLists('" . $instrumentListId . "')";
        $response    = $this->deleteRequest( $relativeUrl );
        $statusCode  = $response->getStatusCode();
        if ( 204 == $statusCode ):
            return TRUE;
        endif;
        throw new \Exception( "Unable to delete instrument list with id: " . $instrumentListId );
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
    public function GetAllInstrumentLists(): array {
        $relativeUrl     = 'Extractions/InstrumentLists';
        $response        = $this->getRequest( $relativeUrl );
        $result          = json_decode( $response->getBody()->getContents(), TRUE );
        $instrumentLists = [];
        foreach ( $result[ 'value' ] as $instrumentListData ):
            $listId         = $instrumentListData[ 'ListId' ];
            $name           = $instrumentListData[ 'Name' ];
            $count          = $instrumentListData[ 'Count' ];
            $created        = $instrumentListData[ 'Created' ];
            $modified       = $instrumentListData[ 'Modified' ];
            $instrumentList = new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $listId,
                                                                                                             $name,
                                                                                                             $count,
                                                                                                             $created,
                                                                                                             $modified );

            $instrumentLists[ $instrumentList->ListId ] = $instrumentList;
        endforeach;

        return $instrumentLists;
    }


    /**
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=Get
     * @param string $instrumentListId
     * @return \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList
     */
    public function GetInstrumentList( string $instrumentListId ): \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList {
        $relativeUrl = "Extractions/InstrumentLists(ListId='" . $instrumentListId . "')";
        $response    = $this->getRequest( $relativeUrl );
        $result      = json_decode( $response->getBody()->getContents(), TRUE );
        $listId      = $result[ 'ListId' ];
        $name        = $result[ 'Name' ];
        $count       = $result[ 'Count' ];
        $created     = $result[ 'Created' ];
        $modified    = $result[ 'Modified' ];
        return new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $listId,
                                                                                              $name,
                                                                                              $count,
                                                                                              $created,
                                                                                              $modified );
    }


    /**
     * @param string $instrumentListName
     * @return \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList
     */
    public function GetInstrumentListByName( string $instrumentListName ): \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList {
        $relativeUrl = "Extractions/InstrumentListGetByName(ListName='" . $instrumentListName . "')";
        $response    = $this->getRequest( $relativeUrl );
        $result      = json_decode( $response->getBody()->getContents(), TRUE );
        $listId      = $result[ 'ListId' ];
        $name        = $result[ 'Name' ];
        $count       = $result[ 'Count' ];
        $created     = $result[ 'Created' ];
        $modified    = $result[ 'Modified' ];
        return new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $listId,
                                                                                              $name,
                                                                                              $count,
                                                                                              $created,
                                                                                              $modified );
    }


    /**
     * Given an Instrument List Id, this method will return boolean TRUE if the list exists. False otherwise.
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=Exists
     * @see https://community.developers.refinitiv.com/questions/13520/extractionsinstrumentlistexists-endpoint-does-not.html
     * @param string $instrumentListId
     * @return bool
     */
    public function Exists( string $instrumentListId ): bool {
        $relativeUrl = "Extractions/InstrumentListExists(ListId='" . $instrumentListId . "')";
        $response    = $this->getRequest( $relativeUrl );
        $result      = json_decode( $response->getBody()->getContents(), TRUE );
        return $result[ 'value' ];
    }


    /**
     * @param string $instrumentListId
     * @param string $format
     * @param bool $includeSource
     * @return array An array of Instrument objects.
     * @throws \Exception
     */
    public function Export( string $instrumentListId, string $format, bool $includeSource = TRUE ): array {

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

        $rows = [];
        switch ( $format ):
            case 'Csv':
                // Turn string into array
                $rawRows = explode( "\n", $string );
                $rawRows = array_filter( $rawRows );
                foreach ( $rawRows as $rawRow ):
                    $parsedRow = explode( ',', $rawRow );
                    $rows[]    = [
                        'IdentifierType' => $parsedRow[ 0 ] ?? '',
                        'Identifier'     => $parsedRow[ 1 ] ?? '',
                        'Description'    => $parsedRow[ 2 ] ?? '',
                        'Exchange'       => $parsedRow[ 3 ] ?? '',
                    ];
                endforeach;
                break;

            case 'Xml':
                $object = simplexml_load_string( $string );
                foreach ( $object->InputList->Instrument as $xmlInstrument ):
                    $rows[] = (array)$xmlInstrument;
                endforeach;
                break;
            default:
                throw new \Exception( "The format parameter needs to be Csv or Xml" );
        endswitch;

        // Convert the arrays into Instrument objects.
        $instruments = [];
        foreach ( $rows as $arrayInstrument ):
            $instruments[] = new Instrument( $arrayInstrument[ 'IdentifierType' ] ?? '',
                                             $arrayInstrument[ 'Identifier' ] ?? '',
                                             $arrayInstrument[ 'Description' ] ?? '',
                                             $arrayInstrument[ 'Exchange' ] ?? '' );
        endforeach;

        return $instruments;
    }


    /**
     * Given an Instrument List id, this method will return the max number of Instruments you can add to this List.
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=GetMaxInstrumentsAllowed
     * @param string $instrumentListId
     * @return int
     */
    public function GetMaxInstrumentsAllowed( string $instrumentListId ): int {
        $relativeUrl = "Extractions/InstrumentLists('" . $instrumentListId . "')/ThomsonReuters.Dss.Api.Extractions.InstrumentListGetMaxInstrumentsAllowed";
        $response    = $this->getRequest( $relativeUrl );
        $result      = json_decode( $response->getBody()->getContents(), TRUE );
        return (int)$result[ 'value' ];
    }


    /**
     * https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=Copy
     * @param string $instrumentListIdToBeCopied
     * @param string $nameOfCopy
     * @param bool $debug
     * @return \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList
     */
    public function Copy( string $instrumentListIdToBeCopied, string $nameOfCopy, bool $debug = FALSE ): \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList {
        $relativeUrl = "Extractions/InstrumentLists('" . $instrumentListIdToBeCopied . "')/ThomsonReuters.Dss.Api.Extractions.InstrumentListCopy";

        $options = [
            'json'  => [
                'NameOfCopy' => $nameOfCopy,
            ],
            'debug' => $debug,
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $result   = json_decode( $response->getBody()->getContents(), TRUE );

        $listId   = $result[ 'ListId' ];
        $name     = $result[ 'Name' ];
        $count    = $result[ 'Count' ];
        $created  = $result[ 'Created' ];
        $modified = $result[ 'Modified' ];
        return new \DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\InstrumentList( $listId,
                                                                                              $name,
                                                                                              $count,
                                                                                              $created,
                                                                                              $modified );
    }


    /**
     * @param string $instrumentListId
     * @return array An array of InstrumentListItem
     */
    public function GetAllInstruments( string $instrumentListId ): array {
        $relativeUrl         = "Extractions/InstrumentLists('" . $instrumentListId . "')/ThomsonReuters.Dss.Api.Extractions.InstrumentListGetAllInstruments";
        $response            = $this->getRequest( $relativeUrl );
        $result              = json_decode( $response->getBody()->getContents(), TRUE );
        $instrumentListItems = [];
        foreach ( $result[ 'value' ] as $instrumentListItemData ):
            $instrumentListItems[] = new InstrumentListItem( $instrumentListItemData[ 'IdentifierType' ],
                                                             $instrumentListItemData[ 'Identifier' ],
                                                             $instrumentListItemData[ 'Description' ],
                                                             $instrumentListItemData[ 'Source' ],
                                                             $instrumentListItemData[ 'ListId' ],
                                                             $instrumentListItemData[ 'UserDefinedIdentifier' ],
                                                             $instrumentListItemData[ 'UserDefinedIdentifier2' ],
                                                             $instrumentListItemData[ 'UserDefinedIdentifier3' ],
                                                             $instrumentListItemData[ 'UserDefinedIdentifier4' ],
                                                             $instrumentListItemData[ 'UserDefinedIdentifier5' ],
                                                             $instrumentListItemData[ 'UserDefinedIdentifier6' ],
                                                             $instrumentListItemData[ 'Order' ],
                                                             $instrumentListItemData[ 'InstrumentListItemKey' ],
                                                             $instrumentListItemData[ 'InstrumentKey' ] );
        endforeach;
        return $instrumentListItems;
    }


    /**
     * @param string $instrumentListId
     * @param array $identifiers An array of Identifier objects.
     * @param bool $keepDuplicates Set to true to keep duplicate identifiers in your list.
     * @param bool $debug Set to true to kick off debug mode for the Guzzle client.
     * @return InstrumentsAppendIdentifiersResult
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Operation?ctx=Extractions&ent=InstrumentList&opn=AppendIdentifiers
     */
    public function AppendIdentifiers( string $instrumentListId,
                                       array $identifiers,
                                       bool $keepDuplicates = FALSE,
                                       bool $debug = FALSE ): InstrumentsAppendIdentifiersResult {
        $relativeUrl = "Extractions/InstrumentLists('" . $instrumentListId . "')/ThomsonReuters.Dss.Api.Extractions.InstrumentListAppendIdentifiers";

        $identifierParameters = [];

        /**
         * @var InstrumentListItem $identifier
         */
        foreach ( $identifiers as $identifier ):
            $identifierParameters[] = $identifier->toArray();
        endforeach;

        $options = [
            'json'  => [
                'Identifiers'    => $identifierParameters,
                'KeepDuplicates' => $keepDuplicates,
            ],
            'debug' => $debug,
        ];

        $response = $this->postRequest( $relativeUrl, $options );
        $data     = json_decode( $response->getBody()->getContents(), TRUE );

        return InstrumentsAppendIdentifiersResult::createFromData($data);
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