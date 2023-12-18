<?php

function formatFechaHora($fecha) {
    // hora en formato 12 horas y fecha en formato español
    return date('h:i A d/m/Y', strtotime($fecha));
}

function formatFecha($fecha) {
    // fecha en formato dd/mm/yyyy
    return date('d/m/Y', strtotime($fecha));
}
