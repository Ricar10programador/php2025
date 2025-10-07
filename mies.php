<?php 
function mies($nmies) {
    $nomemies = array("janeiro.", "fevereiro.", "março."
                   ,"abril.", "maio.", "junho."
                   ,"julho.", "agosto.", "setembro."
                   ,"outubro.", "novembro.", "dezembro." );
    return $nomemies[$nmies-1];               
}