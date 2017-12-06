<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Note\Categorys;
use App\Models\Admin\Note\Posts;
use App\User;

class DashboardController extends Controller
{
    protected $categorys;
    protected $posts;

    public function __construct(Categorys $categorys,Posts $posts)
    {
        $this->categorys = $categorys;
        $this->posts = $posts;
    }

    public function category()
    {
        return view('user.dashboard.category');
    }

    public function note()
    {
        return view('user.dashboard.note');
    }


    public function searchCategory(Request $request)
    {
      $user = \Auth::user()->name;
      $search_condition = $request->condition;
      $cs = $this->categorys->where('owner',$user)->where('title','like','%'.$search_condition.'%')->sortable(['created_at' => 'desc'])->paginate(10);
      return view('user.dashboard.categoryresult', ['categorys' => $cs]);
    }

    public function searchNote(Request $request)
    {
      $user = \Auth::user()->name;
      $search_condition = $request->condition;
      $first = $this->posts->where('title','like','%'.$search_condition.'%')->where('owner',$user);
      $posts = $this->posts->where('description','like','%'.$search_condition.'%')->where('owner',$user)->union($first)->get();
      return view('user.dashboard.noteresult', ['posts' => $posts]);
    }
}
