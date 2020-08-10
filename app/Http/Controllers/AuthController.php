<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return
        [
            "NIS" =>  3103118060,
            "Name" => "Faresa PN",
            "Gender" => "Laki Laki",
            "Phone" =>  +6282221821555,
            "Class" => "XII RPL 2",

        ];
    }
}
