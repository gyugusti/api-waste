<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class DafSatuanAuthTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Schema::create('daf_satuan', function (Blueprint $table) {
            $table->increments('satuan_id');
            $table->string('nama');
        });
    }

    public function test_guest_cannot_access_dafsatuan()
    {
        $response = $this->getJson('/api/dafsatuan');
        $response->assertStatus(401);
    }

    public function test_authenticated_user_can_access_dafsatuan()
    {
        $user = new User();
        $user->id = 1;
        $user->username = 'testuser';
        $user->password_hash = bcrypt('password');
        $user->status = 10;

        Sanctum::actingAs($user);

        $response = $this->getJson('/api/dafsatuan');
        $response->assertStatus(200);
    }
}

