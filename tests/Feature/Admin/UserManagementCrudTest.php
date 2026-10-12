<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementCrudTest extends TestCase
{
    use RefreshDatabase;

    private function createAdmin(): User
    {
        return User::factory()->create([
            'role' => 'admin',
        ]);
    }

    public function test_admin_can_view_users_list(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)
            ->get(route('admin.users.index'));

        $response->assertOk();
    }

    public function test_admin_can_create_a_user(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)
            ->post(route('admin.users.store'), [
                'name' => 'Test User',
                'email' => 'testuser@example.com',
                'password' => 'StrongPassword123!',
                'password_confirmation' => 'StrongPassword123!',
                'role' => 'user',
            ]);

        $response->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseHas('users', [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'role' => 'user',
        ]);
    }

    public function test_admin_can_edit_a_user(): void
    {
        $admin = $this->createAdmin();

        $user = User::factory()->create([
            'name' => 'Old Name',
            'email' => 'olduser@example.com',
            'role' => 'user',
        ]);

        $response = $this->actingAs($admin)
            ->put(route('admin.users.update', $user), [
                'name' => 'Updated Name',
                'email' => 'updateduser@example.com',
                'role' => 'user',
                'password' => '',
                'password_confirmation' => '',
            ]);

        $response->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'name' => 'Updated Name',
            'email' => 'updateduser@example.com',
            'role' => 'user',
        ]);
    }

    public function test_admin_can_delete_another_user(): void
    {
        $admin = $this->createAdmin();

        $user = User::factory()->create([
            'role' => 'user',
        ]);

        $response = $this->actingAs($admin)
            ->delete(route('admin.users.destroy', $user));

        $response->assertRedirect(route('admin.users.index'));

        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);
    }

    public function test_admin_cannot_create_user_with_duplicate_email(): void
    {
        $admin = $this->createAdmin();

        User::factory()->create([
            'email' => 'existing@example.com',
        ]);

        $response = $this->actingAs($admin)
            ->from(route('admin.users.create'))
            ->post(route('admin.users.store'), [
                'name' => 'Duplicate User',
                'email' => 'existing@example.com',
                'password' => 'StrongPassword123!',
                'password_confirmation' => 'StrongPassword123!',
                'role' => 'user',
            ]);

        $response->assertSessionHasErrors('email');

        $this->assertDatabaseMissing('users', [
            'name' => 'Duplicate User',
        ]);
    }

    public function test_admin_cannot_create_user_with_invalid_role(): void
    {
        $admin = $this->createAdmin();

        $response = $this->actingAs($admin)
            ->from(route('admin.users.create'))
            ->post(route('admin.users.store'), [
                'name' => 'Invalid Role User',
                'email' => 'invalidrole@example.com',
                'password' => 'StrongPassword123!',
                'password_confirmation' => 'StrongPassword123!',
                'role' => 'superadmin',
            ]);

        $response->assertSessionHasErrors('role');

        $this->assertDatabaseMissing('users', [
            'email' => 'invalidrole@example.com',
        ]);
    }
}
