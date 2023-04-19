<?php
class Reclamation{
    private  $id_reclamtion = null;
    private   $sujet = null;
    private  $contact =null ;
    private  $description = null ; 
    private   DateTime $date_creation;
    private   $type = null;
    private  $status = null ;
   
   
    public function __construct($id_reclamtion=NULL,$sujet,$contact,$description,$date_creation,$type,$status){
        $this->id_reclamtion= $id_reclamtion ; 
        $this->sujet= $sujet;
        $this->contact= $contact ; 
        $this->description= $description ;
        $this->date_creation= $date_creation ;
        $this->type= $type ;
        $this->status= $status ;
    }
    public function getid_reclamtion(){
        return $this->id_reclamtion ;
     }
    
     public function getsujet(){
        return $this->sujet ;
     }
    public function setsujet(){
        $this->sujet= $sujet ;
        return $this ;
     }

     public function getcontact(){
      return $this->contact ;
   }
  public function setcontact(){
      $this->contact= $contact ;
      return $this ;
   }

     public function getdescription(){
      return $this->description ; 
   }
  public function setdescription(){
      $this->description= $description ;
      return $this ; 
   }

    
    public function getdate_creation(){
        return $this->date_creation ;
     }
    public function sedate_creation(){
        $this->date_creation= $date_creation ;
        return $this ;
     }
    
     public function getType(){
      return $this->type ;   
   }
  public function setType(){
      $this->type= $type ;
      return $this ;
   }

    public function getstatus(){
        return $this->status ; 
     }
    public function setstatus(){
        $this->status= $status ;
        return $this ; 
     }
   
   
    
}
?>