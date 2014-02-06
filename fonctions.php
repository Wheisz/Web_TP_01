<?php
/**
 * Restaure La valeur par défaut pour un input
 * @param string $pElement (Nom de l'élément)
 * @return type
 */
function Restore($pElement)
{
    // Test l'existence de a variable
    if (isset($_POST[$pElement]) == true)
    {
        return 'value="' . hmtlentities($_POST[$pElement]) . '"';
    }
}

?>
