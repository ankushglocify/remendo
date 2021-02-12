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
         $users = Member::whereMonth('dob', '=', date('m'))->whereDay('dob', '=', date('d'))->orWhere(function($query){
                                   $query->whereMonth('aniversary', '=', date('m'))->whereDay('aniversary', '=', date('d')); })->get(); 
         $data =[];
         foreach($users as $user){

                $parentuser = $user->user->email;
                $user_name =  $user->name;
                $monthday = date("m-d"); 
                $eventaniversary = '';
                $eventdob = '';
                $aniversary = date("m-d",strtotime($user->aniversary));
                $dob = date("m-d",strtotime($user->dob));
                    if($aniversary == $monthday ){
                        $eventType = 'Aniversary';
                        $date = date('F, d',strtotime($user->aniversary));
                    }
                    if($dob == $monthday ){
                        $eventType = 'Birthday';
                        $date = date('F, d',strtotime($user->dob));
                    }
                    if($aniversary == $monthday && $dob == $monthday){
                        $eventType = 'Aniversary , Birthday';
                    }
                $data[$parentuser][] = ['username'=>$user->user->name, 'name' =>$user->name ,'email' =>$user->email, 'eventType' =>$eventType,'date' =>$date,'phone' => $user->phone];
               
        }
        
        if(count($data) > 0){
           
            foreach ($data as $key => $value) {
                $email=$key;
                try{
                Mail::to($email)->send(new BirtdayMail($value));
                echo "string";
            }
            catch(Exception $e){
                echo $e->getMessage();// Never reached
            }
                
                }
    
        }
        

   //$this->info($i.' Birthday messages sent successfully!');
    }
}
