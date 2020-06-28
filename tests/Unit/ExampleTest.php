<?php

namespace Tests\Unit;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->json('POST',
                    '/api/login/create',
                    ['email' => 'aaa', 'password' => 'aaaaaaa']
            );
            dd($response->json());
    }

    
}
