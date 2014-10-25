<?php
/**
 * Child class for SVG element
 * @author R.Borgniet
 * @version 0.9
 */
 
class srVectorElement extends srElement {

    /**
     * Constructor, initializes vars for the loaded SVG
     * @method srVectorElement($file)
     * @param string $file SVG file path
     */
    public function srVectorElement($file){
        if(!file_exists($file))
            throw('file not found');
            
        $doc = new DOMDocument();
        $doc->load($file);
        
        $gElement = $doc->createElement("g");
        $svgElement = $doc->documentElement;
        
        while ($svgElement->childNodes->length > 0) {
            $child = $svgElement->childNodes->item(0);
            $svgElement->removeChild($child);
            $gElement->appendChild($child);
        }
        
        $svgElement->appendChild($gElement);
        
        $this->DocumentGroup = $gElement;
        $this->DomDocument = $doc;
    }
    
}
?>