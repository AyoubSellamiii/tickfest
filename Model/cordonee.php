<?php
class cordonee{
    
private $id_cordo;
private $numero;
private $adresse_mail;
private $id_paiement;




public  function __construct($id_cordo,$numero,$adresse_mail,$id_paiement)
{
    $this->id_cordo=$id_cordo;
    $this->numero=$numero;
    $this->adresse_mail=$adresse_mail;
    
    $this->id_paiement=$id_paiement;
  
       
    

 


}





public  function getid_cordo()
{
    return $this->id_cordo;
}
public function getnumero()
{
    return $this->numero;
}
public function getadresse_mail()
{
    return $this->adresse_mail;
}

public function getid_paiement()
{
    return $this->id_paiement;
}



}




?>