<?php 
function diaSemana($dia) {
    $dias = array(
        1 => "Domingo",
        2 => "Segunda-feira",
        3 => "Terça-feira",
        4 => "Quarta-feira",
        5 => "Quinta-feira",
        6 => "Sexta-feira",
        7 => "Sábado"
    );
    return $dias[$dia] ?? "Dia inválido";
}

if (isset($_REQUEST['dia'])) {
    $dia = intval($_REQUEST['dia']);
    echo diaSemana($dia);
}