<?php

namespace Tests\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IntroControllerTest extends TestCase
{
    use RefreshDatabase; // Sử dụng nếu bạn cần thiết lập lại database sau mỗi bài test

    /**
     * Test the index method of IntroController.
     *
     * @return void
     */
    public function test_intro_page_loads_successfully()
    {
        // Gửi một yêu cầu GET đến route liên kết với phương thức index của IntroController
        $response = $this->get(route('intro.index'));

        // Kiểm tra xem phản hồi có mã trạng thái HTTP 200 (OK) hay không
        $response->assertStatus(200);

        // Kiểm tra xem view được trả về có phải là 'intro' hay không
        $response->assertViewIs('intro');

        // (Tuỳ chọn) Kiểm tra xem nội dung cụ thể có hiển thị trên view hay không
        $response->assertSee('Welcome to the Intro Page'); // Thay đổi nội dung nếu cần
    }
}
