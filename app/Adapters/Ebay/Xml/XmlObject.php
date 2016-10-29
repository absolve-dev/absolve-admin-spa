<?php

namespace App\Adapters\Ebay\Xml;

// made purely to enforce requirements/structure
class XmlObject{
  // scarily, what this actually is...
  // its just a creation of some sort of new language of sorts and shit...
  // but i guess some sort of concrete structure will be required...

  const BEGIN_HEADER = '<?xml version="1.0" encoding="utf-8"?>';

  protected $element, $value = "";
  protected $attributes = [];
  protected $children = [];
  public function __construct($xmlObject){
    // input is a hash with relevant shit
    if( !isset($xmlObject["element"]) ){
      throw new \Exception("Element is required.");
    }
    $this->element = $xmlObject["element"];
    if( isset($xmlObject["value"]) ){
      $this->value = $xmlObject["value"];

    }
    if( isset($xmlObject["attributes"]) ){
      foreach($xmlObject["attributes"] as $attrName => $attrValue){
        $this->setAttribute($attrName, $attrValue);
      }
    }
    if( isset($xmlObject["children"]) ){
      foreach($xmlObject["children"] as $child){
        $this->addChild( new XmlObject($child) );
      }
    }
  }

  public function getElement(){
    return $this->element;
  }
  public function getValue(){
    return $this->value;
  }
  public function setAttribute($attrName, $attrValue){
    $this->attributes[$attrName] = $attrValue;
  }
  public function addChild(XmlObject $xmlChild){
    $this->children[] = $xmlChild;
  }

  public function toSimpleXMLElement(){
    $tagName = $this->element;
    $rootElement = new \SimpleXMLElement(
      XmlObject::BEGIN_HEADER .
      "<$tagName/>"
    );
    $this->addDataToSimpleXMLElement($rootElement);
    return $rootElement;
  }
  public function addDataToSimpleXMLElement(\SimpleXMLElement $targetElement){
    // decorator pattern is in order for this method??
    // add the attributes
    foreach($this->attributes as $attrName => $attrValue){
      $targetElement->addAttribute($attrName, $attrValue);
    }
    // add the children
    foreach($this->children as $child){
      // $child, instances of XmlObject
      $targetElement->addChild($child->getElement(), $child->getValue());
      $child->addDataToSimpleXMLElement($targetElement);
    }
  }
  public function toXML(){
    return $this->toSimpleXMLElement()->asXML();
  }
}

?>
