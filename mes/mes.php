<?php 
function mes($nmes) {
    $nomemes = array("janeiro", "fevereiro", "março"
                   ,"abril", "maio", "junho"
                   ,"julho", "agosto", "setembro"
                   ,"outubro", "novembro", "dezembro" );
    return $nomemes[$nmes-1];               
}