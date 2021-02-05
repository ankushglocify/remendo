<?php

use Illuminate\Database\Seeder;
use App\Member;
class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mul_rows= [
				[ 'name' => 'test12','email'=>'test12@yopmail.com','phone' =>'7896541236','dob'=>date('Y-m-d'),'aniversary'=>date('Y-m-d'),'user_id'=>1],
				[ 'name' => 'test13','email'=>'test13@yopmail.com','phone' =>'7896541236','dob'=>date('Y-m-d'),'aniversary'=>date('Y-m-d'),'user_id'=>1],
				[ 'name' => 'test14','email'=>'test14@yopmail.com','phone' =>'7896541236','dob'=>date('Y-m-d'),'aniversary'=>date('Y-m-d'),'user_id'=>1]
				];
		$delete= Member::truncate();
		foreach ($mul_rows as $rows) {
			$insert= Member::create($rows);
		    }
	}
}
