<?php

    var_dump($_POST);

    // Si le tableau n'est pas vide
    if (empty($_POST) == FALSE)
    {                    
        // On test si le prénom est renseigné
        if ($_POST['Prenom'] == '')
        { 
            $TabErreur['Prenom'] = 'Veuillez renseigner votre prénom.';
        }
        else
        {
            $prenom = $_POST['Prenom'];
        }

        // On test si le nom est renseigné
        if ($_POST['Nom'] == '')
        { 
            $TabErreur['Nom'] = 'Veuillez renseigner votre nom.';
        }
        else
        {
            $nom = $_POST['Nom'];
        }
        
        // On test si l'année de naissance est renseignée
        if ($_POST['anne_naissance'] == ' ')
        {
            $TabErreur['anne_naissance'] = 'Veuillez renseigner votre année de naissance.';
        }
        else
        {
            $anne_naissance = $_POST['anne_naissance'];
        }
        // On test si le mdp est renseigné
        if ($_POST['mdp'] == '')
        { 
            $TabErreur['mdp'] = 'Veuillez renseigner votre mot de passe.';
        }
        else
        {
            $motDePasse = $_POST['mdp'];

            // On test si le mdpBis est renseigné
            if ($_POST['mdpBis'] == '')
            { 
                $TabErreur['mdpBis'] = 'Veuillez renseigner votre mot de passe.';
            }
        }
        // Si les mots de passe ne sont pas null alors
        if ($_POST['mdp'] != '' && $_POST['mdpBis'] != '')
        {
            // Si mdp est différent de mdpBis alors
            if ($_POST['mdpBis'] !== $_POST['mdp'])
            {
                $TabErreur['mdpBis'] = 'Veuillez renseigner le même mot de passe que le précédant.';
            }
            else
            {
                $motDePasseBis = $_POST['mdpBis'];
            }
        }


        // On test si la description est renseigné
        if ($_POST['Description'] == '')
        { 
            $TabErreur['Description'] = 'Veuillez renseigner votre description.';
        }
        else
        {
            $description = $_POST['Description'];
        }

        // On test si le sexe est renseigné
        if (isset($_POST['Sexe']) == FALSE)
        {
            $TabErreur['Sexe'] = 'Veuillez renseigner votre sexe.';
        }


        // On test si la préférence est renseigné
        if (isset($_POST['perso']) == FALSE)
        {
            $TabErreur['perso'] = 'Veuillez renseigner votre(vos) préférence(s).';
        }
    }
    else
    {
        echo 'Veuillez remplir le formulaire';
    }

    var_dump($_FILES);
    

    require 'View/view_index.php';
    ?>

       <?php /*
           // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
           if (isset($_FILES['monfichier']) AND $_FILES['monfichier']['error'] == 0)
           {
               // Testons si le fichier n'est pas trop gros
               if ($_FILES['monfichier']['size'] <= 1000000)
               {
                   // Testons si l'extension est autorisée
                   $infosfichier = pathinfo($_FILES['monfichier']['name']);
                   $extension_upload = $infosfichier['extension'];
                   $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                   if (in_array($extension_upload, $extensions_autorisees))
                   {

                   }
               }
           }
      */ ?>

