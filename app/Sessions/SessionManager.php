<?php

class SessionManager
{

    public function __construct()
    {
        $this->startSession();
    }

    public static function startSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            ini_set('session.gc_maxlifetime', 604800); // 7 dias
            session_set_cookie_params(604800); // 7 dias
            session_start();
        }
    }

    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }

    public static function destroySession()
    {
        session_destroy();
    }
}
