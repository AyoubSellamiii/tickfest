<?php
    class Commande
    {
		public $id;
        public $total;
        public $total_after_promotion;
        public $id_user;


        public function __construct(int $id, float $total,string $total_after_promotion,int $id_user )
    {
        $this->id = $id;
        $this->total = $total;
        $this->total_after_promotion = $total_after_promotion;
        $this->id_user =  $id_user;
       
    }

    public function getId() : int
    {
        return $this->id;
    }
    public function setId(int $id)
    {
        $this->id=$id;
    }
    public function getTotal() : string 
    {
        return $this->total;
    }
    public function setTotal(string $total )
    {
        $this->total=$total;
    }
    public function getTotalAfterPromotion() : float 
    {
        return $this->total_after_promotion;
    }
    public function setTotalAfterPromotion(float $total_after_promotion )
    {
        $this->total_after_promotion=$total_after_promotion;
    }
   

    }
   
?>