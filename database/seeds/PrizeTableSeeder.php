<?php

use Illuminate\Database\Seeder;

class PrizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('prize_types')->insert([
        	['name' => 'First Prize','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        	['name' => 'Second Prize - 1st Winner','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        	['name' => 'Second Prize - 2nd Winner','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        	['name' => 'Third Prize - 1st Winner','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        	['name' => 'Third Prize - 2nd Winner','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        	['name' => 'Third Prize - 3rd Winner','created_at' => date("Y-m-d H:i:s"),'updated_at' => date("Y-m-d H:i:s")],
        ]);
    }
}
