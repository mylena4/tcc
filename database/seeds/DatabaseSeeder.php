<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $this->call(UsersTableSeeder::class);
        $this->call(ClienteTableSeeder::class);
        $this->call(FornecedoresTableSeeder::class);
        $this->call(MateriaisTableSeeder::class);
        $this->call(ProdutosTableSeeder::class);
    }
}
