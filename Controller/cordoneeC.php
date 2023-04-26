<!DOCTYPE html>
<html>

<?php 

class cordoneeC{


    function affichercordonee(){
        $sql="SELECT * FROM cordonee_paiement  ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die("erreur:".$e->getMessage());
        }
    } 
       function supprimercordonee($numse){
 $sql="DELETE  FROM cordonee_paiement WHERE `id_cordo`= $numse ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);

        }catch(Exception $e){
        die("erreur:".$e->getMessage());
     
        }
  
}
function Modifiercordo($ser)
{
$sqlc= "UPDATE `cordonee_paiement` SET Numero=:num,adresse_mail=:mail WHERE id_cordo=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
    $recipesStatement->execute(['num' =>$ser->getnumero(),
                     'mail'=>$ser->getadresse_mail(),
                     
                   
      'id'=>$ser->getid_cordo(),
                 ]);
}
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());
}

} 

function Ajoutercordo($ser){
$sql= "INSERT INTO `cordonee_paiement` VALUES (:id,:num,:mail,:id_paie)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
    $recipesStatement->execute([   'id'=>$ser->getid_cordo(), 

        'num' =>$ser->getnumero(),
        'mail' =>$ser->getadresse_mail(),
        'id_paie' =>$ser->getid_paiement(),
       




    ]);
 }
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());

}

}
function affichercordo1($numse){
        $sql="SELECT * FROM cordonee_paiement WHERE `id_cordo`= $numse ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die("erreur:".$e->getMessage());
        }
    } 
 

}
?>
</html>
