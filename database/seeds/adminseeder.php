<?php

use Illuminate\Database\Seeder;
use App\User;
class adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     $user=new User();
     $user->name='Mujib';
     $user->password=bcrypt('qwe_12345');
     $user->email='salimjan3008@gmail.com';
     $user->state=0;
     $user->photo='ddd.jpg';
     $user->save();
    }
}
