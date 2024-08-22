<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;


class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Path to your JSON file
        $jsonFile = base_path('database/seeders/data/guru.json');

        // Check if the JSON file exists
        if (!File::exists($jsonFile)) {
            $this->command->error('File ' . $jsonFile . ' not found.');
            return;
        }

        // Read JSON file
        $json = File::get($jsonFile);

        // Decode JSON data
        $data = json_decode($json, true);

        // Check if JSON decoding was successful
        if (json_last_error() !== JSON_ERROR_NONE) {
            $this->command->error('Unable to parse JSON: ' . json_last_error_msg());
            return;
        }

        // Insert data into the database
        foreach ($data as $article) {
            // Add 'remember_token' and hash 'password'
            $article['remember_token'] = Str::random(10);
            $article['password'] = Hash::make($article['password']);

            DB::table('users')->insert($article);
        }

        $this->command->info('Data seeded successfully.');
    }
}
