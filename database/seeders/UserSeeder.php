<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'username' => 'Mai_Tuyet',
                'first_name' => 'Pham Thi',
                'last_name' => 'Mai Tuyet',
                'email' => 'maituyet00@gmail.com',
                'isAdmin' => '1',           
                'isActive' => '0',           
                'password' => Hash::make('123456'),
            ],
            [
                'username' => 'abcpham',
                'first_name' => 'Pham',
                'last_name' => 'abc',
                'email' => 'maituyet@gmail.com',
                'isAdmin' => '0',           
                'isActive' => '0',           
                'password' => Hash::make('123456'),
            ]
        ]);
        User::factory()->count(20)->create();
    }
}
