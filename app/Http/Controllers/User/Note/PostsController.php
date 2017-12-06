<?php

namespace App\Http\Controllers\User\Note;

use App\User;
use Carbon\Carbon;
use App\Libraries\Upload;
use Illuminate\Http\Request;
use App\Models\Admin\Note\Posts;
use App\Http\Controllers\Controller;
use App\Models\Admin\Note\Categorys;

class PostsController extends Controller
{
    const UPLOAD_PATH = 'note/posts/';
    const UPLOAD_ROUTE = 'user.note.posts.upload';

    /**
     * @var Posts
     */
    protected $posts;

    protected $categorys;

    /**
     * PostsController constructor.
     * @param Posts $posts
     * @param Categorys $categorys
     */
    public function __construct(Posts $posts, Categorys $categorys)
    {
        $this->posts = $posts;
        $this->categorys = $categorys;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $name = \Auth::user()->name;
        $posts = $this->posts->where('owner',$name)->sortable(['created_at' => 'desc'])->whereHas('category')->paginate(10);

        return view('user.note.posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $name = \Auth::user()->name;
        $categorys = $this->categorys->all()->where('owner',$name);

        return view('user.note.posts.create', ['categorys' => $categorys]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'owner' => 'required',
            'category_id' => 'required|integer',
            'title' => 'required',
            'description' => 'required',
        ]);

        $postDetails = $request->all();
        $post = $this->posts->create($postDetails);

        $user = $request->user();
        $path_from = self::UPLOAD_PATH.'temp-'.$user->id.'/';
        $path_to = self::UPLOAD_PATH.$post->id;

        if (\Storage::disk('uploads')->exists($path_from)) {
            \Storage::disk('uploads')->move($path_from, $path_to);
        }

        \Session::flash('success', trans('admin/note.posts.store.messages.success'));

        return redirect()->route('user.note.posts.index')->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $name = \Auth::user()->name;
        $categorys = $this->categorys->all()->where('owner',$name);
        $post = $this->posts->find($id);

        return view('user.note.posts.edit', ['categorys' => $categorys, 'post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required|integer',
            'title' => 'required',
            'description' => 'required',
        ]);

        $post = $this->posts->find($request->id);

        $postDetails = $request->all();
        $post->update($postDetails);

        \Session::flash('success', trans('admin/note.posts.update.messages.success'));

        return redirect()->route('user.note.posts.index')->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if (is_null($request->posts)) {
            \Session::flash('info', trans('admin/note.posts.destroy.messages.info'));

            return redirect()->route('user.note.posts.index');
        }

        $this->posts->destroy($request->posts);
        \Session::flash('success', trans('admin/note.posts.destroy.messages.success'));

        // Precisamos remover as imagens desse ID também
        // tem que ser um foreach porque é um array de galerias
        foreach ($request->posts as $id) {
            // Checamos se o diretório existe
            $path = self::UPLOAD_PATH.$id;

            // Deletamos o diretório da imagem
            if (\Storage::disk('uploads')->exists($path)) {
                \Storage::disk('uploads')->deleteDirectory($path);
            }
        }

        return redirect()->route('user.note.posts.index');
    }

    /**
     * Faz o envio ou carrrega as imagens de um diretório.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request, $id = null)
    {
        new Upload(
            $request,
            [
                'id' => $id,
                'route' => self::UPLOAD_ROUTE, // Route `routes/web.app`
                'path' => self::UPLOAD_PATH, // Path to upload file
            ]
        );
    }
}
