<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'failed' => '登录失败，请检查用户名和密码是否正确',
    'throttle' => '登录过于频繁，请 :seconds 秒后重试',

    // Login
    'login' => [
        'welcome' => '欢迎',
        'form' => [
            'name' => '用户名',
            'email' => '电子邮箱',
            'senha' => '密码',
            'login_button' => '登录',
            'repeat' => '确认密码',
            'signup_button' => '注册',
        ],
        'messages' => [
            'error' => '用户名或密码非法！',
        ],
        'forgot' => '忘记密码',
    ],

    // Forget Password
    'forget' => [
        'title' => '忘记密码',
        'form' => [
            'email' => '电子邮箱',
            'button' => '发送邮件',
        ],
        'back' => '返回',
    ],

    // E-mail
    'email' => [
        'password' => [
            'description' => '点击这里重置密码:',
        ],
    ],

    // Reset de senha
    'reset' => [
        'title' => '找回密码',
        'form' => [
            'email' => '电子邮箱',
            'password' => '密码',
            'password_confirmation' => '确认密码',
            'button' => '重置密码',
        ],
    ],

];
