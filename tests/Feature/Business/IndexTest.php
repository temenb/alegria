<?php

namespace Tests\Feature\Business;

use App\Models\Business;
use App\Models\BusinessService;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
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

    public function createBusiness()
    {
        $user = User::factory()->create();
        $businesses = Business::factory(1)
            ->hasAttached(Service::inRandomOrder()->first(), ['aprox_price' => BusinessService::APROX_PRICE_LOW])
            ->for($user)
            ->create();
        return $businesses->first();
    }

    public function testSearch()
    {
        $business = $this->createBusiness();
        $url = route('businesses.search', ['q' => $business->name], false);
        $response = $this->get($url);
        $response->assertSee($business->name);
    }

    public function testShow()
    {
        $business = $this->createBusiness();
        $url = route('businesses.show', ['business' => $business], false);
        $response = $this->get($url);
        $response->assertSee($business->name);
    }


    public function test_avatars_can_be_uploaded()
    {
        $business = $this->createBusiness();

        Storage::fake('avatars');

        $file = UploadedFile::fake()->image('picture.jpg');

        $response = $this->post(route('business.uploadFile'), [
            'business' => $business,
            'file' => $file,
        ]);

        Storage::disk('avatars')->assertExists($file->hashName());
        $this->assertTrue($business->image()->where('name', $file->name)->exists());

    }
}