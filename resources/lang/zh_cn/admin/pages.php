<?php

return [

    'module' => '我的笔记',

    'submodule' => [
        'categorys' => '笔记本',
        'contents' => '内容',
    ],

    'categorys' => [
        'index' => [
            'title' => '笔记本列表 (:total)',
            'is_empty' => '您还没有笔记本',
        ],

        'create' => [
            'title' => '创建笔记本',
        ],

        'edit' => [
            'title' => '编辑笔记本',
        ],

        'store' => [
            'messages' => [
                'success' => '创建成功',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '修改成功',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '没有已选笔记本',
                'success' => '删除成功',
            ],
        ],
    ],

    'contents' => [
        'index' => [
            'title' => '笔记列表 (:total)',
            'is_empty' => '您还没有笔记',
        ],

        'create' => [
            'title' => '新增笔记',
        ],

        'edit' => [
            'title' => '编辑笔记',
        ],

        'store' => [
            'messages' => [
                'success' => '保存成功',
            ],
        ],

        'update' => [
            'messages' => [
                'success' => '编辑成功',
            ],
        ],

        'destroy' => [
            'messages' => [
                'info' => '没有已选笔记',
                'success' => '删除成功',
            ],
        ],
    ],

];
