<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" action="#">
    <p>
    <label for="nomcomplet">nomcomplet</label>
    <input type="text" name="nomcomplet">
    </p>
    <p>
    <label for="login">login</label>
    <input type="text" name="login">
    </p>
    <p>
    <label for="pwd">password</label>
    <input type="password" name="pwd">
    </p>
    <select name="profil" id="profil">
        <option value="">profil</option>
        <option value="agent">agent</option>
        <option value="admin">admin</option>
    </select>

    <input type="submit" value="CONNEXION" name="CONNEXION">
    </form>

    <br/>
            <br/>
            <br/>
                <!-- Formulaire actDesact -->
            <form action="#" method="post">
                Numéro pièce :
                <input type="text"    name="pwd"> <br/>
                <select name="netat" id="netat">
                    <option value="">Etat</option>
                    <option value="0">Activer</option>
                    <option value="1">Désactiver</option>
                </select>
                <input type="submit" name="changer" value="Changer">
            </form>

</body>
</html>
<?php
if(isset($_POST['changer']))
                {
                    extract($_POST);
                    require_once('utilisateur.php');
                    $chang = new location\dao\Utilisateur();
                    $verif = $chang->actDesact($NumCNI, $Netat);
                    $donnees = $chang->listUser();
                    ?>
                    <table border="2">
                        <tr>
                            <td>id</td><td>Nom</td><td>Numéro pièce</td><td>Login</td><td>Profil</td><td>Etat</td>
                        </tr>
<?php
if(isset( $_POST['CONNEXION'])){
    extract($_POST);
    require_once ("index.php");
    $util = new location\dao\Utilisateur();
    $util->nomcomplet= $nomcomplet;
    $util->login= $login;
    $util->pwd= $pwd;
    $util->profil= $profil;
    $util->addUtilisateur();
    echo 'cest fait';
    $data=$util->listutilisateur();
?>
<table border='2'>
<tr>
    <td>id</td><td>nomcomplet</td><td>login</td><td>profil</td><td>etat</td>
</tr>
<?php
while($row = $data->fetch()){
?>
<tr>
    <th> <?php echo $row['id']?> </th>
    <th> <?php echo $row['nomcomplet']?> </th>
    <th> <?php echo $row['login']?> </th>
    <th> <?php echo $row['profil']?> </th>
    <th> <?php echo $row['etat']?> </th>
</tr>
<?php
}
?>
</table>
<?php
}
?>