<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WaifuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("waifus")->insert(
            array(
                "name" => "Catto",
                "slug" => "catto",
                "description" => "Sebuah koceng berwarna krem.",
                "price" => 1000,
                "src" => "catto.jpg"
            )
        );

        DB::table("waifus")->insert(
            array(
                "name" => "Dijual gitar",
                "slug" => "gitar",
                "description" => "Yang dijual gitarnya ya :3.",
                "price" => 1000,
                "src" => "gitar.jpg"
            )
        );

        DB::table("waifus")->insert(
            array(
                "name" => "Dijual kue",
                "slug" => "kue",
                "description" => "Yang dijual kuenya ya :3.",
                "price" => 1000,
                "src" => "kue.jpg"
            )
        );

        DB::table("waifus")->insert(
            array(
                "name" => "Dijual trombosit 1 liter",
                "slug" => "anone",
                "description" => "Stok terbatas gan",
                "price" => 1000,
                "src" => "anone.jpg"
            )
        );
    }
}
