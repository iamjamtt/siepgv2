<?php

use App\Models\Usuario;

function formatFechaHora($fecha) {
    // hora en formato 12 horas y fecha en formato español
    return date('h:i A d/m/Y', strtotime($fecha));
}

function formatFecha($fecha) {
    // fecha en formato dd/mm/yyyy
    return date('d/m/Y', strtotime($fecha));
}

function getRol($usuario_id){
    $rol = Usuario::find($usuario_id)->rol;
    if ($rol->id == 1) {
        return [
            'nombre' => $rol->nombre,
            'color' => 'primary'
        ];
    } else if ($rol->id == 2) {
        return [
            'nombre' => $rol->nombre,
            'color' => 'info'
        ];
    } else if ($rol->id == 3) {
        return [
            'nombre' => $rol->nombre,
            'color' => 'info'
        ];
    } else if ($rol->id == 4) {
        return [
            'nombre' => $rol->nombre,
            'color' => 'danger'
        ];
    } else if ($rol->id == 5) {
        return [
            'nombre' => $rol->nombre,
            'color' => 'success'
        ];
    } else if ($rol->id == 6) {
        return [
            'nombre' => $rol->nombre,
            'color' => 'success'
        ];
    }
}
