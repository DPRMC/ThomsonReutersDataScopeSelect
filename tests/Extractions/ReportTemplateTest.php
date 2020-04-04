<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests\Extractions;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\ReportTemplate\ContentFieldType;
use DPRMC\ThomsonReutersDataScopeSelect\Tests\AbstractBase;

class ReportTemplateTest extends AbstractBase {




    /**
     * @test
     * @group ReportTemplate
     * Check the docs for GetValidContentFieldTypes() to get a list of values you can use as parameters.
     */
    public function testGetValidContentFieldTypesShouldReturnAnArrayOfContentFieldTypes() {
        $reportTemplateType = 'PriceHistory';
        $contentFieldTypes  = $this->client->GetValidContentFieldTypes( $reportTemplateType );
        $this->assertIsArray( $contentFieldTypes );
        $firstContentFieldType = reset( $contentFieldTypes );
        $this->assertInstanceOf( ContentFieldType::class, $firstContentFieldType );
    }


    /**
     * @TODO STILL NEED TO FIND A LIST OF VALID VALUES FOR $reportTemplateType
     * @test
     * @group ReportTemplate
     */
    public function testGetValidContentFieldTypesForTemplateCodeShouldReturnAnArrayOfContentFieldTypes() {
        $reportTemplateType = 'COR';
        $contentFieldTypes  = $this->client->GetValidContentFieldTypesForTemplateCode( $reportTemplateType );

        $this->assertIsArray( $contentFieldTypes );
        $firstContentFieldType = reset( $contentFieldTypes );
        $this->assertInstanceOf( ContentFieldType::class, $firstContentFieldType );
    }


}