<?php

require_once '..\..\config.php';
require_once '..\..\Model\Commande.php';


class CommandeC
{
    

    public function listCommande()
    {
        $sql = "SELECT * FROM commande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql)->fetchAll();
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getCommandesbyUser($iduser)
    {
        $requete = "select * from commande where id_user =:id_user";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id_user'=>$iduser
                ]
            );
            $result = $querry->fetchALL();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }


    public function getusercommandepromotion($iduser){
 
        $promoprcentage=0;


        if($commandes_user=$this->getCommandesbyUser($iduser)){
            $totalcommandesprice=0;
            foreach ($commandes_user as  $commande) {
                $totalcommandesprice+=$commande['total_after_promotion'];
            }
           // var_dump($totalcommandesprice);die();
            if($totalcommandesprice<1000 ){
                $promoprcentage=0.2;
            }elseif($totalcommandesprice >=1000 && $totalcommandesprice< 5000){
                $promoprcentage=0.3;
            }else{
                $promoprcentage=0.4;
            }
        }
        return $promoprcentage;
          

    }

    public function savecommandedetail($iduser,$detailscommande,$total){

        $config = config::getConnexion();
        $total=str_replace(',','',$total);  
        $total=str_replace('.','',$total);       
        $total=floatval( $total);
       
        $total_after_promotion=$total;
        $promotion=$this->getusercommandepromotion($iduser);
         

        if( $promotion > 0 ){
            
            
            $total_after_promotion=$total*(1-$promotion);         
            
        }
        
        $datetime = date('Y-m-d H:i:s');

        
        $idcommande=0;
        try {
            $querry = $config->prepare('
            INSERT INTO commande
            (total,total_after_promotion,id_user ,created_at)
            VALUES
            (:total,:total_after_promotion,:id_user,:created_at)
            ');
            
            $rs=$querry->execute([             
            'total' => $total,
            'total_after_promotion' => $total_after_promotion,
            'id_user' => intval($iduser),
            'created_at'=>$datetime          
                
            ]);
            if ($rs) {

                $idcommande=$config->lastInsertId();


                foreach ($detailscommande as $detail) {
                    
                    $querry = $config->prepare('
                    INSERT INTO commande_events
                    (id_commande,id_event,quantity_event )
                    VALUES
                    (:id_commande,:id_event,:quantity_event)
                    ');
                    
                    $rs=$querry->execute([                       
                    'id_commande' => $idcommande,
                    'id_event' => $detail['id'],
                    'quantity_event' => $detail['quantity'],            
                        
                    ]);
                   
                }

               return  $idcommande;
                            

            }
            else {
                echo "ERROR";
            }
        } catch (PDOException $th) {
                $th->getMessage();
        }
    }

    function getCommandeDetailsbyId($id)
    {
        
        try {
            $config = config::getConnexion();
            $requete = "select * from commande where id =:id";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id'=>$id
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

    function deleteCommande($id)
    {
        
        $config = config::getConnexion();
        try {
            //delete commande 
            $requete = "DELETE FROM commande WHERE id=:id";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id'=>$id
                ]
            );

            //delete commande events
            $requete = "DELETE FROM commande_events WHERE id_commande=:id";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id'=>$id
                ]
            );
            return true;

        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
   
    function updateCommandeOldEvent($id_event,$id_commande,$quantity,$price,$name){
        $config = config::getConnexion();
        try {
            //delete commande 
            $requete = "UPDATE commande_events SET quantity_event = :quantity_event WHERE id_event = :id_event AND id_commande =:id_commande";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'quantity_event'=>$quantity,
                    'id_event'=>$id_event,
                    'id_commande'=>$id_commande
                ]
            );

            //update existing events
            $requete = "UPDATE events  SET name = :name,price= :price WHERE id = :id_event ";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'price'=>$price,
                    'name'=>$name,
                    'id_event'=>$id_event
                ]
            );
            return true;

        } catch (PDOException $th) {
             $th->getMessage();
        }


    }

    function addCommandeNewEvent($id_commande,$quantity_event,$price_event,$name_event){

   
        $config = config::getConnexion();
        try {            

            $querry = $config->prepare('
            INSERT INTO events
            (name,price)
            VALUES
            (:name,:price)
            ');

            $querry->execute([

                
                'name' => $name_event,
                'price' =>$price_event            
                    
            ]);

            $id_event=$config->lastInsertId();

            $querry = $config->prepare('
            INSERT INTO commande_events
            (id_commande,id_event,quantity_event )
            VALUES
            (:id_commande,:id_event,:quantity_event)
            ');
            
            $querry->execute([                       
            'id_commande' => $id_commande,
            'id_event' => $id_event,
            'quantity_event' =>$quantity_event,            
                
            ]);


           

           return true;
        
        } catch (PDOException $th) {
            $th->getMessage();
       }

    }

    function updateCommandeprice($newtotal,$icommande){

        $config = config::getConnexion();
        try {
            //delete commande 
            $requete = "UPDATE commande_events SET total = :newtotal,total_after_promotion=:newtotal WHERE id = :icommande AND id_commande =:id_commande";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id'=>$icommande,
                    'newtotal'=>$newtotal                  
                    
                ]
            );

          
            return true;

        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
    function updateCommandeUser($id_user,$login,$email){
        $config = config::getConnexion();
        try {
            //delete commande 
            $requete = "UPDATE  user SET login = :login ,email = :email WHERE id = :id_user ";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id_user'=>$id_user,
                    'login'=>$login,
                    'email'=>$email                   
                ]
            );

           
            return true;

        } catch (PDOException $th) {
             $th->getMessage();
        }
    }
   function getCommandeEventsbyId($id){
    $result=array();
    try {
        $config = config::getConnexion();

        $requete = "select * from commande_events where id_commande =:id";
        $querry = $config->prepare($requete);
        $querry->execute(
            [
                'id'=>$id
            ]
        );
        $rs = $querry->fetchALL();
        foreach ($rs as $item) {
            
            $requete = "select * from events where id =:id_event";
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'id_event'=>$item['id_event']
                ]
            );
            $event_detail = $querry->fetch();
            $result[$item['id']]=array_merge($event_detail,$item);
        }
        return $result;
       

    } catch (PDOException $th) {
         $th->getMessage();
    }

   }


   
    
}