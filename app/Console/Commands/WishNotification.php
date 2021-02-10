<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Member;
use App\Mail\BirtdayMail;
use App\User;

class WishNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wish:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to parent user to notify the Birthdays and Anniversary';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $users = Member::whereMonth('dob', '=', date('m'))->whereDay('dob', '=', date('d'))->get(); 
         $data =[];
         foreach($users as $user){

                $parentuser = $user->user->email;
                $user_name =  $user->name;
                $data[$parentuser][] = ['name' =>$user->name ,'email' =>$user->email];
               
        }
        
        if(count($data) > 0){
            foreach ($data as $key => $value) {;
                $email=$key;
                Mail::to($parentuser)->send(new BirtdayMail($value));
            }
        }
        

   //$this->info($i.' Birthday messages sent successfully!');
    }
}