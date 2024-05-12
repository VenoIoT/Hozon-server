<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (DB::table('categories')->count() == 0) {

            Category::insert([
                [
                    'category' => 'passwords',
                    'description' => 'passwords'


                ],
                [
                    'category' => 'API keys',
                    'description' => 'API keys'


                ],
                [
                    'category' => 'encryption keys',
                    'description' => ' encryption keys'


                ]
                ,
                [
                    'category' => 'SSL/TLS certificates',
                    'description' => 'SSL/TLS certificates'


                ],
                [
                    'category' => 'SSH keys',
                    'description' => 'SSH keys'


                ]
                ,
                [
                    'category' => 'Database Credentials',
                    'description' => 'Database Credentials'


                ]
                ,
                [
                    'category' => 'OAuth tokens',
                    'description' => 'OAuth tokens'


                ]
                ,
                [
                    'category' => 'token or secret',
                    'description' => 'token or secret'

                ]
                ,
                [
                    'category' => 'configuration files',
                    'description' => 'configuration files'
                ]
                ,
                [
                    'category' => 'digital certificates',
                    'description' => 'digital certificates'


                ],
                [
                    'category' => 'access codes',
                    'description' => 'access codes'


                ],
                [
                    'category' => 'license keys',
                    'description' => 'license keys'


                ]
            ]);

        }
    }
}
