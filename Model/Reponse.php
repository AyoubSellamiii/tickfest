<?php
class Reponse{
    private  $idreponse = null;
    private   DateTime $date;
    private  $description = null ; 
   
   
    public function __construct($idreponse=NULL,$date,$description){
        $this->idreponse= $idreponse ; 
        $this->date= $date ;
        $this->description= $description ;
       
       
    }
    public function getidreponse(){
        return $this->idreponse ;
     }
    
     public function getdate(){
        return $this->date ;
     }
    public function sedate(){
        $this->date= $date ;
        return $this ;
     }


     public function getdescription(){
      return $this->description ; 
   }
  public function setdescription(){
      $this->description= $description ;
      return $this ; 
   }
   
}
?>