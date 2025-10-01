<?php

try {
    $pdo = new PDO("mysql:host=localhost;dbname=moduleconnexion", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connexion réussie !";
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$sql = "SELECT * from utilisateurs";
$my_database = $pdo->query($sql);

//const vars
$login = "login";
$nom = "nom";
$prenom = "prenom";
$pass = "pass";
$inscription = "inscription";

//Prend les informations de la base de données pour les mettre dans une var php
function getDatabase($database)
{
    global $login, $prenom, $nom, $pass;

    $table_test = [];

    while ($row = $database->fetch(PDO::FETCH_ASSOC)) {
        $table_test[] = [
            $login => $row['login'],
            $prenom => $row['prenom'],
            $nom => $row['nom'],
            $pass => $row['password']
        ];
    }

    return $table_test;
}

//sauvegarde les données dans une session
function save_in_Session($user_login, $user_prenom, $user_nom, $user_pass)
{
    global $login, $prenom, $nom, $pass;

    $session = [
        $login => $user_login,
        $prenom => $user_prenom,
        $nom => $user_nom,
        $pass => $user_pass
    ];

    echo "Hello this is the save session function! here is my data: ", "<br>";
    print_r($session);
    echo "<br>", "DONE!", "<br>";
    return $session;
}

//Check si utilisateur existe dans la base de donnée lorsqu'il essaye de s'inscrire
function is_userExists($database, $session)
{
    global $login, $prenom, $nom;

    foreach ($database as $user) {
        if (
            strtolower($user[$login]) == strtolower($session[$login])
            and strtolower($user[$prenom]) == strtolower($session[$prenom])
            and strtolower($user[$nom]) == strtolower($session[$nom])
        ) {
            return true;
        }
    }
    return false;
}

//Check si utilisateur a son login déjà utilisé lors de l'inscription
function is_usernameTaken($database, $username)
{
    global $login;

    foreach ($database as $user) {
        if (strtolower($user[$login]) == strtolower($username)) {
            return true;
        }
    }
    return false;
}

//Prend le mdp de l'user
function getPass($database, $username)
{
    global $login, $pass;
    foreach ($database as $user) {
        if (strtolower($user[$login]) == strtolower($username)) {
            return $user[$pass];
        }
    }
}

//Check si mot de passe est correct
function is_passCorrect($password, $database_pass)
{
    if ($password == $database_pass) {
        return true;
    }
    return false;
}

//Cookie facile
/**
 * Rend la création de cookie plus simple.
 * @param mixed $name Nom du cookie
 * @param mixed $value Valeur du cookie
 * @param float $time OPTIONEL. Combien de temps le cookie reste valide. (défaut = 5000)
 */
function easyCookie($name, $value, $time = 5000)
{
    $_COOKIE[$name] = $value;
    setcookie($name, $value, $time);
}

//Destruction de cookie!!
/**
 * Permet de détruire un cookie facilement
 * @param mixed $cookie Nom du cookie à tuer
 */
function killCookie($cookie)
{
    setcookie($cookie, "", -1);
}

//tableau de la base en php
$php_database = getDatabase($my_database);
