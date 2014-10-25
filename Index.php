<?php
header("Content-type: image/svg+xml");
include('SVGRenderer/sr.php');

$doc = new srDocument();

//load a main SVG file to work with
$doc->addSVG('test5.svg');
$doc->addText('test text',  
              array('font-size'=>'32',
                                 'x'=>35,
                                 'y'=>50,
                                 'fill'=>'#AA00FF')
              )->translate(0,25);


//load a SVG file to insert 
$element = $doc->addSVG('simplegrad.svg');
$element->rotate(5);
$element->translate(25);
$element->scale(1.2,.8);
$element->skewY(-10);
$element->skewX(25);

echo $doc->render();
$doc->saveAs('svgOut.svg');
?>