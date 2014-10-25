<?php
/**
 * Main class
 * @author R.Borgniet
 * @version 0.9
 */
 
class srDocument {
    private $elementsArray;
    
    /**
     * Load an SVG file
     * @method DOMElement addSVG($file)
     * @param string $file SVG file path
     * @return DOMElement root of the SVG file OR false
     */
    public function addSVG($file){
        if(!file_exists($file))
            return false;
            
        $element = new srVectorElement($file);
        $this->elementsArray[] = $element;
        return $element;
    }
    
    /**
     * Load an SVG file
     * @method DOMElement addText($file)
     * @param string $file SVG file path
     * @return DOMElement root of the SVG file OR false
     */
    public function addText($text, $args = null){
        if(empty($text))
            return false;
        
        $element = new srTextElement($text, $args);
        $this->elementsArray[] = $element;
        return $element;
    }
    
    /**
     * Render the document
     * @return string XML data from the document rendering
     */
    public function render(){
        $docOut = new DOMDocument('1.0','utf-8');
        
        $svgElement = $docOut->createElement("svg");
        $svgElement->setAttribute('version','1.1');
        $svgElement->setAttribute('xmlns','http://www.w3.org/2000/svg');
        $svgElement->setAttribute('xmlns:xlink','http://www.w3.org/1999/xlink');
        
        $docOutSvgElement = $docOut->appendChild($svgElement);
        
        foreach($this->elementsArray as $element){
            $document = $element->getDomDocument();
            
            if($element instanceof srVectorElement)
                $docTree = $document->getElementsByTagName('svg')->item(0);
            else
                $docTree = $document;
            
            $i = 0;
            while ($docTree->childNodes->length > $i) {
                $child = $docTree->childNodes->item($i);
                $child = $docOut->importNode($child,true);
                $docOutSvgElement->appendChild($child);
                $i++;
            }
        }
        return $docOut->saveXML();
    }
    
    public function saveAs($file){
        file_put_contents($file, $this->render());
    }
}
?>