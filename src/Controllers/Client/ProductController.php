<?php
namespace Anhnvph45648\Asm\Controllers\Client;

use Anhnvph45648\Asm\Commons\Controller;
use Anhnvph45648\Asm\Commons\Helper;
use Anhnvph45648\Asm\Models\Product;

class ProductController extends Controller
{
    private Product $product;

    public function __construct()
    {
        $this->product = new Product();
    }
    
    public function index() {
        echo __CLASS__ . '@' . __FUNCTION__;
    }

    public function detail($id) {
        $product = $this->product->findByID($id);

        $this->renderViewClient('product-detail', [
            'product' => $product
        
        ]);
    }
}