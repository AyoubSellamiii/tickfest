<?php
include_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\config.php';
include_once 'C:\xampp\htdocs\rayen-gestion-reclamtion\Model\Reclamation.php';
class ReclamationC
{
		
	function getReclamationbyID($id_reclamtion)
        {
            $requete = "select * from reclamation where id_reclamtion=:id_reclamtion";
            $config = config::getConnexion();
            try {
                $querry = $config->prepare($requete);
                $querry->execute(
                    [
                        'id_reclamtion'=>$id_reclamtion
                    ]
                );
                $result = $querry->fetch();
                return $result ;
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }	
	
    function afficherReclamation()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
			$liste = $db->query($sql);
			return $liste;
		}catch (Exception $e) {
			die('Erreur:' . $e->getMessage());
		}
    }
    function supprimerReclamation($id_reclamtion)
        {
            $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                DELETE FROM reclamation WHERE id_reclamtion =:id_reclamtion
                ');
                $querry->execute([
                    'id_reclamtion'=>$id_reclamtion
                ]);
                
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }
    function ajouteReclamation($reclamation)
	{
		$sql = "INSERT INTO reclamation (id_reclamtion,sujet, contact,description,date_creation,type,status) 
			VALUES ( :id_reclamtion, :sujet, :contact, :description, :date_creation, :type , :status)";
		$db = config::getConnexion();
		try {
            $query = $db->prepare($sql);
			$query->execute([
				'id_reclamtion' => $reclamation->getid_reclamtion(),
				'sujet' => $reclamation->getsujet(),
				'contact' => $reclamation->getcontact(),
                'description' => $reclamation->getdescription(),
				'date_creation' => $reclamation->getdate_creation()->format('Y/m/d'),
                'type' => $reclamation->gettype(),
				'status' => $reclamation->getstatus(),
				
			]);
		} catch (Exception $e) {
			echo 'Erreur: ' . $e->getMessage();
		}
    
	}
    function recupererReclamation($id_reclamtion)
	{
		$sql = "SELECT * from reclamation where id_reclamtion=$id_reclamtion";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$reclamation = $query->fetch();
			return $reclamation;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}


}

function modifierReclamation($reclamation, $id_reclamtion)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE reclamation SET 
                    sujet=:sujet, 
                    contact=:contact, 
					description=:description,
                    date_creation=:date_creation, 
					type=:type,
					status=:status
                   
                WHERE id_reclamtion= :id_reclamtion '
        );
        $query->execute([

            'id_reclamtion' => $reclamation->getid_reclamtion(),
				'sujet' => $reclamation->getsujet(),
				'contact' => $reclamation->getcontact(),
                'description' => $reclamation->getdescription(),
				'date_creation' => $reclamation->getdate_creation()->format('Y/m/d'),
                'type' => $reclamation->gettype(),
				'status' => $reclamation->getstatus()

           
            
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        $e->getMessage();
    
    }


}

}
?>