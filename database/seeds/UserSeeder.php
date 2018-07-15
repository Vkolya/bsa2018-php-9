<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    const DATA = [
        [
            'name' => 'kolya',
            'email' => 'vkolia@mail.ua',
            'password' => '$2y$10$y2Y.iRScgVjeJtXT21ofsOlaD/zO.nanyc/eX0wLrRpAXJ9bkjCjy', //111111
            'is_admin' => 0,
        ],
    
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::query()->insert(self::DATA);
    }
}
