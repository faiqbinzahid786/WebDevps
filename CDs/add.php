<?php
$xmldoc = new DomDocument( '1.0' );
$xmldoc->preserveWhiteSpace = false;
$xmldoc->formatOutput = true;

if( $xml = file_get_contents( 'cd_catalog.xml') ) {
    $xmldoc->loadXML( $xml, LIBXML_NOBLANKS );

    // find the headercontent tag
    $root = $xmldoc->getElementsByTagName('CATALOG')->item(0);

    // create the <product> tag
    $CD = $xmldoc->createElement('CD');

    // add the product tag before the first element in the <CATALOG> tag
    $root->insertBefore( $CD, $root->firstChild );

    // create other elements and add it to the <product> tag.
    $titleElement = $xmldoc->createElement('TITLE');
    $CD->appendChild($titleElement);
    $titleText = $xmldoc->createTextNode($_GET['title']);
    $titleElement->appendChild($titleText);

    $artistElement = $xmldoc->createElement('ARTIST');
    $CD->appendChild($artistElement);
    $artistText = $xmldoc->createTextNode($_GET['artist']);
    $artistElement->appendChild($artistText);

    $countryElement = $xmldoc->createElement('COUNTRY');
    $CD->appendChild($countryElement);
    $countryText = $xmldoc->createTextNode($_GET['country']);
    $countryElement->appendChild($countryText);

    $companyElement = $xmldoc->createElement('COMPANY');
    $CD->appendChild($companyElement);
    $companyText = $xmldoc->createTextNode($_GET['company']);
    $companyElement->appendChild($companyText);

    $priceElement = $xmldoc->createElement('PRICE');
    $CD->appendChild($priceElement);
    $priceText = $xmldoc->createTextNode($_GET['price']);
    $priceElement->appendChild($priceText);

    $yearElement = $xmldoc->createElement('YEAR');
    $CD->appendChild($yearElement);
    $yearText = $xmldoc->createTextNode($_GET['year']);
    $yearElement->appendChild($yearText);

    $xmldoc->save('cd_catalog.xml');

    header("Location: display.php");
}
?>