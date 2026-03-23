<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SeoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('seos')->insert([
            [
                'title' => 'Code and Click - Web & Mobile Development Company',
                'description' => 'Code and Click is a professional software development company providing web development, mobile apps, UI/UX design, and digital solutions.',
                'keyword' => 'codeandclick, web development, mobile app development, UI UX, software company, Myanmar tech company',
                'seoable_type' => 'App\Models\Page', // adjust if needed
                'seoable_id' => 1, // adjust based on your data
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
	[
                'title' => 'Code and Click Official Website',
                'description' => 'Visit Code and Click official website to explore services, portfolio, and digital solutions.',
                'keyword' => 'codeandclick website, cnc netra asia, software agency, development services',
                'seoable_type' => 'App\Models\Page',
                'seoable_id' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'title' => 'Custom Software Development Services',
                'description' => 'We provide scalable and secure custom software solutions tailored for startups and enterprises.',
                'keyword' => 'custom software, laravel development, react development, backend systems',
                'seoable_type' => 'App\Models\Service',
                'seoable_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
