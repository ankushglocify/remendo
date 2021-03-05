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
                $data[$parentuser][] = ['username'=>$user->user->name,'userphone'=>$user->user->phone, 'name' =>$user->name ,'email' =>$user->email, 'eventType' =>$eventType,'date' =>$date,'phone' => $user->phone];
               
        }
        
        if(count($data) > 0){
           
            foreach ($data as $key => $value) {
                $email=$key;
                $this->sendTextMsg($value);
                try{
                Mail::to($email)->send(new BirtdayMail($value));
                echo "string";
            }
            catch(Exception $e){
                echo $e->getMessage();// Never reached
            }
                
                }
    
        }
        
    }

    public function sendTextMsg ($value){

        $birthday='';
        $Anniversary='';
        foreach ($value as $key => $data) {
            if($data['eventType'] =='Birthday'){
                $birthday.= ($birthday == '')? $data['name']." - ".$data['phone'] :"\r\n".$data['name']." - ".$data['phone'];
            }elseif($data['eventType'] =='Aniversary'){
                $Anniversary.= ($Anniversary == '')? $data['name']." - ".$data['phone'] :"\r\n".$data['name']." - ".$data['phone'];
            }else{
                 $birthday.= ($birthday == '')? $data['name']." - ".$data['phone'] :"\r\n".$data['name']." - ".$data['phone'];
                 $Anniversary.= ($Anniversary == '')? $data['name']." - ".$data['phone'] :"\r\n".$data['name']." - ".$data['phone'] ;
            }
           
        }

        $username = "ganesh@glocify.com";
        $hash = "ecf50a9ae134beef725ebc621e25bfc53a0c48909b168f8d3aa855b82ac19f26";
        $name =$value[0]['username'];
        $phone = $value[0]['userphone'];
        // Config variables. Consult http://api.textlocal.in/docs for more info.
        $test = true;

        // Data for text message. This is the text message data.
        $sender = "RMNDIO"; // This is who the message appears to be from.
        $numbers =  $phone; // A single number or a comma-seperated list of numbers
        if($Anniversary != '' && $birthday !=''){
            $message = 'Dear '.$name.',

Send Birthday wishes to:

 '.$birthday.'

Send Anniversary wishes to:

 '.$Anniversary.'

Regards,
Team Remindio';
        }else if($Anniversary != '' && $birthday ==''){
            $message = 'Dear '.$name.',

Send Anniversary wishes to:

 '.$Anniversary.'

Regards,
Team Remindio';
        }else{
            $message = 'Dear '.$name.',

Send Birthday wishes to:

 '.$birthday.'

Regards,
Team Remindio';
        }
        
        // 612 chars or less
        // A single number or a comma-seperated list of numbers
        $message = rawurlencode($message);
        $data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
        $ch = curl_init('http://api.textlocal.in/send/?');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch); // This is the result from the API
        curl_close($ch);
        //print_r(json_decode($result));
        //die();
        }
        
}
