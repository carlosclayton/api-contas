<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\ApiContas\Models\User::class, 5)->states('admin')->create()
            ->each(function ($user) {
                $user->verified = true;
                $user->save();
            });

        factory(\ApiContas\Models\User::class, 20)->states('client')->create()
            ->each(function ($user) {
                $user->verified = true;
                $user->save();
            });
    }
}
