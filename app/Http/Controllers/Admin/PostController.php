<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->model =  new Post();
    }

    public function index()
    {
        $data = $this->model->paginate(15);

        return view('admin.post.index', [
            'data' => $data,
        ]);
    }
}
