<?php

namespace App\Http\Controllers;


use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function homepage()
    {
        $variavel = "Homepage do sistema de gestão para grupos de investimento";
        return view ('welcome', ['title' => $variavel]);
    }

    /**
     * Method to user login view
     */
    public function fazerlogin()
    {
       return view('user.login');
    }
}
