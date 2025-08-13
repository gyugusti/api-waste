<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DafWadahAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('daf_wadah', function (Blueprint $table) {
            $table->increments('wadah_id');
            $table->string('nama');
        });
    }

    public function test_guest_cannot_access_dafwadah()
    {
        $response = $this->getJson('/api/dafwadah');
        $response->assertStatus(401);
    }

    public function test_authenticated_user_can_access_dafwadah()
    {
        $user = new User();
        $user->id = 1;
        $user->username = 'testuser';
        $user->password_hash = bcrypt('password');
        $user->status = 10;

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/dafwadah');
        $response->assertStatus(200);
    }
}
