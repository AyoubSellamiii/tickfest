<?php
class paiement{
    
private $id_paiement;
private $name_fest;
private $prix_tot;
private $nbr;
private $methode_pai;
private $statu;



public  function __construct($id_paiement,$name_fest,$prix_tot,$nbr,$methode_pai,$statu)
{
    $this->id_paiement=$id_paiement;
    $this->name_fest=$name_fest;
    $this->prix_tot=$prix_tot;
    
    $this->nbr=$nbr;
    $this->methode_pai=$methode_pai;
    $this->statu=$statu;
       
    

 


}





public  function getid_paiement()
{
    return $this->id_paiement;
}
public function getname_fest()
{
    return $this->name_fest;
}
public function getprix_tote()
{
    return $this->prix_tot;
}

public function getnbr()
{
    return $this->nbr;
}
public  function getmethode_pai()
{
   return $this->methode_pai;
}
public  function getstatu()
{
   return $this->statu;
}



}




?>