<?php

namespace Tests\Controllers;

use Tests\TestCase;

class AdminControllerTest extends TestCase
{
    /**
     * Test the addBooking method returns the correct view.
     *
     * @return void
     */
    public function testAddBookingReturnsCorrectView()
    {
        // Make a GET request to the addBooking route
        $response = $this->get('/admin/add-booking');

        // Assert the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert the correct view is returned
        $response->assertViewIs('admin.add_booking');
    }

    /**
     * Test the showAppointments method returns the correct view.
     *
     * @return void
     */
    public function testShowAppointmentsReturnsCorrectView()
    {
        // Make a GET request to the showAppointments route
        $response = $this->get('/admin/appointments');

        // Assert the response status is 200 (OK)
        $response->assertStatus(200);

        // Assert the correct view is returned
        $response->assertViewIs('admin.show_appointments');
    }
}
