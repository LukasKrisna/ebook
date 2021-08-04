<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function me()
    {
        return response()-> json(
            [
                'NIS'   => '3103119103',
                'Name'  => 'Lukas Krisna',
                'Gender'=> 'Male',
                'Phone' => '082328613817',
                'Class' => 'XII RPL 3'
                
            ]
        );
    }
}
