<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'username'=>'adminrk',
            'password'=>bcrypt('admin098'),
        ]);
    }
}
