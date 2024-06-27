<?php

namespace app\middleware;

session_start();

class Auth
{
    public static function session($token)
    {
        if (isset($token[0]) && isset($token[0]['user_id']) && isset($token[0]['user_nome']) && isset($token[0]['tipo_id'])) {
            $_SESSION['token'] = serialize([
                'id' => $token[0]['user_id'],
                'nome' => $token[0]['user_nome'],
                'tipo' => $token[0]['tipo_id'],
            ]);
        }
    }

    public static function decode()
    {
        if (isset($_SESSION['token'])) {
            $decoded_data = unserialize($_SESSION['token']);
            return $decoded_data;
        }
    }
}
