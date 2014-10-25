<?php
/**
 * Child class for simple text element
 * @author R.Borgniet
 * @version 0.8
 */
 
class srTextElement extends srElement {

    /**
     * Constructor, initializes vars for the text
     * @method srVectorElement($file)
     * @param string $text text value
     */
    public function srTextElement($text, $args = null){
        if(empty($text))
            throw('Text not set');
        
        $doc = new DOMDocument();
        $gElement = $doc->createElement("g");
        $textElement = $doc->createElement("text");
        $textElement->nodeValue = $text;
        
        
        $gElement->appendChild($textElement);
        $doc->appendChild($gElement);
        
        $this->DocumentGroup = $gElement;
        $this->DomDocument = $doc;
        
        $this->fontFamily('Arial');
        $this->fontSize(12);
        
        if(isset($args) && is_array($args))
            foreach($args as $k=>$v)
                $textElement->setAttribute($k,$v);
        
    }
    
    /**
     * Rotates the element
     * @param number $angle rotation angle in degrees
     * @param number $cx x position of the rotation center
     * @param number $cy y position of the rotation center
     */
    public function fill($hexColor){
        $element = $this->DocumentGroup->childNodes->item(0);
        if($element->hasAttribute('fill'));
            $element->removeAttribute('fill'));
        $element->addAttribute('fill', $hexColor);
    }
    
    public function fontFamily($fontFamily){
        $element = $this->DocumentGroup->childNodes->item(0);
        if($element->hasAttribute('font-family'));
            $element->removeAttribute('font-family'));
        $element->addAttribute('font-family', $fontFamily);
    }
    
    public function fontSize($fontSize){
        $element = $this->DocumentGroup->childNodes->item(0);
        if($element->hasAttribute('font-size'));
            $element->removeAttribute('font-size'));
        $element->addAttribute('font-size', $fontSize);
    }
    
}
?>