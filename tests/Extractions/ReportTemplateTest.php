<?php

namespace DPRMC\ThomsonReutersDataScopeSelect\Tests\Extractions;

use DPRMC\ThomsonReutersDataScopeSelect\Responses\Extractions\ReportTemplate\ContentFieldType;
use DPRMC\ThomsonReutersDataScopeSelect\Tests\AbstractBase;

class ReportTemplateTest extends AbstractBase {


    /**
     * @test
     * @group ReportTemplate
     */
    public function testGetValidContentFieldTypesShouldReturnSOMETHING() {
        $contentFieldTypes = $this->client->GetValidContentFieldTypes( 'PriceHistory' );
        $this->assertIsArray( $contentFieldTypes );
        $firstContentFieldType = reset( $contentFieldTypes );
        $this->assertInstanceOf( ContentFieldType::class, $firstContentFieldType );
    }


}