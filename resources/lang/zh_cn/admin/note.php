<?php

return [

    'module' => '我的笔记',

    'submodule' => [
        'categorys' => '笔记本',
        'posts' => '笔记',
    ],

    'categorys' => [
        'index' => [
            'title' => '笔记本',
            'is_empty' => '您还没有笔记本',
        ],

        'create' => [
            'title' => '新建笔记本',
        ],

        'store' => [
            'messages' => [
                'success' => '笔记本添加成功',
            ],
        ],

        'edit' => [
            'title' => '编辑笔记本',
        ],

        'update' => [
            'messages' => [
                'success' => '笔记本编辑成功',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '没有已选中的笔记本',
                'success' => '笔记本删除成功',
            ],
        ],
    ],

    'posts' => [
        'index' => [
            'title' => '笔记',
            'is_empty' => '您还没有笔记',
        ],

        'create' => [
            'title' => '新建笔记',
        ],

        'edit' => [
            'title' => '编辑笔记',
            'posted' => '笔记编辑成功',
        ],

        'store' => [
            'messages' => [
                'success' => '笔记存储成功',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '笔记编辑成功',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '没有已选中的笔记',
                'success' => '笔记删除成功',
            ],
        ],
    ],

];
