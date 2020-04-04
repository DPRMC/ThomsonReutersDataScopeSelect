<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\Schedule;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\ReportTemplate\ContentFieldType;

trait Schedule {

    use Client;
    use Authenticate;


    /**
     * @param string $reportTemplateType
     * @param bool $debug
     * @return array
     *
     *
     * Extractions/InstrumentLists('0x0580701edc2b1f86')/ThomsonReuters.Dss.Api.Extractions.InstrumentListAppendIdentifiers
     */
    public function CreateImmediateSchedule( string $reportTemplateType, bool $debug = FALSE ): array {
        $relativeUrl = "Extractions/GetValidContentFieldTypes(ReportTemplateType=ThomsonReuters.Dss.Api.Extractions.ReportTemplates.ReportTemplateTypes'" . $reportTemplateType . "')";

        $options = [
            'debug' => $debug,
        ];

        $response = $this->getRequest( $relativeUrl, $options );
        $result   = json_decode( $response->getBody()->getContents(), TRUE );

        $unparsedRecords = $result[ 'value' ];

        $contentFieldTypes = [];

        foreach ( $unparsedRecords as $unparsedRecord ):
            $contentFieldTypes[] = new ContentFieldType( $unparsedRecord[ 'Code' ],
                                                         $unparsedRecord[ 'Name' ],
                                                         $unparsedRecord[ 'Description' ],
                                                         $unparsedRecord[ 'FormatType' ],
                                                         $unparsedRecord[ 'FieldGroup' ] );

        endforeach;

        return $contentFieldTypes;
    }


}