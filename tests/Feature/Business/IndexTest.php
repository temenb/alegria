<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IndexTest extends TestCase
{
    use RefreshDatabase;

    public function testSuccessResponse()
    {
        $response = $this->get(route('businesses.index', [], false));
        $response->assertStatus(200);
    }

    public function testSignInOutLinks()
    {
        $url = route('businesses.index', [], false);
        $response = $this->get($url);
        $response->assertSee('href="' . route('login') . '"', false);

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get($url);
        $response->assertDontSee('/login');
        $response->assertSee($user->name);
    }
}
