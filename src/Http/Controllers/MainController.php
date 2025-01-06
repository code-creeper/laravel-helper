<?php

namespace CodeCreeper\LaravelHelper\Http\Controllers;

//use Illuminate\Routing\Controller;

use Illuminate\Http\Request;

class MainController
{
    public function __invoke(Request $request)
    {
        dd($request->all());
    }
}