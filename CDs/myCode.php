<?php
$dom=new DOMDocument();
$dom->load("file.xml");

$root=$dom->documentElement; // This can differ (I am not sure, it can be only documentElement or documentElement->firstChild or only firstChild)

$nodesToDelete=array();

$markers=$root->getElementsByTagName('marker');

// Loop trough childNodes
foreach ($markers as $marker) {
    $type=$marker->getElementsByTagName('type')->item(0)->textContent;
    $title=$marker->getElementsByTagName('title')->item(0)->textContent;
    $address=$marker->getElementsByTagName('address')->item(0)->textContent;
    $latitude=$marker->getElementsByTagName('latitude')->item(0)->textContent;
    $longitude=$marker->getElementsByTagName('longitude')->item(0)->textContent;

    // Your filters here

    // To remove the marker you just add it to a list of nodes to delete
    $nodesToDelete[]=$marker;
}

// You delete the nodes
foreach ($nodesToDelete as $node) $node->parentNode->removeChild($node);

echo $dom->saveXML();
?>