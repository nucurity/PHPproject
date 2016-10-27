<?php
require_once ('database/database.php');
class Dboperations
{

    public static $userId;
    public static $firstName;
    public static $lastName;
    public static $email;
    public static $phone;
    public static $status;
    public static $dateCreated;

    public static $logId;
    public static $userName;
    public static $userPassword;

    public static function SetNewUser($email, $firstName, $lastName, $phone, $userpassword)
    {
        $db = Database::getDB();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $date = getdate();
        $dateCreated = $date['year'] . '-' . $date['mon'] . '-' . $date['mday'] . ' ' . $date['hours'] . ':' . $date['minutes'] . ':' . $date['seconds'];
        $query = 'INSERT INTO userInfo
                 (firstName, lastName, email, phone, dateCreated)
              VALUES
                 (:firstName, :lastName, :email, :phone, :dateCreated)';
        $statement = $db->prepare($query);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':dateCreated', $dateCreated);
        $statement->execute();
        $statement->closeCursor();

        $query = 'SELECT DISTINCT userId FROM userinfo WHERE email = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email,PDO::PARAM_STR);
        $statement->execute();
        $userId = $statement->fetchAll();
        $statement->closeCursor();

        $query = 'INSERT INTO userlogin
                 (userId, username, userpass)
              VALUES
                 (:userId, :email, :userpass)';
        $statement = $db->prepare($query);
        foreach( $userId as $uid) {$id = $uid['userId'];}
        $statement->bindValue(':userId', $id);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':userpass', $userpassword);
        $statement->execute();
        $statement->closeCursor();
    }

    public static function CheckSameUser($email)
    {
        $db = Database::getDB();
        $query = 'SELECT DISTINCT email FROM userinfo';
        $statement = $db->prepare($query);
        $statement->execute();
        $arrEmail = $statement->fetchAll();
        $statement->closeCursor();

        $flag = false;

        foreach ($arrEmail as $item){
            if ($item['email'] == $email) {
                $flag = true;
                break;
            }
        }
        return $flag;
    }


    public static function CheckSameAccount($username)
    {
        $db = Database::getDB();
        $query = 'SELECT DISTINCT username FROM userlogin';
        $statement = $db->prepare($query);
        $statement->execute();
        $arrUsers = $statement->fetchAll();
        $statement->closeCursor();

        $flag = false;

        foreach ($arrUsers as $item){
            if ($item['username'] == $username) {
                $flag = true;
                break;
            }
        }
        return $flag;
    }



}