<?php
namespace Database\Seeders;

use App\Models\Noticia;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Noticia::factory(30)->create();
        $this->call([UsersTableSeeder::class]);
    }
}
