<?php
include_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\config.php';
include_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\Model\Reponse.php';
class ReponseC
{

    function recherche($idd)
    {
        $requete = "select * from reponse where idreponse like '%$idd%'";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute();
            $result = $querry->fetchAll();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
	function triRéponse()
        {
            $requete = "select * from reponse ORDER BY idreponse";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute();
                $result = $querry->fetchAll();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }

		
	function getReponsebyID($idreponse)
        {
            $requete = "select * from reponse where idreponse=:idreponse";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'idreponse'=>$idreponse
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }	
	
    function afficherReponse()
    {
        $sql = "SELECT * FROM reponse";
        $db = config::getConnexion();
        try {
			$liste = $db->query($sql);
			return $liste;
		}catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
    }
    function supprimerReponse($idreponse)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM reponse WHERE idreponse =:idreponse
                ');
                $querry->execute([
                    'idreponse'=>$idreponse
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    function ajouteReponse($Reponse)
	{
		$sql = "INSERT INTO reponse (idreponse,date,description) 
			VALUES ( :idreponse, :date, :description )";
		$db = config::getConnexion();
		try {
            $query = $db->prepare($sql);
			$query->execute([
				'idreponse' => $Reponse->getidreponse(),
                'date' => $Reponse->getdate()->format('Y/m/d'),
                'description' => $Reponse->getdescription(),

				
				
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    
	}
    function recupererReponse($idreponse)
	{
		$sql = "SELECT * from reponse where idreponse=$idreponse";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$Reponse = $query->fetch();
			return $Reponse;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}


}

function modifierReponse($Reponse, $idreponse)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE Reponse SET 
                    date=:date, 
					description=:description
                   
                WHERE idreponse= :idreponse '
        );
        $query->execute([

            'idreponse' => $Reponse->getidreponse(),
				'date' => $Reponse->getdate()->format('Y/m/d'),
                'description' => $Reponse->getdescription()
				

           
            
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    
    }


}

}
?>