<?php
if(session_status() === PHP_SESSION_NONE) session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Se Connecter/S'inscrire</title>

    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
</head>

<body>
    <div class="login-container">
        <?php if(isset($_SESSION['error'])):?>
        <span style="background-color:#c66205; text-color:white; padding:10px; border-raduis:10px">  <?=$_SESSION['error']?></span>
       <?php endif ?>
        <div class="login-form" id="loginForm">
            <h1>Se connecter</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class='bx bxl-google-plus'></i></a>
                <a href="#" class="icon"><i class='bx bxl-facebook'></i></a>
                <a href="#" class="icon"><i class='bx bxl-github'></i></a>
                <a href="#" class="icon"><i class='bx bxl-linkedin'></i></a>
            </div>

            <div class="form-message-container">
                <span>Ou utilisez votre addresse email ou mot de passe</span>
            </div>

            <form action="process.php" method="post">
                <input type="email" name="email" placeholder="Email" required >
                <input type="password" name="password" placeholder="Mot de passe" required >
                <button type="submit" name="login">Se connecter</button>
                <a href="#">Mot de Passe Oublié?</a>
            </form>
            <p>Vous n'avez pas de compte? <a href="#" id="showSignup">S'inscrire</a></p>
        </div>
        <div class="signup-form hidden" id="signupForm">
            <h1>Créer un compte</h1>
            <div class="social-icons">
                <a href="#" class="icon"><i class='bx bxl-google-plus'></i></a>
                <a href="#" class="icon"><i class='bx bxl-facebook'></i></a>
                <a href="#" class="icon"><i class='bx bxl-github'></i></a>
                <a href="#" class="icon"><i class='bx bxl-linkedin'></i></a>
            </div>
            <div class="form-message-container">
                <span>Utilisez votre email pour vous inscrire</span>
            </div>

            <form action="process.php" method="post">
                <input type="text" name="name" placeholder="Nom" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Mot de Passe" required>
                <button type="submit" name="signup">S'inscrire</button>
            </form>
            <p>Vous avez déjà un compte? <a href="#" id="showLogin">Se connecter</a></p>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>
<style>
    body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    background: url(bgf.jpg) no-repeat;
    background-size: cover;
    background-position: center;
}
button {
    background-color: #c66205;
    color: white;
    border: none;
    cursor: pointer;
    transition: 0.4s ease ease-in-out;
   
}

button:hover {
    background-color: #c04b0c;
}
</style>
