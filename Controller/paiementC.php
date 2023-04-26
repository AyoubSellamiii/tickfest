<!DOCTYPE html>
<html>

<?php 

class paiementC{


    function afficherpaiement(){
        $sql="SELECT * FROM paiement  ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die("erreur:".$e->getMessage());
        }
    } 
       function supprimerpaiement($numse){
 $sql="DELETE  FROM paiement WHERE `id_paiement`= $numse ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);

        }catch(Exception $e){
        die("erreur:".$e->getMessage());
     
        }
  
}
function Modifierpaiement($id,$nom,$stat)
{
$sqlc= "UPDATE `paiement` SET nom_fest=:nome,statu=:stat WHERE id_paiement=:id  ";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sqlc);
    $recipesStatement->execute(['nome' =>$nom,
                     'stat'=>$stat,
                     
                   
      'id'=>$id,
                 ]);
}
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());
}

} 

function Ajouterpartenaire($ser){
$sql= "INSERT INTO `paiement` VALUES (:id,:nom,:prx,:meth,:statu,:nbr)";
$db=config::getConnexion();
try{ $recipesStatement = $db->prepare($sql);
    $recipesStatement->execute([   'id'=>$ser->getid_paiement(), 

        'nom' =>$ser->getname_fest(),
        'prx' =>$ser->getprix_tote(),
        'meth' =>$ser->getmethode_pai(),
        'statu' =>$ser->getstatu(),
         'nbr' =>$ser->getnbr(),




    ]);
 }
 catch(Exception $e){ 
    
             die("erreur:".$e->getMessage());

}

}
function afficherpaiement1($numse){
        $sql="SELECT * FROM paiement WHERE `id_paiement`= $numse ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die("erreur:".$e->getMessage());
        }
    }

    function afficherpaiementtrie(){
        $sql="SELECT * FROM paiement order by nombre_tick ";
        $db=config::getConnexion();
        try{
            $liste=$db->query($sql);
            return $liste;
        }
        catch(Exception $e){
            die("erreur:".$e->getMessage());
        }
    }
        function recherche($search_value)
    {
        $sql="SELECT * FROM paiement where     (id_paiement like '$search_value' or nom_fest like '%$search_value%' or prix_total like '%$search_value%' or methode_paiement like '%$search_value%' )  ";

        //global $db;
        $db =Config::getConnexion();

        try{
            $result=$db->query($sql);

            return $result;

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
   

}
?>
</html>
