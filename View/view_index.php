<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<link rel="stylesheet" href="general.css" />
<html>
    <head>
        <meta charset="UTF-8">
        <title>TP 1</title>
    </head>
    <body>
        <h1 class="Titre">Formulaire</h1>
        
        <?php
        // Si l'erreur existe on l'affiche'
        if (isset($TabErreur['Nom']) == TRUE)
        {
            echo '<p class="error">' , $TabErreur['Nom'] , '</p>';
        }
        ?>
        
        <form method="post" action="index.php" enctype="multipart/form-data">
            <!-- Nom -->
            <div>Nom : <input type="text" name="Nom" <?php if(isset($nom)) echo 'value="'.$nom.'"'; ?>/></div>
            <!-- Prénom -->
            <div>Prénom  : <input type="text" name="Prenom" <?php if(isset($prenom)) echo 'value="'.$prenom.'"'; ?>/></div>
            <!-- Année de naissance -->
            <div>
                Année de naissance :
                <select name="anne_naissance" ng-selected="if ($_POST['anne_naissance'] != ' ') this.value=this.oldvalue">
                    <option value=""> </option>';
                    <option value="1990"> 1990 </option>';
                    <option value="1991"> 1991 </option>';
                    <option value="1992"> 1992 </option>';
                    <option value="1993"> 1993 </option>';
                    <option value="1994"> 1994 </option>';
                </select>
            </div>
            <!-- Mot de passe -->
            <div>
                Mot de passe : <input type="password" name="mdp" <?php if(isset($motDePasse)) echo 'value="'.$motDePasse.'"'; ?>/>
            </div>
            <!-- Mot de passe bis -->
            <div>
                Confirmer mdp : <input type="password" name="mdpBis" <?php if(isset($motDePasseBis)) echo 'value="'.$motDePasseBis.'"'; ?>/>
            </div>
            <!-- Bouton radio sexe -->
            <div>
               Sexe : 
               Homme<input type="radio" name="Sexe" value="Homme" /> 
               Femme<input type="radio" name="Sexe" value="Femme" />
            </div>
            <!-- Checkbox -->
            <div>
                Comment te définirais tu : <br/>
                Balèze<input type="checkbox" name="perso[]" value="fort"/>
                Beau gosse<input type="checkbox" name="perso[]" value="beau"/>
                Nain<input type="checkbox" name="perso[]" value="petit"/>
                Grande perche<input type="checkbox" name="perso[]" value="grand"/>
            </div>
            <!-- Zone de texte : description -->
            <div>
                Description : <br/>
                <textarea name="Description" cols="51" rows="10" /><?php if(isset($description)) echo $description; ?></textarea>
            </div>
            <!-- Bouton : Choix de fichier -->
            <div class="bouton">
                Image de profil :  
                <input type="file" name="file"/>
            </div>
            <!-- Bouton : Reset et valider -->
            <div class="bouton"/>
                <input type="reset" name="reset" value="Réinitialiser"/>
                <input type="submit" name="valider" value="Envoyer"/>
            </div>
        </form>
        
           

    </body>
</html>