<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function contact(Request $request)
    {

        $validated = $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required|max:200',
            'g-recaptcha-response' => 'recaptcha',
        ]);


        return response($validated, 200)
            ->header('Content-Type', 'text/plain');;

    }
}
