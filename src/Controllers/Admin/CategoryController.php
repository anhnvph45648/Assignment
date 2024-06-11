<?php
namespace Anhnvph45648\Asm\Controllers\Admin;

use Anhnvph45648\Asm\Commons\Controller;
use Anhnvph45648\Asm\Commons\Helper;
use Anhnvph45648\Asm\Models\Category;
use Anhnvph45648\Asm\Models\Product;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{

    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $category = $this->category->all();

        $this->renderViewAdmin('categories.index', [
            'category' => $category
        ]);
    }

    public function create()
    {

        $this->renderViewAdmin('categories.create');
    }

    public function store()
    {
        // VALIDATE
        $validator = new Validator;
        $validation = $validator->make($_POST , [
            'name' => 'required|max:100', 
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/categories/create'));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
            ];


            $this->category->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url('admin/categories'));
            exit;
        }
    }

    public function show($id)
    {
        $category = $this->category->findByID($id);

        $this->renderViewAdmin('categories.show', [
            'category' => $category
        ]);
    }

    public function edit($id)
    {
        $categories = $this->category->findByID($id);

        $this->renderViewAdmin('categories.edit', [
            'category' => $categories,
        ]);
    }

    public function update($id)
    {
    
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name' => 'required|max:100',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/categories/$id/edit"));
            exit;
        } else {
            $data = [
                'name' => $_POST['name'],
            ];

            $this->category->update($id, $data);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';

            header('Location: ' . url("admin/categories/"));
            exit;
        }
    }

    public function delete($id)
    {
        try {
            $category = $this->category->findByID($id);

            $this->category->delete($id);
            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } catch (\Throwable $th) {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
        }

        header('Location: ' . url('admin/categories'));
        exit();
    }
}