<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->truncate();
        DB::table('roles')->truncate();
        DB::table('role_users')->truncate();

        $role = [
            'name' => 'Administrator',
            'slug' => 'administrator',
            'permissions' => [
                'admin' => true,
            ]
        ];

        $adminRole = Sentinel::getRoleRepository()->createModel()->fill($role)->save();

        $subscribersRole = [
            'name' => 'Subscribers',
            'slug' => 'subscribers',
        ];

        Sentinel::getRoleRepository()->createModel()->fill($subscribersRole)->save();

        $admin = [
            'email'    => 'admin@admin.com',
            'password' => 'password',
        ];

        $users = [

            [
                'email'    => 'demo1@example.com',
                'password' => 'demo123',
            ],

            [
                'email'    => 'demo2@example.com',
                'password' => 'demo123',
            ],

            [
                'email'    => 'demo3@example.com',
                'password' => 'demo123',
            ],

        ];

        $adminUser = Sentinel::registerAndActivate($admin);
        $adminUser->roles()->attach($adminRole);

        foreach ($users as $user)
        {
            Sentinel::registerAndActivate($user);
        }
    }
}
