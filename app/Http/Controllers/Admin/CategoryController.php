<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->model =  new Category();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = $this->model->getAll();

        return view('admin.category.index', [
            'data' => $data,
        ]);
    }

    public function edit($id, Request $request)
    {
        $data = Category::find($id);
        $categories = $this->model->getAll();

        if ($_POST) {
            $validator = $this->validation($request);

            if ($validator->fails()) {
                return redirect('cms/category/edit/' . $id)
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $data->category_name = $_POST['category_name'];
                $data->category_parent = $_POST['category_parent'];
                $data->save();

                return redirect('cms/category');
            }
        }

        return view('admin.category.edit', [
            'data' => $data,
            'categoriesSelect' => $this->getCategoriesSelect(),
        ]);
    }

    public function add(Request $request) {

        if ($_POST) {
            $validator = $validator = $this->validation($request);

            if ($validator->fails()) {
                return redirect('cms/category/add')
                    ->withErrors($validator)
                    ->withInput();
            } else {
                $this->model->category_name = $_POST['category_name'];
                $this->model->category_parent = $_POST['category_parent'];
                $this->model->save();

                return redirect('cms/category');
            }
        }

        return view('admin.category.add', [
            'categoriesSelect' => $this->getCategoriesSelect(),
        ]);
    }

    public function delete($id) {
        $data = Category::find($id);
        $data->delete();

        return redirect('cms/category');
    }

    public function getCategoriesSelect()
    {
        $data = $this->model->getAll();
        $categories = ['0' => '-- Danh mục gốc --'];
        foreach($data as $v) {
            $categories[$v->category_id] = StrRepeat('__', $v->category_level) . $v->category_name;
        }
        return $categories;
    }

    public function validation($request) {
        $validator = Validator::make($request->all(), [
            'category_name' => 'required|max:255',
        ]);
        return $validator;
    }
}
