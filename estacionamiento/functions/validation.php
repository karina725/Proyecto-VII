<?php
// functions/validation.php

// Función para validar campos vacíos
function validarCamposVacios($data)
{
    foreach ($data as $key => $value) {
        if (empty($value)) {
            return "El campo $key no puede estar vacío.";
        }
    }
    return true;
}

// Validación de contraseñas (mínimo 8 caracteres, al menos un número y una letra mayúscula)
function validarPassword($password)
{
    if (strlen($password) < 8 || !preg_match("/[0-9]/", $password) || !preg_match("/[A-Z]/", $password)) {
        return false;
    }
    return true;
}