<?php
namespace core\validate;
class observervalidator{
    private $validList=[];
    public function add($validElement) {
        $this->validList[spl_object_hash($validElement)] = $validElement;
    }
    public function remove($validElement) {
        unset($this->validList[spl_object_hash($validElement)]);
    }
    public function validateStart() {
        foreach ($this->validList as $el) {
            $el->valid();
        }
    } 
}