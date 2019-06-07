<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HTTPUserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A test view home.
     *
     * @return void
     */
    public function testViewHome()
    {
      $response = $this->get('/admin/login');
      $response->assertStatus(200);
    }
}
