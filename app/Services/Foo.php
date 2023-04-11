<?php

namespace App\Services;

class Foo
{
    public function getData()
    {
        echo "Foo";
        return [
            'foo' => 'bar',
            'baz' => 'qux',
        ];
    }
}
