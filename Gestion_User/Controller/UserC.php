<?php
require_once '..\..\config.php';
require_once '..\..\Model\User.php';

class UserC
{

    public function listUser()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function getuserbyID($id)
    {
        $requete = "select * from user where id =:id";
        $config = config::getConnexion();
        try {
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

    function deleteUser($ide)
    {
        $sql = "DELETE FROM user WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        

        try {
            $req->execute(
                [
                    'id'=>$ide
                ]
            );
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function register($User)
    {
        $config = config::getConnexion();
            try {
                $querry = $config->prepare('
                INSERT INTO user
                (login,email,ddn ,img, pswd,date_creation,role )
                VALUES
                (:login,:email,:ddn,:img,:pswd,:date_c,:role)
                ');
                
               $rs=$querry->execute([
                    
                'login' => $User->getLogin(),
                'email' => $User->getEmail(),
                'ddn' => $User->getDdn()->format('Y-m-d'),
                'img' => $User->getImg(),
                'pswd' => $User->getPswd(),
                'date_c'=>$User->getDate_creation()->format('Y-m-d H:i:s'),
                'role'=>$User->getRole()
                   
                    
                   
                ]);
                if ($rs) {
                    echo "Poste Created";
                }
                else {
                    echo "ERROR";
                }
            } catch (PDOException $th) {
                 $th->getMessage();
            }
        }


    function showUser($id)
    {
        $sql = "SELECT * from user where id = $id";
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

    function updatLogin($id,$login)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    login = :login
                  
                WHERE id = :id '
            );
            $query->execute([
                'id' => $id,
                'login' => $login ]);
                
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    function updateEmail($id,$email)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    email = :email
                  
                WHERE id = :id '
            );
            $query->execute([
                'id' => $id,
                'email' => $email ]);
                
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function updateDate($id,$ddn)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    ddn = :ddn
                  
                WHERE id = :id '
            );
            $query->execute([
                'id' => $id,
                'ddn' => $ddn->format('Y-m-d') ]);
                
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function updateImg($id,$img)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    img = :img
                  
                WHERE id = :id '
            );
            $query->execute([
                'id' => $id,
                'img' => $img ]);
                
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function updatePass($id,$pass)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    pswd = :pswd
                  
                WHERE id = :id '
            );
            $query->execute([
                'id' => $id,
                'pswd' => $pass ]);
                
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function connexionUser($email,$password)
    {

        $db=config::getConnexion();
        $sql="SELECT * FROM user WHERE email='". $email ."' AND pswd='". $password. "'";
        try{
            $query=$db->prepare($sql);
            $query->execute();
            $count=$query->rowCount();
            $result = $query->fetch(PDO::FETCH_OBJ);
            if($count==0)
            {
                $message="verifier donnees login";
            }
            else{
                
                
                $x=$query->fetch();
                $message=$x['email'];
                $_SESSION['id'] = $result->id ;
                $_SESSION['login'] = $result->login ;
                $_SESSION['img'] = $result->img ;
                $_SESSION['ddn'] = $result->ddn ;
                $_SESSION['pswd'] = $result->pswd ;
                $_SESSION['email'] = $result->email ;
                $_SESSION['role']=$result->role;
					echo "$message";

            }


        }
        catch (Exception $e)
				{
					$message= " ".$e->getMessage();
				}

			return $message;


    }
    function Recherche($search)
        {
            $requete = "select * from user  WHERE login LIKE '%$search%'";
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
}