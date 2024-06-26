<?php
namespace Zems\LrAuth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Controller;


class AuthController extends Controller
{     
    public function index($data = false)
    {
        return "Zems Auth demo";
    }    
    
    
}
