<?php

use Illuminate\Database\Seeder;

class Timkiemsp extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\product::class, 20000)->create();
    }
}
