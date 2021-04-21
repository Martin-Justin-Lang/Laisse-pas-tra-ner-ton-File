<?php

// Je vérifie si le formulaire est soumis comme d'habitude
if($_SERVER['REQUEST_METHOD'] === "POST"){ 
    // Securité en php
    // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés (attention ce dossier doit être accessible en écriture)
    $uploadDir = './';
    // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur le poste du client (mais d'autre stratégies de nommage sont possibles)
    $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
    // Je récupère l'extension du fichier
    $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
    // Les extensions autorisées
    $extensions_ok = ['jpg','jpeg','png','webp'];
    // Le poids max géré par PHP par défaut est de 1M
    $maxFileSize = 1000000;

    
    
    // Je sécurise et effectue mes tests

    /****** Si l'extension est autorisée *************/
    if( (!in_array($extension, $extensions_ok ))){
        $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
    }

    /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
    if( file_exists($_FILES['avatar']['tmp_name']) && filesize($_FILES['avatar']['tmp_name']) > $maxFileSize)
    {
    $errors[] = "Votre fichier doit faire moins de 1M !";
    }

    printf("uniqid(): %s\r\n", uniqid());
    var_dump($_FILES); 


    echo "<img src='$uploadFile'>";


    /****** Si je n'ai pas d"erreur alors j'upload *************/
   /**
        TON SCRIPT D'UPLOAD
 */
}

if ( isset( $_POST['submit'] ) ) {
    /* récupérer les données du formulaire en utilisant
       la valeur des attributs name comme clé
      */

    $nom = $_POST['Nom'];
    $prenom = $_POST['Prénom'];
    $age = $_POST['Age'];
    // afficher le résultat
    echo '<h3>Informations récupérées</h3>';
    echo 'Nom : ' . $nom . ' Age : ' . $age . ' Prénom : ' . $prenom;
    exit;

}

?>

<h1> Quête File </h1>

<form method="post" enctype="multipart/form-data">
    <label for="imageUpload">Upload an profile image</label><br>   
    <input type="file" name="avatar" id="imageUpload" /><br>
    <input type="text" name="Nom" palceholder="Nom" class="champ">Nom<imput/><br>
    <input type="text" name="Prénom" palceholder="Prénom" class="champ">Prénom<imput/><br>
    <input type="number" name="Age" palceholder="Age" class="champ">Age<imput/><br>

    <button name="send">Send</button>
</form>


