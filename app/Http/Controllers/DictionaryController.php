<?php

namespace App\Http\Controllers;

class DictionaryController extends Controller
{
    public $loginAfterSignUp = true;

    public function __construct()
    {
        // $this->middleware('auth:api');
    }

    public function index()
    {
        $configs = config('dictionary');
        return $configs;
    }
}