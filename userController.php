<?php
require __DIR__.'/../config.php';

class UserController{

    public function getUsers(){
        $db = config::getConnexion();
        $sql = 'SELECT * FROM user';
        try{
            $query = $db->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function addUser($User){
        $db = config::getConnexion();
        $sql = 'INSERT INTO user (email, pwd) VALUES (:email, :pwd)';
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'email' =>$User['email'],
                'pwd' =>$User['pwd']
            ]);
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function deleteUser($id){
        $db = config::getConnexion();
        $sql = 'DELETE FROM user WHERE id = :id';
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'id' => $id
            ]);
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    public function updateUser($User){
        $db = config::getConnexion();
        $sql = 'UPDATE user SET email = :email, pwd = :pwd WHERE id = :id';
        try{
            $query = $db->prepare($sql);
            $query->execute([
                'id' =>$User['id'],
                'email' =>$User['email'],
                'pwd' =>$User['pwd']
            ]);
        }
        catch(Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}