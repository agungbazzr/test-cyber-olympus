<?php

use Illuminate\Database\Seeder;
use App\CustomerModel;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CustomerModel::class, 100)->create();
    }
}
