<?php

return [

    'module' => '用户管理',

    'index' => [
        'title' => '用户列表 (:total)',
        'is_empty' => '没有注册用户',
    ],

    'create' => [
        'title' => '新建用户',
    ],

    'edit' => [
        'title' => '编辑用户',
    ],

    'store' => [
        'messages' => [
            'success' => '用户信息更新成功',
        ],
    ],

    'update' => [
        'messages' => [
            'success' => '用户信息修改成功',
        ],
    ],

    'destroy' => [
        'messages' => [
            'info' => '没有选择用户',
            'warning' => '不能删除你自己的账户',
            'success' => '成功删除用户！',
        ],
    ],

    'gravatar' => [
        'title' => 'Gravatar',
        'description' => 'Gravatar 是个人全球统一标识，创建Gravatar有利于让更多网络上的发现你。',
        'button' => 'Crear tu gavatar',
    ],

];
