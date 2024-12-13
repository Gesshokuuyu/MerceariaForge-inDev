<?php
return [
    'login' => 'LoginController@index',
    'logout' => 'SessionController@logout',
    'dashboard' => 'DashboardController@index',
    'notfound' => 'ErrorController@notFound', // Para rotas inválidas
];
