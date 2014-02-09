<?php
/**
 * Restaure La valeur par défaut pour un input
 * @param string $pElement (Nom de l'élément)
 * @return value=".."
 */
function Restore($pElement)
{
    // Test l'existence de a variable
    if (isset($_POST[$pElement]) == true)
    {
        echo 'value="' . htmlentities($_POST[$pElement]) . '"';
    }
}

/**
 * Insert un input en fonction de son type et de son nom
 * @param type $ElementType = type d'input
 * @param type $pElement = nom de l'input
 */
function GetInput($ElementType, $pElement)
{
    echo '<input id="' . $pElement . '" type="' . $ElementType . '" name="' . $pElement . '"';
        Restore($pElement);
    echo ' />';
}

function AfficherErreur($pElement)
{
    // Si l'erreur existe on l'affiche
    if (isset($TabErreur[$pElement]) == TRUE)
    {
        echo '<p class="error">' . $TabErreur[$pElement] . '</p>';
    }
}

function RestoreListeDeroul($pElement, $NomElement)
{
    if ($_POST[$NomElement] === $pElement) 
    {
         echo 'selected="selected"'; 
    }   
    
    if (isset($_POST['anne_naissance']) == TRUE && $_POST['anne_naissance'] == 1990)
    {
        echo '<option value="1990" selected="selected">1990</option>';
    }
    else
    {
        echo '<option value="1990">1990</option>';
    }
}



function ListeDeroul()
{
    for ($i = 1990 ; $i <= 2014 ; $i++)
    {
        $TabAnne[] = $i;
    }
    
    foreach ($TabAnne as $element)
    {
         if (isset($_POST['anne_naissance']) == TRUE && $element == $_POST['anne_naissance'])
        {
             echo '<option value="' , $element , '" selected="selected">' , $element , '</option>';
        }
        else
        {
            echo '<option value="' , $element , '">' , $element , '</option>';
        }
    }
    
}

function RestoreCheckBox($indice)
{
    if (isset($_POST['perso'][$indice]) == TRUE) 
    {
        echo 'checked="checked"';
    }
}


function EnvoyerFichier()
{    
    // On récupère l'IP de l'utilisateur
    $ip = $_SERVER['REMOTE_ADDR'];
    
    // On vérifie que son dossier n'existe pas
    $cheminDossierUser = 'ReponseFormulaire/' . $ip . '/';
    if (file_exists($cheminDossierUser) == TRUE)
    {
         echo '<div class="NoteBasPage" >L\'envoi a échoué vous avez déjà rempli ce formulaire</div>';
    }
    else
    {
        // On crée le dossier avec son IP    
        if (mkdir($cheminDossierUser) == TRUE)
        {
            // On peut valider le fichier et le stocker définitivement
            $ancienChemin = $_FILES['file']['tmp_name'];
            $nouveauChemin = $cheminDossierUser . basename($_FILES['file']['name']);
            move_uploaded_file($ancienChemin, $nouveauChemin);
            echo '<div class="NoteBasPage" >L\'envoi a bien été effectué !</div>';
            return $cheminDossierUser;
        }
    }
    
    
}



function CreerFichierReponse($cheminDossierUser)
{
    // 1 : on ouvre le fichier
    $monfichier = fopen($cheminDossierUser . 'reponse_formulaire.txt', 'a');
 
    // 2 : On écrit la date et l'heure
    $date = date("d-m-Y");
    $heure = date("H:i");
    fputs($monfichier, 'Le ' . $date . ' à ' . $heure . PHP_EOL);
    
    // 3 : On écrit les réponses
    // On parcourt le tableau de réponse
    foreach ($_POST as $key => $valeur)
    {
        // Si la réponse est un tableau 
        if (is_array($valeur))
        {
            // on le parcourt à son tour pour écrire ce qu'il y a dedans
            foreach ($valeur as $key2 => $value) 
            {
                fputs($monfichier, $key . '(' . $key2 . ')' . ' : ' . $value . PHP_EOL);
            }
        }
        else 
        {
            fputs($monfichier, $key . ' : ' . $valeur . PHP_EOL);
        }
        
    }
    
 
    // 4 : quand on a fini de l'utiliser, on ferme le fichier
    fclose($monfichier);
}




?>
