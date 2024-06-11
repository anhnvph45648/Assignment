<?php
namespace Anhnvph45648\Asm\Controllers\Client;

use Anhnvph45648\Asm\Commons\Controller;
use Anhnvph45648\Asm\Commons\Helper;
use Anhnvph45648\Asm\Models\Cart;
use Anhnvph45648\Asm\Models\CartDetail;
use Anhnvph45648\Asm\Models\Product;

class CartController extends Controller
{

    private Product $product;
    private Cart $cart;

    private CartDetail $cartDetail;



    public function __construct()
    {
        $this->product = new Product();
        $this->cart = new Cart();
        $this->cartDetail = new CartDetail();
    }
    public function add()
    {
        $product = $this->product->findByID($_GET['productID']);
        $key = 'cart';
        // Helper::debug($product);


     
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }
        if (!isset($_SESSION[$key][$product['id']])) {
            $_SESSION[$key][$product['id']] = $product + ['quantity' => $_GET['quantity'] ?? 1];
        } else {
            $_SESSION[$key][$product['id']]['quantity'] += $_GET['quantity'];
        }

        if (isset($_SESSION['user'])) {
            $conn = $this->cart->getConnection();

            // $conn->beginTransaction();
            try {
                $cart = $this->cart->findByUserID($_SESSION['user']['id']);

                if (empty($cart)) {
                    $this->cart->insert([
                        'user_id' => $_SESSION['user']['id'],
                    ]);
                }


                $cartID = $cart['id'] ?? $conn->lastInsertId();

                $_SESSION['cart_id'] = $cartID;

                $this->cartDetail->deleteByCartID($cartID);

                foreach ($_SESSION[$key] as $productID => $item) {
        
                    $this->cartDetail->insert([
                        'cart_id' => $cartID,
                        'product_id' => $productID,
                        'quantity' => $item['quantity']
                    ]);
                }
                // $conn->commit();
            } catch (\Throwable $th) {
                //throw $th;
                // $conn->rollBack();
            }
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }

    public function detail()
    { // Chi tiết giỏ hàng
        $this->renderViewClient('cart');
    }

    public function quantityInc()
    {
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }

        $_SESSION[$key][$_GET['productID']]['quantity'] += 1;

        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'], 
                $_GET['productID'], 
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }
    public function quantityDec()
    {
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }


        if ($_SESSION[$key][$_GET['productID']]['quantity'] > 1) {
            $_SESSION[$key][$_GET['productID']]['quantity'] -= 1;
        }

        if (isset($_SESSION['user'])) {
            $this->cartDetail->updateByCartIDAndProductID(
                $_GET['cartID'], 
                $_GET['productID'], 
                $_SESSION[$key][$_GET['productID']]['quantity']
            );
        }

        header('Location: ' . url('cart/detail'));
        exit;
    }
    public function remove()
    {
        $key = 'cart';
        if (isset($_SESSION['user'])) {
            $key .= '-' . $_SESSION['user']['id'];
        }
        unset($_SESSION[$key][$_GET['productID']]);

       if(isset($_SESSION['user'])){
        $this->cartDetail->deleteByCartIDAndProductID($_GET['cartID'], $_GET['productID']);
       }

       header('Location: ' . url('cart/detail'));
        exit;


    }


}