<?php

namespace App\Jobs;

use App\Helpers\MailHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendSubExpireMessageJob implements ShouldQueue
{
    
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $expire_date ; 
    private $customer ; 
    /**
     * Create a new job instance.
     */
    public function __construct($expire_date , $customer)
    {   
        $this->expire_date = $expire_date;
        $this->customer = $customer ; 

    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        info('im here from job class') ;
        $mailHelper = new MailHelper();
        $mailHelper->sendMail('emails.subscribtion_expiration' , $this->customer->email  , 'Your date is expired' ,'mazen' ) ;

        
    }
}
