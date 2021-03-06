<?php

namespace App\Http\Controllers\User\Note;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Admin\Note\Categorys;
use App\Models\Admin\Note\Posts;

class CategorysController extends Controller
{
    /**
     * @var Categorys
     */
    protected $categorys;
    protected $posts;

    public function __construct(Categorys $categorys, Posts $posts)
    {
        $this->categorys = $categorys;
        $this->posts = $posts;
    }

    public function index()
    {
        $name = \Auth::user()->name;
        $categorys = $this->categorys->where('owner',$name)->sortable(['created_at' => 'desc'])->paginate(10);

        return view('user.note.categorys.index', ['categorys' => $categorys]);
    }

    public function create()
    {
        return view('user.note.categorys.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'owner' => 'required',
            'title' => 'required',
        ]);

        $categoryDetails = $request->all();
        $this->categorys->create($categoryDetails);

        \Session::flash('success', trans('admin/note.categorys.store.messages.success'));

        return redirect()->route('user.note.categorys.index')->withInput();
    }

    public function edit($id)
    {
        $category = $this->categorys->find($id);

        return view('user.note.categorys.edit', ['category' => $category]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $category = $this->categorys->find($request->id);

        $categoryDetails = $request->all();
        $category->update($categoryDetails);

        \Session::flash('success', trans('admin/note.categorys.update.messages.success'));

        return redirect()->route('user.note.categorys.index')->withInput();
    }

    public function destroy(Request $request)
    {
        if (is_null($request->categorys)) {
            \Session::flash('info', trans('admin/note.categorys.destroy.messages.info'));

            return redirect()->route('user.note.categorys.index');
        }

        $this->categorys->destroy($request->categorys);
        \Session::flash('success', trans('admin/note.categorys.destroy.messages.success'));

        return redirect()->route('user.note.categorys.index');
    }

    public function list($id){
        $user = \Auth::user()->name;
        $posts = $this->posts->where('owner', $user)->where('category_id',$id)->sortable(['created_at' => 'desc'])->paginate(10);
        return view('user.note.posts.index', ['posts' => $posts]);
    }
}
