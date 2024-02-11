<?php

namespace App\Util;

class Constants
{
    //STATUS CODE
    const STATUS_OK = 200;
    const STATUS_CREATED = 201;
    const STATUS_BAD_REQUEST = 400;
    const STATUS_UNAUTHORIZED = 401;
    const STATUS_NOT_FOUND = 404;
    const STATUS_ERROR_SERVER = 500;

    //SHARED
    const OK = "Consulta exitosa";
    const REGISTER_SUCESSFULL = "Registro Exitoso!";
    const REGISTER_UNSUCESSFULL = "Error al registrar!";

    //CONSTANTS AUTHENTICATE
    const CREDENTIALS_INVALID = "Credenciales invalidas";
    const USER_REGISTER_UNSUCESSFULL = "Error al registrar el usuario";
    const USER_LOGOUT = "Cerro sesion con exito!";
    const USER_NOT_FOUND = "Usuario no existe";
    const USER_IS_APPROVED = "El usuario ya se encuentra aprovado por la institución";
    const USER_REFRESH_TOKEN = "El token se actualizo correctamente!";
    const USER_CHECK_TOKEN_UNSUCESSFUL = "El token no existe!";
    const USER_CHECK_TOKEN_VALID = "Token es valido.";
    const USER_CHECK_TOKEN_INVALID = "Token invalido.";


    //ATTRIBUTES
    const EMAIL = "email";
    const USERNAME = "username";
    const PASSWORD = "password";
    const MESSAGE = 'message';
    const ERROR = 'error';
    const USER = 'user';
    const TOKEN = 'token';
}
