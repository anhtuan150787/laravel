<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->model =  new Post();
        $this->categoryModel = new Category();
    }

    public function index()
    {
        $data = $this->model->paginate(15);

        return view('admin.post.index', [
            'data' => $data,
            'statusList' => $this->getStatusList(),
        ]);
    }

    public function add(Request $request)
    {
        if ($_POST) {
            $validator = $this->validation($request);
            if ($validator->fails()) {
                return redirect('cms/post/add')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $this->model->post_title = $_POST['post_title'];
                $this->model->category_id = $_POST['category_id'];
                $this->model->post_status = $_POST['post_status'];
                $this->model->save();

                return redirect('cms/post');
            }
        }

        return view('admin.post.add', [
            'categoriesSelect' => $this->getCategoriesSelect(),
            'statusList' => $this->getStatusList(),
        ]);
    }

    public function edit($id, Request $request)
    {
        $data = Post::find($id);
        $categories = $this->categoryModel->getAll();

        if ($_POST) {
            $validator = $this->validation($request);

            if ($validator->fails()) {
                return redirect('cms/post/edit/' . $id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $data->post_title = $_POST['post_title'];
                $data->category_id = $_POST['category_id'];
                $data->post_status = $_POST['post_status'];
                $data->save();

                return redirect('cms/post');
            }
        }

        return view('admin.post.edit', [
            'data' => $data,
            'categoriesSelect' => $this->getCategoriesSelect(),
            'statusList' => $this->getStatusList(),
        ]);
    }

    public function delete($id) {
        $data = Post::find($id);
        $data->delete();

        return redirect('cms/post');
    }

    public function getCategoriesSelect()
    {
        $data = $this->categoryModel->getAll();
        $categories = ['0' => '-- Chọn danh mục --'];
        foreach($data as $v) {
            $categories[$v->category_id] = StrRepeat('__', $v->category_level) . $v->category_name;
        }
        return $categories;
    }

    public function getStatusList()
    {
        return [
            '1' => 'Hiển thị',
            '2' => 'Ẩn',
        ];
    }

    public function validation($request)
    {
        $validator = Validator::make($request->all(), [
            'post_title' => 'required|max:255',
            'post_status' => 'required',
        ]);
        return $validator;
    }
}
