<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Domains\SuperAdmin\Models\DivisionSetting;
use App\Domains\SuperAdmin\Models\GlobalSetting;

class SystemSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Seed Divisions
        $divisions = [
            [
                'id' => 1,
                'name' => 'Jasa Buat Website',
                'key' => 'WEB_DEV',
                'color' => '#60a5fa',
                'domain' => 'buatwebjogja.gro.co.id',
                'db_name' => 'grop6915_buatweb_jogja',
                'db_user' => 'grop6915_ganang',
                'db_password' => 'FuvmtTA4f6sz36',
                'folder' => '/Users/mac/Project Website/Kerja/PT. Gro/jasabuatwebsite',
            ],
            [
                'id' => 2,
                'name' => 'Jasa Buat Logo',
                'key' => 'BRAND_IDENTITY',
                'color' => '#a78bfa',
                'domain' => 'buatlogojogja.gro.co.id',
                'db_name' => 'grop6915_Jasa_Buat_Logo',
                'db_user' => 'grop6915_ganang',
                'db_password' => 'FuvmtTA4f6sz36',
                'folder' => '/Users/mac/Project Website/Kerja/PT. Gro/Jasa_Buat_Logo',
            ],
            [
                'id' => 3,
                'name' => 'Jasa Advertising',
                'key' => 'PERF_ADS',
                'color' => '#fb923c',
                'domain' => 'sosmedjogja.gro.co.id',
                'db_name' => 'grop6915_Jasa_Social_Media_Management',
                'db_user' => 'grop6915_ganang',
                'db_password' => 'FuvmtTA4f6sz36',
                'folder' => '/Users/mac/Project Website/Kerja/PT. Gro/Jasa_Advertising',
            ],
            [
                'id' => 4,
                'name' => 'Jasa 3D Mockup',
                'key' => 'MOCKUP_3D',
                'color' => '#22d3ee',
                'domain' => 'animation.jogja.gro.co.id',
                'db_name' => 'grop6915_Jasa_Buat_Design',
                'db_user' => 'grop6915_ganang',
                'db_password' => 'FuvmtTA4f6sz36',
                'folder' => '/Users/mac/Project Website/Kerja/PT. Gro/Jasa-3D-Mockup',
            ],
            [
                'id' => 5,
                'name' => 'SaaS',
                'key' => 'SAAS',
                'color' => '#f472b6',
                'domain' => 'inven.gro.co.id',
                'db_name' => 'grop6915_SaaS',
                'db_user' => 'grop6915_ganang',
                'db_password' => 'FuvmtTA4f6sz36',
                'folder' => '/Users/mac/Project Website/Kerja/PT. Gro/SaaS',
            ],
            [
                'id' => 6,
                'name' => 'Jasa 3D Arsitek',
                'key' => 'DESIGN_3D_ARSITEK',
                'color' => '#f87171',
                'domain' => 'designrumah.gro.co.id',
                'db_name' => 'grop6915_Jasa_3D_Arsitek',
                'db_user' => 'grop6915_ganang',
                'db_password' => 'FuvmtTA4f6sz36',
                'folder' => '/Users/mac/Project Website/Kerja/PT. Gro/Jasa_3D-Arsitek',
            ],
        ];

        foreach ($divisions as $div) {
            DivisionSetting::updateOrCreate(['id' => $div['id']], $div);
        }

        // Seed Global Settings
        $globalSettings = [
            'cpanel_api_token' => '',
            'meta_ads_token' => '',
            'google_ads_token' => '',
            'smtp_host' => 'smtp.mailtrap.io',
            'smtp_port' => '587',
            'smtp_user' => 'dnb-system-notif',
            'smtp_password' => '',
        ];

        foreach ($globalSettings as $key => $val) {
            GlobalSetting::updateOrCreate(['key' => $key], ['value' => $val]);
        }
    }
}
