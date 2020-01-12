<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * $product = [
                "product_name" => '',
                "product_description" => '',
                "product_type" => 'hosting', //hosting or ssl_certificate or domain
                "price" => ''
            ]
         */
        $hosting = [
            [
                "product_name" => 'Baby Slash',
                "product_description" => '512 MB storage plus A2 hosting',
                "product_type" => 'hosting',
                "price" => '3500'
            ],
            [
                "product_name" => 'Savanna',
                "product_description" => '1 GB  storage plus A2 hosting',
                "product_type" => 'hosting',
                "price" => '5500'
            ],
            [
                "product_name" => 'Rift Valley',
                "product_description" => '',
                "product_type" => 'hosting',
                "price" => '7000'
            ],
            [
                "product_name" => 'Longonot',
                "product_description" => '',
                "product_type" => 'hosting',
                "price" => '3500'
            ],
            [
                "product_name" => 'Elgon',
                "product_description" => '',
                "product_type" => 'hosting',
                "price" => '10500'
            ],
            [
                "product_name" => 'Kenya',
                "product_description" => '',
                "product_type" => 'hosting',
                "price" => '11000'
            ],
            [
                "product_name" => 'Kilimanjaro',
                "product_description" => '',
                "product_type" => 'hosting',
                "price" => '11500'
            ],
            [
                "product_name" => 'test package',
                "product_description" => 'test',
                "product_type" => 'hosting',
                "price" => '1'
            ]
        ];
        $ssl_certs = [
            [
                "product_name" => 'Geotrust RapidSSL Essential Certificate',
                "product_description" => 'SSL Certificate',
                "product_type" => 'ssl_certificate',
                "price" => '4400'
            ],
            [
                "product_name" => 'Geotrust QuickSSL Premium Certificate',
                "product_description" => 'SSL Certificate',
                "product_type" => 'ssl_certificate',
                "price" => '19800'
            ],
            [
                "product_name" => 'Sectigo Essential Certificate',
                "product_description" => 'SSL Certificate',
                "product_type" => 'ssl_certificate',
                "price" => '4400'
            ],
            [
                "product_name" => 'Sectigo Essential Wildcard Certificate',
                "product_description" => 'SSL Certificate',
                "product_type" => 'ssl_certificate',
                "price" => '19800'
            ]
        ];
        $domain_tlds = [
            [
                "product_name" => '.com',
                "product_description" => 'Domain',
                "product_type" => 'domain',
                "price" => '1500' //per year
            ],
            [
                "product_name" => '.co.ke',
                "product_description" => 'Domain',
                "product_type" => 'domain',
                "price" => '1500' //per year
            ],
            [
                "product_name" => '.ke',
                "product_description" => 'Domain',
                "product_type" => 'domain',
                "price" => '1500' //per year
            ]
        ];
        $products = array_merge($hosting,$ssl_certs,$domain_tlds);
        $products = array_map(function ($product) {
            $product['created_at'] = Carbon::now();
            $product['updated_at'] = Carbon::now();
            return $product;
        }, $products);
        DB::table('domaincart_products')->insert($products);
    }
}
