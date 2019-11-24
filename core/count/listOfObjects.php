<?php
namespace core\count;
use core\DB; 
class listOfObjects{
    private $data;
    function __construct(){
        $this->db=new DB();
    }
    public function showobjects(){
        return $this->db->sqlloopAll('SELECT * FROM `objects`');
    }
    public function create(array $data){
        $this->data= [
            'volume'     => intval($data['volume']),
            'color'      => $this->db->escepeString($data['color']),
            'types'      => $this->db->escepeString($data['geometricshapetype']),
            'v1'         => intval($data['var1']),
            'v2'         => intval($this->check($data['var2'])),
        ];
        if(!$this->ifunique()){
            $sql = 'INSERT INTO `objects` (`color`, ` volume`, `v1`, `v2`, `types`) VALUES ("'.$this->data['color'].'",'.$this->data['volume'].','.$this->data['v1'].','.$this->data['v2'].',"'.$this->data['types'].'");';
            return $this->db->MsQuery($sql);
        }
        die('This geometric shape is not unique');
    }
    private function check(string $emptyvar){
        if(empty($emptyvar)){
            return 0;
        }
        return $emptyvar;
    }
    private function ifunique(){ 
        $objectlist=$this->db->sqlloopAll('SELECT * FROM `objects` where `color` = "'.$this->data['color'].'" AND ` volume` = '.$this->data['volume'].' AND `v1`='.$this->data['v1'].' AND `v2`='.$this->data['v2'].' ');
        if(count($objectlist)){
            return true;
        }
    }
}