<?php

namespace Tests\Unit\Models;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

class UserModelsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_a_user_successfully()
    {
        // Act: Tạo một bản ghi User
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Main Street',
            'password' => Hash::make('password123'),
            'usertype' => 'admin',
        ]);

        // Assert: Kiểm tra bản ghi đã được lưu trong cơ sở dữ liệu
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'phone' => '1234567890',
            'address' => '123 Main Street',
            'usertype' => 'admin',
        ]);

        // Kiểm tra mật khẩu được lưu là dạng hash
        $this->assertTrue(Hash::check('password123', $user->password));
    }

    /** @test */
    public function it_hides_sensitive_fields_when_serializing()
    {
        // Arrange: Tạo một người dùng
        $user = User::factory()->create();

        // Act: Chuyển người dùng sang mảng
        $userArray = $user->toArray();

        // Assert: Các trường nhạy cảm không xuất hiện
        $this->assertArrayNotHasKey('password', $userArray);
        $this->assertArrayNotHasKey('remember_token', $userArray);
        $this->assertArrayNotHasKey('two_factor_recovery_codes', $userArray);
        $this->assertArrayNotHasKey('two_factor_secret', $userArray);
    }

    /** @test */
    public function it_casts_email_verified_at_to_datetime()
    {
        // Arrange: Tạo một người dùng với email_verified_at
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        // Assert: Kiểm tra thuộc tính email_verified_at được cast thành datetime
        $this->assertInstanceOf(\Illuminate\Support\Carbon::class, $user->email_verified_at);
    }

    /** @test */
    public function it_returns_correct_profile_photo_url()
    {
        // Arrange: Tạo một người dùng
        $user = User::factory()->create();

        // Act: Lấy profile photo URL
        $profilePhotoUrl = $user->profile_photo_url;

        // Assert: Kiểm tra URL không null
        $this->assertNotNull($profilePhotoUrl);
    }
}
