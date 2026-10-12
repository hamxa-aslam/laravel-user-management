<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'app:create-admin {email} {--name=Administrator}';

    protected $description = 'Create an admin account or promote an existing user';

    public function handle(): int
    {
        $email = strtolower($this->argument('email'));
        $name = $this->option('name');

        $user = User::where('email', $email)->first();

        if ($user) {
            if ($user->role === 'admin') {
                $this->info('This account is already an admin.');
                return self::SUCCESS;
            }

            if (!$this->confirm('Promote this existing account to admin?')) {
                $this->info('No changes made.');
                return self::SUCCESS;
            }

            $user->role = 'admin';
            $user->save();

            $this->info('Existing account promoted to admin.');
            return self::SUCCESS;
        }

        $password = $this->secret('Enter a strong password for the new admin');

        if (!$password || strlen($password) < 8) {
            $this->error('Password must be at least 8 characters long.');
            return self::FAILURE;
        }

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
            'role' => 'admin',
        ]);

        $this->info("Admin account created: {$user->email}");

        return self::SUCCESS;
    }
}
