<?php

namespace Anhnvph45648\Asm\Controllers\Admin;


use Anhnvph45648\Asm\Commons\Controller;
use Anhnvph45648\Asm\Commons\Helper;

class DashboardController extends Controller
{
    public function dashboard() {

      
        $this->renderViewAdmin(__FUNCTION__);
    }
}