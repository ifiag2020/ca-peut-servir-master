<?php


class Idao implements Imetier
{

    public   static  $_CNX; 
    public static $table = "user";
    public const TVA = 20;
    public static  function connect()
    {



        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE =>  PDO::ERRMODE_EXCEPTION
        ];
        try {
            // self:: => access static et cte 
            if (!self::$_CNX) {
                self::$_CNX = new PDO("mysql:host=localhost;dbname=servir;", 'root', '', $options);
            }
        } catch (PDOException $e) {
            die("Erreur de connexion a la base de donnees " . $e->getMessage());
        }
    }
    public static  function store(array $data)
    {
        try {
            $keys = array_keys($data);
            $str_keys = join(",", $keys);

            $inter = function ($valeur) {
                return "?";
            };
            $in = array_map($inter, $keys);
            $p_intero = join(',', $in);
            $rp = self::$_CNX->prepare("insert into " . static::$table . " ($str_keys) values($p_intero)");
            $rp->execute(array_values($data));
        } catch (PDOException $e) {
            die("Erreur d'ajout de " . static::$table . " " . $e->getMessage());
        }
    }
    public  static  function update($data, ?int $id = 0)
    {
        // $data=['login'=>'ali','passe'=>1234]
        try {
            $keys = array_keys($data); //['login','passe]


            $inter = function ($valeur) {
                return "$valeur=?";
            };
            $in = array_map($inter, $keys); //['login','passe'] =>['login'=>'?', 'passe'=>'?']

            $p_intero = join(',', $in); //"login=?,passe=?"
            $rp = self::$_CNX->prepare("update  " . static::$table . " set $p_intero where id_" . static::$table . "=? ");
            $valeurs = array_values($data); //'ali','1234'
            $valeurs[] = $id;
            $rp->execute($valeurs);
        } catch (PDOException $e) {
            die("Erreur de modification de " . static::$table . " " . $e->getMessage());
        }
    }
    public static function all(): array
    {
        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . "  order by id_user desc ");
            // executer 
            //echo "la table est " .$table;
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute();
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }

    public static  function find(int $id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . " where  id=?  ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
    //findBy("login like ?",['ali'])
    public static  function findBy($condition, $data_values)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from " . static::$table . " where $condition order by id desc ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());

            $rp->execute($data_values);
            $result = $rp->fetchAll(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation des " . static::$table . "  " . $e->getMessage());
        }
    }
    public static  function delete($id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("delete  from " . static::$table . " where id=?");
            // executer 
            $rp->execute([$id]);
        } catch (PDOException $e) {
            die("Erreur de suppression  des " . static::$table . "  " . $e->getMessage());
        }
    }
	public static  function ConxPart($email, $pwd)
    {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from user WHERE email=? and pwd=? and `id_profile`='2'");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$email, $pwd]);
            $result = $rp->fetch(); //['email'=>a.b@c.com,'pwd'=>'xxxxx'] 
            return $result;
	}	
    public static  function ConxPro($email, $pwd)
    {
            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from user WHERE email=? and pwd=? and `id_profile`='3'");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$email, $pwd]);
            $result = $rp->fetch(); //['email'=>a.b@c.com,'pwd'=>'xxxxx'] 
            return $result;
	}
	
	 public static  function findid($nom, $nom_commerce)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT id_user from " . static::$table . " where  nom=?  or nom_commerce=?  ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$nom, $nom_commerce]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
		 public static  function findidProfil($nom, $nom_commerce)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("SELECT id_profile from " . static::$table . " where  nom=? or nom_commerce=?  ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$nom, $nom_commerce]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (findidProfil) de " . static::$table . "  " . $e->getMessage());
        }
    }
	public static  function finduser($id)
    {

        try {

            // prepare une requete sql (stmt)
            $rp = self::$_CNX->prepare("select * from user where  id_user=?  ");
            // executer 
            $rp->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, get_called_class());
            $rp->execute([$id]);

            $result = $rp->fetch(); //['id'=>10,'libelle'=>'hp'] 
            return $result;
        } catch (PDOException $e) {
            die("Erreur dre recuperation  (find) de " . static::$table . "  " . $e->getMessage());
        }
    }
	
	public static function redirect($link = ""){
		echo "<script type='text/javascript'>window.location = '".$link."';</script>";
	}
}