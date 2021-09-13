<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'hapo',
            'email' => 'test@haposoft.com',
            'password' => bcrypt('12345678'),
            'role' => '1',
            'avatar' => 'https://i.pinimg.com/originals/24/49/89/2449897a8d71f8eb56685009ef3ff91a.jpg'
        ]);

        User::factory(300)->create();
    }
}
