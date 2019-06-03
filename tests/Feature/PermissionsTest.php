<?php

namespace Tests\Feature;

use Tests\TestCase;

class PermissionsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
