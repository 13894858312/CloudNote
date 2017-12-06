<?php

namespace App\Models\Admin\Note;

use App\Traits\ImageTrait;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Posts extends Model
{
    use SoftDeletes, Sortable, ImageTrait;

    protected $table = 'note_posts';

    protected $fillable = [
        'owner',
        'category_id',
        'title',
        'description',
    ];

    protected $sortable = [
        'id',
        'category_id',
        'title',
        'created_at',
    ];

    protected $traits = [
        'image' => [
            'path' => 'note/posts/',
        ],
    ];

    // -------------------------------------------------------------------------------

    public function category()
    {
        return $this->belongsTo('App\Models\Admin\Note\Categorys');
    }

    // -------------------------------------------------------------------------------
}
