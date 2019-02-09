<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::create([
            'role'=>'admin',
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'role'=>'admin',
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'role'=>'admin',
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'role'=>'admin',
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'role'=>'admin',
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
        User::create([
            'nom' => $faker->lastName,
            'prenom' => $faker->firstName,
            'user' => str_replace('.', '_', $faker->unique()->userName),
            'email' => $faker->unique()->safeEmail,
            'description' =>$faker->text,
            'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
            'remember_token' => str_random(5),
        ]);
    }
}
