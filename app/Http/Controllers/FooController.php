<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Foo;

class FooController extends Controller
{
    protected $foo;

    public function __construct(Foo $foo)
    {
        $this->foo = $foo;
    }

    public function index()
    {
        $data = $this->foo->getData();
        dd($data);

        // return view('foo.index', compact('data'));
    }
}
