<?php

namespace App\Http\Controllers;

interface Indexable
{
    public function index();
}

abstract class Controller implements Indexable
{
    public function index()
    {
        return view('home');
    }
}
