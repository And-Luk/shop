<?php
class Kind //extends AnotherClass implements Interface
{
    private int $ID ;
    protected string $name_of_kind , $name_of_title;
    // public function __call($method, $args)
    // {
    //     if (method_exists($this, $function = $method.count($args)))
    //         call_user_func_array(array($this, $function), $args);   
    // }

    public function __construct(int $id, string $kind ='', string $title ='')
    {
        $this->ID = $id;
        $this->name_of_kind = $kind;
        $this->name_of_title = $title;
    }
    public function getID()
    {
        return $this->ID;
    }
    public function fillSelfBody()
    {
        # code... read from DataBase
    }
    public function draw()
    {
        echo <<<_END
        <div class="elements" align= "center">
                <p> PARENT : draw() ID = $this->ID   </p>
        </div>
        _END;
    }
    public function getNameOfKind()
    {
        return $this->name_of_kind;
    }
    public function getNameOfTitle()
    {
        return $this->name_of_title;
    }
    public function setNameOfKind(string $var = '')
    {
        $this->name_of_kind = $var;
    }
    public function setNameOfTitle(string $var = '')
    {
        $this->name_of_title = $var;
    }
    public function __destruct()
    {
        
    }

  
}
class KindOfCatalog extends Kind{

    private int $some_member=0;

    public function __construct(int $id, string $name='', string $title ='')
    {
        parent::__construct($id, $name, $title);
        $this->some_member = $id;


    }
    public function __destruct()
    {
    }
    public function draw()
    {
        //echo '&nbsp;'.$this->name ;
        //$temp = $this->name;


        //$this->some_member *=$this->some_member;
        //parent::draw();
        echo <<<_END
        <div class="elements" align= "center">
            <div>
                <img class="catalog" src="sources/green.png" width="20px"align= "left">
                <div align= "center">
                <ul>
                    <li><i> DRAW Child   </i>  </li>
                    <li><img id="like" src="sources/heart_fill.png" width="20px" align= "center"> </li>
                </ul>
                </div>
            </div>
            <div >
                <p> "CHILD:draw()"   </p>
            </div>
        </div>
        _END;

        /*<?php parent::getNameOfTitle();?> */
    }
    public function print_elent(): string
    {
        return $this->getNameOfKind() . $this->getNameOfTitle();
    }
}
class CreateFactory //extends AnotherClass implements Interface
{
    private $items_arr ; // = array();
    public function __construct()
    {
        echo "it was done ";
        //$this->items_arr = array();
    }
    public function getArray()
    {
        for ($id =0 ; $id < 6; $id++){
            $this->items_arr [] = new KindOfCatalog($id, 'ElementName='. $id , 'ElementTitle=' . $id);
            //array_push($this->items_arr, new KindOfCatalog($id, 'ElementName='. $id , 'ElementTitle=' . $id));
        }
        for ($id =0 ; $id < 6; $id++){
            $this->items_arr [] = new Kind($id, 'ElementName='. $id , 'ElementTitle=' . $id);
            //array_push($this->items_arr, new Kind($id, 'ElementName='. $id , 'ElementTitle=' . $id));
        }
        return $this->items_arr;
    }


}

class DrawFactory
{
    private  $items = array();
    public function __construct(array $array_items )  // = array()
    {
        //$this->items [] = array($array_items);
        $this->items  = &$array_items;
    }
    public function draw()
    {
        //echo $this->items[0];
        foreach ($this->items as $item){
            $item->draw();
        }

    }
}

?>