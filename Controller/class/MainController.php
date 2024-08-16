<?php
// require "../database/connexion.php";

class MainController{

    public $connexion;
    public $password = "";
    public $username ="root";
    public $database ="school";
    public $serveur ="localhost";

    // la connexion à la base de donnée
    public function __construct()
    {
        $this->connexion = new PDO("mysql:host=$this->serveur;dbname=$this->database",$this->username,$this->password);


    }

    // la récupération de toutes les recettes dans le sytème.
    public function classes()
    {
       $request = $this->connexion->prepare("SELECT * FROM classes");
        $request->execute();
        $classes = $request->fetchAll(PDO::FETCH_ASSOC);
       return $classes;
    }
    // la récupération de toutes les recettes dans le sytème.
    public function platsAutres()
    {
       $request = $this->connexion->prepare("SELECT * FROM plats limit 8,16");
        $request->execute();
        $allPlats = $request->fetchAll(PDO::FETCH_ASSOC);
       return $allPlats;
    }

    // la récupération de tous les utilisateurs.
    public function allUsers()
    {
       $request = $this->connexion->prepare("SELECT * FROM users");
        $request->execute();
        $users = $request->fetchAll(PDO::FETCH_ASSOC);
       return $users;
    }


    // l'enregistrement dans le système
    public function register($nom,$email,$password)
    {
       
       try{
        session_start();
        if(strlen($password) > 6){

            $request= $this->connexion->prepare("INSERT INTO users(nom,email,password)  VALUES (:nom, :email, :password)");
            $user= $request->execute([
                'nom'=>$nom,
                'email'=>$email,
                'password'=>md5($password)
            ]);
            if(!$user){
                return $_SESSION['error'] = "Rassurrez-vous l'email n'existe pas dans le système 🙄";

            }
        }else{
            return $_SESSION['error'] = "votre mot de passe est trop court taille minimum 6 caractères😥";
        }

       
        
        if($user){ 

            $this->login($email,$password);
        
        }else{
            return $_SESSION['error'] = "Vos informations ne sont pas compatible pour l'enregistrement 😥";
        }
       }catch(PDOException $e){
        return $_SESSION['error'] = "Vos informations ne sont pas compatible pour l'enregistrement 😥";
       
       }
       
    }

    //  la connexion au système
    public function login($email, $password)
    {
            
        try{
            $request  = $this->connexion->prepare("SELECT * FROM users WHERE email=:email and password=:password");
            
            $request->execute([
                'email' => $email,
                'password'=> md5($password)
            ]);
            $user = $request->fetch(PDO::FETCH_ASSOC);

            session_start();
            
            if($user){ 

    
                $_SESSION['user'] = $user;
                
        
                header("Location:"."../index.php");
            }else{
                $_SESSION['error'] = "Vos informations ne sont pas correctent 😥";
            }

        }catch(PDOException $e){
            echo "error de connexion".$e->getMessage();
        }
        
    }


    // la récupération de tous les plats
    public function getPlat($id)
    {
        $request= $this->connexion->prepare('SELECT * FROM plats where id=:id');
       $request->execute([
        'id'=>$id
       ]);
       $plat = $request->fetch(PDO::FETCH_ASSOC);
        return $plat;
    }
    // la récupération d'un utilisateur
    public function getUser($id)
    {
        $request= $this->connexion->prepare('SELECT * FROM users where id=:id');
       $request->execute([
        'id'=>$id
       ]);
       $user = $request->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    // l'envoie d'un contact
    public function contact($iduser,$subject,$content)
    {
        try{
            if(session_status() === PHP_SESSION_NONE) session_start();

            if(!empty($subject) and !empty($content)){ 
                $request= $this->connexion->prepare("INSERT INTO contacts(id_user,subject,content) VALUES (:id_user,:subject,:content)");
                $contact= $request->execute([
                
                    'id_user'=>$iduser,
                    'subject'=>$subject,
                    'content'=>$content
                ]);

               return true;
                
            }
            
            
    
           }catch(PDOException $e){
            return "error lors de l'envoie du contact".$e->getMessage();
           }
    }

    // reserve une place
    public function reserve($id_user,$id_plat,$content,$date,$time)
    {
        $request =$this->connexion->prepare("INSERT INTO reservations(id_user,id_plat,content,date,time) values (:id_user,:id_plat,:content,:date,:time)");
        $reservation = $request->execute([
            'id_user'=>$id_user,
            'id_plat'=>$id_plat,
            'content'=>$content,
            'date'=>$date,
            'time'=>$time
        ]);

        if($reservation){
            session_start();

            return $_SESSION['message'] = "Réservation placée avec succès";
        }else{
            return $_SESSION['message'] = "impossible de placée cette réservation avec succès";

        }
        
    }

    // Prendre les reservations
    public function reservationPlaces()
    {
        $request = $this->connexion->prepare('SELECT distinct p.photo_path as photo_path,r.date as date, r.time as time, r.content as content,u.nom as user,p.nom as plat from reservations as r inner join users as u on r.id_user=u.id inner join plats as p on p.id=r.id_plat');

        
        $request->execute();
        $userPlace = $request->fetchAll(PDO::FETCH_ASSOC);
        return $userPlace;
    }
  
    // prendre les appreciation 
    public function appreciationsClient()
    {
        $request = $this->connexion->prepare("SELECT * FROM contacts as c inner join users as u on u.id = c.id_user");
        $request->execute();
        $comments = $request->fetchAll();

        return $comments;
    }

}


?>