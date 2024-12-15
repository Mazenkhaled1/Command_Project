<?php

namespace App\Console\Commands;

use App\Models\Customer;
use Illuminate\Console\Command;

class Customers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Customer:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get All Cusotmer Records From db';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $customers = Customer::all();
        $data = $customers->map(function($cus){
            return 
            [
                $cus-> id , 
                $cus-> name ,
                $cus->subscribtion_end_date,
                $cus->created_at,
                $cus->updated_at, 
            ];
        });
        $this->info('Command executed successfully.');
        $this->table(['ID', 'Name', 'Sssubscribtion_end_date' , 'created_at' , 'updated_at'],$data);
    }
}
