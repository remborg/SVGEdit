<?php
/**
 * Parent class for elements to be load or created
 * @author R.Borgniet
 * @version 0.8
 */
 //TODO : doc matrice
 
class srElement {
    protected $DomDocument;
    protected $DocumentGroup;
    
    protected $attributes;
    
    /**
     * Return the DOMDocument var, with transform attributes
     * @method DOMDocument getDomDocument()
     * @return DOMDocument loaded SVG document
     */
    public function getDomDocument(){
        
        if(isset($this->attributes))
        {
            $transformation = '';
            foreach($this->attributes as $transf){
                foreach($transf as $attribute => $value){
                    $transformation .= $attribute.'('.$value.') ';
                }
            }
            
            if(!empty($transformation))
                $this->DocumentGroup->setAttribute('transform',$transformation);
        }else{
            if($this->DocumentGroup->hasAttribute('transform')){
                $this->DocumentGroup->removeAttribute('transform');
            }
        }
        
        return $this->DomDocument;
    }
    
    /**
     * Rotates the element
     * @param number $angle rotation angle in degrees
     * @param number $cx x position of the rotation center
     * @param number $cy y position of the rotation center
     */
    public function rotate($angle, $cx=0, $cy=0){
        $this->attributes[]['rotate']=$angle.','.$cx.','.$cy;
    }
    
    /**
     * Translates the element
     * @param number $x x position
     * @param number $y y position
     */
    public function translate($x, $y=0){
        $this->attributes[]['translate']=$x.','.$y;
    }
    
    /**
     * Scales the element
     * @param number $sx x multiplicator
     * @param number $sy y multiplicator
     */
    public function scale($sx, $sy=1){
        $this->attributes[]['scale']=$sx.','.$sy;
    }
    
    /**
     * Skews the element horizontaly
     * @param number $angle rotation angle in degrees
     */
    public function skewX($angle){
        $this->attributes[]['skewX']=$angle;
    }
    
    /**
     * Skews the element vecticaly
     * @param number $angle rotation angle in degrees
     */
    public function skewY($angle){
        $this->attributes[]['skewY']=$angle;
    }
    
    /**
     * Apply a transformation matrix to the element
     */
    public function matrix($a, $b, $c, $d, $e, $f){
        $this->attributes[]['matrix']=$a.','.$b.','.$c.','.$d.','.$e.','.$f;
    }
}
?>