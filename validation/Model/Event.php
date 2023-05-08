<?php
    class Event
    {
		public $id;
        public $name;
        public $code;
        public $image;
		public $price;


    

        public function __construct(int $id, string $name,string $code,float $price )
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->price =  $price;
       
    }

    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id=$id;
    }
    public function getName() : string 
    {
        return $this->name;
    }
    public function setName(string $name )
    {
        $this->name=$name;
    }
    public function getCode() : float 
    {
        return $this->code;
    }
    public function setCode(float $code )
    {
        $this->code=$code;
    }
    public function getPrice() : string 
    {
        return $this->price;
    }
    public function setPrice(string $price )
    {
        $this->name=$price;
    }

    }
   
?>