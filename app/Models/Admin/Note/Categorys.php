<?php

namespace App\Models\Admin\Note;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categorys extends Model
{
    use SoftDeletes, Sortable;

    protected $table = 'note_category';

    protected $fillable = [
        'owner',
        'title',
    ];

    protected $sortable = [
        'id',
        'title',
        'created_at',
    ];
}
