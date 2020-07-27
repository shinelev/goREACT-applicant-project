<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testReturnWelcome()
    {
        $response = $this->get('/');

        $response->assertViewIs('welcome');
    }

    public function testReturnHome()
    {
        // Run this test with real db
        // Comment line below for test run
        $this->markTestSkipped('Disabled until real db is connected');

        $user = factory(User::class)->create();

        $response = $this->actingAs($user)
            ->withSession(['foo' => 'bar'])
            ->get('/home');

        $response->assertViewIs('home');
    }

    public function testInvalidRoute()
    {
        $response = $this->get('/invalid');

        $response->assertStatus(404);
    }

    public function testReturnHomeWithNoAuth()
    {
        $response = $this->get('/home');

        $response->assertRedirect('login');
    }
}
