<?php

use Illuminate\Database\Seeder;
use App\User;
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
        User::create([
           'name'     => 'Admin',
           'role'     => '0',
           'email'    => 'admin@gmail.com',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Admin 2',
           'role'     => '0',
           'email'    => 'admin2@gmail.com',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Agriculture',
           'role'     => '1',
           'email'    => 'agriculture@gmail.com',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Bio-Organic Agriculture',
           'role'     => '1',
           'email'    => 'z.jabbour@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Biodiversity & Permaculture',
           'role'     => '1',
           'email'    => 'soumia@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Concept Store',
           'role'     => '1',
           'email'    => 'alen@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Events',
           'role'     => '1',
           'email'    => 'mazhar@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'F & B',
           'role'     => '1',
           'email'    => 'shefa.k@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Lodges',
           'role'     => '1',
           'email'    => 'reservations@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Wellness',
           'role'     => '1',
           'email'    => 'ruby@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
        User::create([
           'name'     => 'Workshops',
           'role'     => '1',
           'email'    => 'yara@caravane.earth',
           'password' => Hash::make('12345678'),
        ]);
    }
}
