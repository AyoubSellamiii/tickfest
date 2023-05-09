<?php
require_once '..\..\config.php';
require_once '..\..\Model\Event.php';

class EventC
{
    
    public function listEvent()
    {
        $sql = "SELECT * FROM events";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql)->fetchAll();
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getEventbyCode($code)
    {
        $requete = "select * from events where code =:code";
        $config = config::getConnexion();
        try {
            $querry = $config->prepare($requete);
            $querry->execute(
                [
                    'code'=>$code
                ]
            );
            $result = $querry->fetch();
            return $result ;
        } catch (PDOException $th) {
             $th->getMessage();
        }
    }

    function deleteEvent($code)
    {
        $sql = "DELETE FROM events WHERE code = :code";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':code', $code);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function showEvent($code)
    {
        $sql = "SELECT * from events where code = $code";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $user = $query->fetch();
            return $user;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    //updateEvent And add Event are yet to be developped

    
}