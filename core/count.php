<?php
interface miancountinterdface{
    function set();
}
abstract class generate implements miancountinterdface{
    protected $data;
    function __construct($data){
        $this->data=$data;
        $this->set();
    }
    public function returndata(){
        return $this->data;
    }
}
class square extends generate{
    public function set(){
        $this->data['volume']=$this->data['var1']*$this->data['var1'];
    }
}
class rectangle extends generate{
    public function set(){
        if($this->data['v2']===0 ){
            $this->data['volume']=$this->data['var1']*$this->data['var2'];
        }else{
            die('v2 is undefined for rectangle');
        }
    }
}
class circle extends square{}
class mainCount{
    private $datainObjects;
    private $listOfObjects;
    function __construct(array $data){
        $this->listOfObjects=new listOfObjects();
        $objects['square']= new square($data);
        $objects['rectangle']= new square($data);
        $objects['circle']= new square($data);
        $this->datainObjects=$objects[$data['geometricshapetype']];
        $this->addObjects();
    }
    public function addObjects(){
        $this->listOfObjects->create($this->datainObjects->returndata());
    }
}
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
        if(!$this->ifuniq()){
            $sql = 'INSERT INTO `objects` (`color`, ` volume`, `v1`, `v2`, `types`) VALUES ("'.$this->data['color'].'",'.$this->data['volume'].','.$this->data['v1'].','.$this->data['v2'].',"'.$this->data['types'].'");';
            return $this->db->MsQuery($sql);
        }
        die('This geometric shape is not uniq');
    }
    private function check(string $emptyvar){
        if(empty($emptyvar)){
            return 0;
        }
        return $emptyvar;
    }
    private function ifuniq(){ 
        $objectlist=$this->db->sqlloopAll('SELECT * FROM `objects` where `color` = "'.$this->data['color'].'" AND ` volume` = '.$this->data['volume'].' AND `v1`='.$this->data['v1'].' AND `v2`='.$this->data['v2'].' ');
        if(count($objectlist)){
            return true;
        }
    }
}
