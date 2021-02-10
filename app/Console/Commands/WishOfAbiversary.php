<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

use App\Member;
use App\Mail\Aniversary;
use App\User;

class WishOfAbiversary extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wish:aniversary';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email to parent user to notify the Anniversary wishes';

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
                Mail::to($parentuser)->send(new Aniversary($value));
            }
        }
    }
}
