<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Models\Role;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin user';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $name = $this->ask('Admin name:');
        $email = $this->ask('Admin email:');
        $password = $this->secret('Admin password:');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password)
        ]);
        $user->assignRole('admin');

        $this->info('Admin user created successfully!');
    }
}
