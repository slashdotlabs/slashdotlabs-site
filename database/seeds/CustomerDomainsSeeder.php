<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CustomerDomainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$domain = [
    		"domain_name" => '',
        	"domain_tld_id" => '',
        	"customer_id" => ''
    	];

        $customer_domains = [
        	[
        	"domain_name" => 'www.sifa.co.ke',
        	"domain_tld_id" => '1',
        	"customer_id" => '3'
        	],

        	[
        	"domain_name" => 'www.maranda.com',
        	"domain_tld_id" => '1',
        	"customer_id" => '4'
        	],

        	[
        	"domain_name" => 'www.slash.org',
        	"domain_tld_id" => '1',
        	"customer_id" => '5'
        	]
        ];
        
        $customer_domains = array_map(function ($domain) {
            $domain['created_at'] = Carbon::now();
            $domain['updated_at'] = Carbon::now();
            return $domain;
        }, $customer_domains);
        DB::table('customer_domains')->insert($customer_domains);
    }
}
