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
    public function options()
    {
       $request = $this->connexion->prepare("SELECT * FROM options");
        $request->execute();
        $options = $request->fetchAll(PDO::FETCH_ASSOC);
       return $options;
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
                $request= $this->connexion->prepare("INSERT INTO contacts(id_user,suject,content) VALUES (:id_user,:suject,:content)");
                $contact= $request->execute([
                
                    'id_user'=>$iduser,
                    'suject'=>$subject,
                    'content'=>$content
                ]);

               return true;
                
            }
            
            
    
           }catch(PDOException $e){
            var_dump("error lors de l'envoie du contact".$e->getMessage());
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
    //inscription
    public function inscription($form)
    {
     
        

        $nom =$form['nom'];
        $postnom =$form['postnom'];
        $prenom =$form['prenom'];
        $lieu_nais =$form['lieu_nais'];
        $date_nais =$form['date_nais'];
        $adresse =$form['adresse'];
        $an_ecole =$form['ancienne_ecole'];
       $certificat=self::setMedia($_FILES);
     
        $genre =$form['genre'];
        $nationalite =$form['nationalite'];
        $tel =$form['tel'];
        $responsable =$form['responsable'];
        $id_classe =(int)$form['classe'];
        $id_option =(int)$form['option'];
        
        
        try{

            $request = $this->connexion->prepare("INSERT INTO eleves(nom,postnom,prenom,lieu_nais,date_nais,genre,nationalite,responsable,ancienne_ecole,certificat,tel,adresse,id_class,id_option)
             VALUES (:nom,:postnom,:prenom,:lieu_nais,:date_nais,:genre,:nationalite,:responsable,:ancienne_ecole,:certificat,:tel,:adresse,:id_class,:id_option)");
            $request->execute([
                'nom'=>$nom,
                'postnom'=>$postnom,
                'prenom'=>$prenom,
                'lieu_nais'=>$lieu_nais,
                'date_nais'=>$date_nais,
                'genre'=>$genre,
                'nationalite'=>$nationalite,
                'responsable'=>$responsable,
                'ancienne_ecole'=>$an_ecole,
                'certificat'=>$certificat,
                'tel'=>$tel,
                'adresse'=>$adresse,
                'id_class'=>$id_classe,
                'id_option'=>$id_option
            ]);
            $_SESSION['eleve']=$this->connexion->lastInsertId();
          
        }catch(PDOException $e)
        {
            var_dump("error".$e->getMessage());
        }

       

    }
    private function setMedia($path)
    {
        if ($path['certificat']['error'] == 0) {
            $pathInfo = pathinfo($_FILES['certificat']['name']);
           
            $extension = $pathInfo['extension'];

            $extensionAutorisees = ['docx', 'doc', 'pdf'];

            if (in_array($extension, $extensionAutorisees)) {
                if (file_exists('certificats')) {
                    move_uploaded_file($_FILES['certificat']['tmp_name'], 'certificats' . DIRECTORY_SEPARATOR . basename($path['certificat']['name']));
                    $photoPath = "certificats" . DIRECTORY_SEPARATOR . $path['certificat']['name'];

                    return $photoPath;
                } else {
                    mkdir('certificats');
                    move_uploaded_file($_FILES['certificat']['tmp_name'], 'certificats' . DIRECTORY_SEPARATOR . basename($path['certificat']['name']));
                    $photoPath = "certificats" . DIRECTORY_SEPARATOR . $path['certificat']['name'];

                    return $photoPath;
                }
            } else {
                echo '<script>alert("Les documents du texte uniquement")</script>';
            }
        }
    }
    private function setDocument($id)
    {
        if ($_FILES[$id]['error'] == 0) {
            $pathInfo = pathinfo($_FILES[$id]['name']);
            $extension = $pathInfo['extension'];

            $extensionAutorisees = ['doc', 'docx', 'pdf'];

            if (in_array($extension, $extensionAutorisees)) {
                if (file_exists('Bulletins')) {
                    move_uploaded_file($_FILES[$id]['tmp_name'], 'Bulletins' . DIRECTORY_SEPARATOR . basename($_FILES[$id]['name']));
                    $photoPath = "Bulletins" . DIRECTORY_SEPARATOR . $_FILES[$id]['name'];

                    return $photoPath;
                } else {
                    mkdir('Bulletins');
                    move_uploaded_file($_FILES[$id]['tmp_name'], 'Bulletins' . DIRECTORY_SEPARATOR . basename($_FILES[$id]['name']));
                    $photoPath = "Bulletins" . DIRECTORY_SEPARATOR . $_FILES[$id]['name'];

                    return $photoPath;
                }
            } else {
                echo '<script>alert("Les photos uniquement")</script>';
            }
          
        }
    }

    public function insertDocuments()
    {
        $i = 0;
        $id_user = $_SESSION['user']['id'];
        $id_eleve =$_SESSION['eleve'] ?? 0;
        $class = ['7','8','1','2','3','4'];
        while($i < 5):
            $path =self::setDocument($class[$i]);
            if(!empty($path)){
                try{

                    $request = $this->connexion->prepare('INSERT INTO documents(id_user,id_eleve,doc_path) VALUES (:id_user,:id_eleve,:doc_path)');
                    $request->execute([
                        'id_user'=>$id_user,
                        'id_eleve'=>$id_eleve,
                        'doc_path'=>$path
                    ]);
                    $_SESSION['info']="ok";
                }catch(PDOException $e)
                {
                    var_dump("error".$e->getMessage());
                }
            }
        $i +=1; 
        endwhile;
    }

    public function allEleves()
    {
        try{
            $request = $this->connexion->prepare('SELECT e.*,o.nom as options,c.nom as classe FROM eleves as e inner join classes as c on c.id=e.id_class inner join options as o on o.id=e.id_option');
            $request->execute();
           $elseInfo = $request->fetchAll(PDO::FETCH_ASSOC);
           return $elseInfo;
        }catch(PDOException $e)
        {
            var_dump('error'.$e->getMessage());
        }
      
    }
    public function eleveInformation($id_eleve)
    {
        $request = $this->connexion->prepare('SELECT e.*,o.nom as options,c.nom as classe FROM eleves as e inner join options as o on o.id=e.id_option inner join classes as c on c.id=e.id_class inner join documents as d on d.id_eleve = e.id where e.id=:id');
        $request->execute([
            'id'=>$id_eleve
        ]);
        $allInformation=$request->fetch(PDO::FETCH_ASSOC);
        return  $allInformation ;
    }
    public  function ElevesBySearch($array)
    {
        $search = $array;
        try{
            $request = $this->connexion->prepare('SELECT e.*,o.nom as options,c.nom as classe FROM eleves as e inner join classes as c on c.id=e.id_class inner join options as o on o.id=e.id_option where e.nom LIKE :nom');
            $request->execute([
                'nom'=>'%'.$search.'%',
            ]);
           $userInfo = $request->fetchAll(PDO::FETCH_ASSOC);
           return $userInfo;
        }catch(PDOException $e)
        {
            var_dump('error'.$e->getMessage());
        }
    }

    public function getDocument($id_eleve)
    {
        try{

            $request = $this->connexion->prepare("SELECT * FROM documents where id_eleve =:id_eleve");
            $request->execute([
                'id_eleve'=>$id_eleve
            ]);
            $documents = $request->fetchAll(PDO::FETCH_ASSOC);
            return $documents;
        }catch(PDOException $e)
        {
            var_dump($e->getMessage());
        }
    }
}



?>