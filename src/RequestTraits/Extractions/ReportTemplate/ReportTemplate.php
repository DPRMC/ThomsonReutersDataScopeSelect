<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Extractions\ReportTemplate;

use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Authentication\Authenticate;
use DPRMC\ThomsonReutersDataScopeSelect\RequestTraits\Client;
use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\ReportTemplate\ContentFieldType;

trait ReportTemplate {

    use Client;
    use Authenticate;


    /**
     * All of the valid values for reportTemplateType can be found at the link below:
     * @see https://hosted.datascopeapi.reuters.com/RestApi.Help/Context/Enum?ctx=Extractions&opn=GetValidContentFieldTypes&enm=ReportTemplateTypes
     * @param string $reportTemplateType
     * @param bool $debug
     * @return array
     */
    public function GetValidContentFieldTypes( string $reportTemplateType, bool $debug = FALSE ): array {
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