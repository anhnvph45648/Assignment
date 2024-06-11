<?php
use Anhnvph45648\Asm\Controllers\Admin\DashboardController;
use Anhnvph45648\Asm\Controllers\Admin\ProductController;
use Anhnvph45648\Asm\Controllers\Admin\UserController;
use Anhnvph45648\Asm\Controllers\Admin\CategoryController;

// CRUD bao gồm: Danh sách, thêm, sửa, xem, xóa
// User:
//      GET     -> USER/INDEX   -> INDEX          -> Danh sách
//      GET     -> USER/CREATE  -> CREATE         -> HIỂN THỊ FORM THÊM MỚI
//      POST    -> USER/STORE   -> STORE          -> LƯU DỮ LIỆU TỪ FORM THÊM MỚI VÀO DB
//      GET     -> USER/ID      -> SHOW ($id)     -> XEM CHI TIẾT
//      GET     -> USER/ID/EDIT -> EDIT ($id)     -> HIỂN THỊ FORM CẬP NHẬT
//      PUT     -> USER/ID      -> UPDATE ($id)   -> LƯU DỮ LIỆU TỪ FORM CẬP NHẬT VÀO DB
//      DELETE  -> USER/ID      -> DELETE ($id)   -> XÓA BẢNG

$router->before('GET|POST', '/admin/*.*', function() {
    if (!is_logged()) {
        header('location: ' . url('/login') );
        exit();
    } 

    if (!is_admin()) {
        header('location: ' . url() );
        exit();
    }
}); 




$router->mount('/admin', function () use ($router) {

    // CRUD USER
    $router->get('/',               DashboardController::class . '@dashboard');
    
    $router->mount('/users', function () use ($router) {
        $router->get('/',               UserController::class . '@index');
        $router->get('/create',         UserController::class . '@create');
        $router->post('/store',         UserController::class . '@store');
        $router->get('/{id}/show',      UserController::class . '@show');
        $router->get('/{id}/edit',      UserController::class . '@edit');
        $router->post('/{id}/update',   UserController::class . '@update');
        $router->get('/{id}/delete',    UserController::class . '@delete');
    });

    $router->mount('/products', function () use ($router) {
        $router->get('/',               ProductController::class . '@index');  // Danh sách
        $router->get('/create',         ProductController::class . '@create'); // Show form thêm mới
        $router->post('/store',         ProductController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',      ProductController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',      ProductController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update',   ProductController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',    ProductController::class . '@delete'); // Xóa
    });

    $router->mount('/categories', function () use ($router) {
        $router->get('/',               CategoryController::class . '@index');
        $router->get('/create',         CategoryController::class . '@create');
        $router->post('/store',         CategoryController::class . '@store');
        $router->get('/{id}/show',      CategoryController::class . '@show');
        $router->get('/{id}/edit',      CategoryController::class . '@edit');
        $router->post('/{id}/update',   CategoryController::class . '@update');
        $router->get('/{id}/delete',    CategoryController::class . '@delete');
    });

    
    
});


// $router->mount('/admin/users', function () use ($router) {

    
//     $router->get('/',           UserController::class . '@index');
//     $router->get('/create',     UserController::class . '@create');
//     $router->post('/store',     UserController::class . '@store');
//     $router->get('/{id}',       UserController::class . '@show');
//     $router->get('/{id}/edit',  UserController::class . '@edit');
//     $router->put('/{id}',       UserController::class . '@update');
//     $router->delete('/{id}',    UserController::class . '@delete');


// });

