<?php

namespace Tests\Feature;

use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    /** @test */
    public function unauthenticated_user_cannot_access_dashboard()
    {
        $response = $this->get('/admin/dashboard');
        $response->assertRedirect('/admin/login');
    }

    /** @test */
    public function admin_login_page_renders_without_sidebar()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
        $response->assertDontSee('components.sidebarAdmin');
    }

    /** @test */
    public function other_admin_routes_are_protected()
    {
        $routes = [
            '/admin/projects',
            '/admin/productEdit',
            '/admin/aboutus',
            '/admin/sales',
            '/admin/newsEdit',
            '/admin/wbs',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertRedirect('/admin/login');
        }
    }
}
