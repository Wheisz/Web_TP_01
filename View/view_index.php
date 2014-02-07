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
        
        
        
        <form method="post" action="index.php" enctype="multipart/form-data">
            <!-- Nom -->
            <div>                
                <!-- Affichage de l'erreur + restauration -->
                <?php
                    // Si l'erreur existe on l'affiche
                    if (isset($TabErreur['Nom']) == TRUE)
                    {
                        echo '<p class="error">' , $TabErreur['Nom'] , '</p>';
                    }
                    ?>
                <label for="Nom">Nom :</label>
                <?php GetInput( 'text' , 'Nom'); ?>      
            </div>
            <!-- Prénom -->
            <div>                
                <!-- Affichage de l'erreur + restauration -->
                <?php
                    // Si l'erreur existe on l'affiche
                    if (isset($TabErreur['Prenom']) == TRUE)
                    {
                        echo '<p class="error">' , $TabErreur['Prenom'] , '</p>';
                    }
                    ?>
                <label for="Prenom">Prénom :</label>
                <?php GetInput('text', 'Prenom'); ?> 
            </div>
            <!-- Année de naissance -->
            <div>
                <?php                     
                // Si l'erreur existe on l'affiche
                if (isset($TabErreur['anne_naissance']) == TRUE)
                {
                    echo '<p class="error">' , $TabErreur['anne_naissance'] , '</p>';
                } ?>
                <label for="anne_naissance">Année de naissance :</label>                
                <select name="anne_naissance" id="anne_naissance">
                    <option></option>';
                    <?php ListeDeroul(); ?>
                </select>
            </div>
            <!-- Mot de passe -->
            <div>                
                <!-- Affichage de l'erreur -->
                <?php                     
                    // Si l'erreur existe on l'affiche
                    if (isset($TabErreur['mdp']) == TRUE)
                    {
                        echo '<p class="error">' , $TabErreur['mdp'] , '</p>';
                    } ?>
                <label for="mdp">Mot de passe :</label>
                <input type="password" name="mdp" id="mdp"/>
            </div>
            <!-- Mot de passe bis -->
            <div>                 
                <!-- Affichage de l'erreur -->
                <?php                     
                    // Si l'erreur existe on l'affiche
                    if (isset($TabErreur['mdpBis']) == TRUE)
                    {
                        echo '<p class="error">' , $TabErreur['mdpBis'] , '</p>';
                    } ?>
                <label for="mdpBis">Confirmer mdp :</label>
                <input type="password" name="mdpBis" id="mdpBis"/>
            </div>
            <!-- Bouton radio sexe -->
            <div>                
                <!-- Affichage de l'erreur + restauration -->
                <?php                     
                    // Si l'erreur existe on l'affiche
                    if (isset($TabErreur['Sexe']) == TRUE)
                    {
                        echo '<p class="error">' , $TabErreur['Sexe'] , '</p>';
                    } ?>
                Sexe :
               <label for="Homme">Homme</label>
               <input type="radio" name="Sexe" value="Homme" id="Homme" <?php if (isset($_POST['Sexe']) == TRUE && $_POST['Sexe'] === 'Homme') echo 'checked="checked"'; ?>/>
               <label for="Femme">Femme</label>
               <input type="radio" name="Sexe" value="Femme" id="Femme" <?php if (isset($_POST['Sexe']) == TRUE && $_POST['Sexe'] === 'Femme') echo 'checked="checked"'; ?>/>
            </div>
            <!-- Checkbox -->
            <div>                
                <!-- Affichage de l'erreur + restauration -->
                <?php                     
                    // Si l'erreur existe on l'affiche
                    if (isset($TabErreur['perso']) == TRUE)
                    {
                        echo '<p class="error">' , $TabErreur['perso'] , '</p>';
                    } ?>
                Comment te définirais tu : <br/>
                <label for="fort">Balèze</label> 
                <input type="checkbox" name="perso[0]" value="fort" id="fort" <?php RestoreCheckBox(0) ?>/>
                <label for="beau">Beau gosse</label>
                <input type="checkbox" name="perso[1]" value="beau" id="beau" <?php RestoreCheckBox(1) ?>/>
                <label for="petit">Nain</label>
                <input type="checkbox" name="perso[2]" value="petit" id="petit" <?php RestoreCheckBox(2) ?>/>
                <label for="grand">Grande perche</label>
                <input type="checkbox" name="perso[3]" value="grand" id="grand" <?php RestoreCheckBox(3) ?>/>
            </div>
            <!-- Zone de texte : description -->
            <div>
                <?php                     
                    // Si l'erreur existe on l'affiche
                    if (isset($TabErreur['Description']) == TRUE)
                    {
                        echo '<p class="error">' , $TabErreur['Description'] , '</p>';
                    } ?>
                <label for="Description">Description :</label>
                 <br/>
                 <textarea name="Description" id="Description" cols="51" rows="10" /><?php if(isset($description)) echo $description; ?></textarea>
            </div>
            <!-- Bouton : Choix de fichier -->
            <div class="bouton">
                <?php                     
                // Si l'erreur existe on l'affiche
                if (isset($TabErreur['file']) == TRUE)
                {
                    echo '<p class="error">' , $TabErreur['file'] , '</p>';
                } ?>
                <label for="file">Image de profil :</label>                 
                <input type="file" name="file" id="file" />
            </div>
            <!-- Bouton : Reset et valider -->
            <div class="bouton"/>
                <input type="reset" name="reset" value="Réinitialiser"/>
                <input type="submit" name="valider" value="Envoyer"/>
            </div>
        </form>
        
           

    </body>
</html>
