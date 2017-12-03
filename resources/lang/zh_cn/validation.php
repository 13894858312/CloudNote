<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => ':attribute 必须被接受。',
    'active_url'           => ':attribute 不是一个合法的URL。',
    'after'                => ':attribute 必须比 :date 晚。',
    'alpha'                => ':attribute 应该只含有字母。',
    'alpha_dash'           => ':attribute 应该只含有数字，字母和破折号。',
    'alpha_num'            => ':attribute 应该只含有数字和字母。',
    'array'                => ':attribute 必须是一个数组。',
    'before'               => ':attribute 必须比 :date 早。',
    'between'              => [
        'numeric' => ':attribute 必须在 :min 和 :max 之间。',
        'file'    => ':attribute 大小必须在 :min 和 :max kb之间。',
        'string'  => ':attribute 长度必须在 :min 和 :max 之间。',
        'array'   => ':attribute 条目个数必须在 :min 个 :max 之间。',
    ],
    'boolean'              => ':attribute 必须为布尔值。',
    'confirmed'            => ':attribute 与确认信息不符。',
    'date'                 => ':attribute 不是一个核发日期。',
    'date_format'          => ':attribute 不符合格式 :format.',
    'different'            => ':attribute 和 :other 不应相同。',
    'digits'               => ':attribute 应为 :digits 位数。',
    'digits_between'       => ':attribute 应在 :min 在 :max 位之间。',
    'distinct'             => ':attribute 有不可识别的值。',
    'email'                => ':attribute 应为合法邮箱地址。',
    'exists'               => '所选 :attribute 不合法。',
    'filled'               => '需要 :attribute 在范围内',
    'image'                => ':attribute 必须为图片。',
    'in'                   => '所选 :attribute 不合法',
    'in_array'             => ':attribute 在 :other 中不存在',
    'integer'              => ':attribute 必须为整数',
    'ip'                   => ':attribute 必须为合法IP地址',
    'json'                 => ':attribute 必须为合法JSON字符串',
    'max'                  => [
        'numeric' => ':attribute 可能小于 :max.',
        'file'    => ':attribute 可能小于 :max kb',
        'string'  => ':attribute 可能长度不足 :max',
        'array'   => ':attribute 可能长度不足 :max ',
    ],
    'mimes'                => ':attribute 必须为 :values 格式文件',
    'min'                  => [
        'numeric' => ':attribute 最小值为 :min',
        'file'    => ':attribute 最少为 :min kb',
        'string'  => ':attribute 长度最短为 :min characters',
        'array'   => ':attribute 最少有 :min 个项目',
    ],
    'not_in'               => '所选 :attribute 不合法',
    'numeric'              => ':attribute 必须为数字',
    'present'              => ':attribute 必须存在',
    'regex'                => ':attribute 格式非法',
    'required'             => '请输入 :attribute',
    'required_if'          => ':attribute 必须存在，如果 :other 值为 :value.',
    'required_unless'      => ':attribute 必须存在，除非 :other 在 :values 范围内',
    'required_with'        => ':attribute 必须存在，如果 :values 存在',
    'required_with_all'    => ':attribute 必须存在，如果 :values 存在',
    'required_without'     => ':attribute 必须存在，如果 :values 不存在',
    'required_without_all' => ':attribute 必须存在，如果 :values 存在时',
    'same'                 => ':attribute 和 :other 必须匹配',
    'size'                 => [
        'numeric' => ':attribute must be :size.',
        'file'    => ':attribute must be :size kilobytes.',
        'string'  => ':attribute must be :size characters.',
        'array'   => ':attribute must contain :size items.',
    ],
    'string'               => ':attribute 必须为字符串',
    'timezone'             => ':attribute 必须为合法时间段',
    'unique'               => ':attribute 已经存在',
    'url'                  => ':attribute 格式非法',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
