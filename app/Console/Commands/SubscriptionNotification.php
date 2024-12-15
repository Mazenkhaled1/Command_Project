<?php

namespace App\Console\Commands;

use App\Jobs\SendSubExpireMessageJob;
use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SubscriptionNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscription:SubscriptionNotification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check which subscribed users have been expired';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expired_customers = Customer::where('subscribtion_end_date' ,'<', now() )->get();
        foreach( $expired_customers as $customer)
        {
            info('im here from command class') ;
             $expire_date = Carbon::createFromFormat('Y-m-d' , $customer->subscribtion_end_date)->toDateString() ;
            dispatch(new SendSubExpireMessageJob($expire_date , $customer)) ;
            // info('success') ;
        }
    }
}
