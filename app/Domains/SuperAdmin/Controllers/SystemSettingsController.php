<?php

namespace App\Domains\SuperAdmin\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domains\SuperAdmin\Models\DivisionSetting;
use App\Domains\SuperAdmin\Models\GlobalSetting;

class SystemSettingsController extends Controller
{
    /**
     * Fetch all settings as JSON.
     */
    public function fetchSettings()
    {
        $divisions = DivisionSetting::orderBy('id', 'asc')->get()->map(function($div) {
            return [
                'id' => $div->id,
                'name' => $div->name,
                'key' => $div->key,
                'color' => $div->color,
                'domain' => $div->domain,
                'dbName' => $div->db_name,
                'dbUser' => $div->db_user,
                'dbPassword' => $div->db_password,
                'folder' => $div->folder,
            ];
        });
        $globalsList = GlobalSetting::all()->pluck('value', 'key');

        return response()->json([
            'divisions' => $divisions,
            'globals' => [
                'cpanelApiToken' => $globalsList->get('cpanel_api_token', ''),
                'metaAdsToken' => $globalsList->get('meta_ads_token', ''),
                'googleAdsToken' => $globalsList->get('google_ads_token', ''),
                'smtpHost' => $globalsList->get('smtp_host', 'smtp.mailtrap.io'),
                'smtpPort' => $globalsList->get('smtp_port', '587'),
                'smtpUser' => $globalsList->get('smtp_user', 'dnb-system-notif'),
                'smtpPassword' => $globalsList->get('smtp_password', ''),
            ]
        ]);
    }

    /**
     * Save/update a division node configuration.
     */
    public function saveDivision(Request $request, $id)
    {
        $division = DivisionSetting::findOrFail($id);

        $validated = $request->validate([
            'domain' => 'nullable|string|max:255',
            'folder' => 'nullable|string|max:500',
            'db_name' => 'nullable|string|max:255',
            'db_user' => 'nullable|string|max:255',
            'db_password' => 'nullable|string|max:255',
        ]);

        // Map frontend camelCase to snake_case if necessary
        // In our fetch settings, we return db_name, db_user, db_password as is. 
        // Let's make sure we accept both camelCase and snake_case.
        $division->update([
            'domain' => $request->input('domain', $division->domain),
            'folder' => $request->input('folder', $division->folder),
            'db_name' => $request->input('dbName', $request->input('db_name', $division->db_name)),
            'db_user' => $request->input('dbUser', $request->input('db_user', $division->db_user)),
            'db_password' => $request->input('dbPassword', $request->input('db_password', $division->db_password)),
        ]);

        return response()->json([
            'success' => true,
            'message' => "Konfigurasi Node \"{$division->name}\" berhasil disimpan.",
            'division' => $division
        ]);
    }

    /**
     * Test dynamic database connection.
     */
    public function testDbConnection(Request $request, $id)
    {
        $division = DivisionSetting::findOrFail($id);

        // We can test using either current DB config or input from request
        $dbName = $request->input('dbName', $request->input('db_name', $division->db_name));
        $dbUser = $request->input('dbUser', $request->input('db_user', $division->db_user));
        $dbPassword = $request->input('dbPassword', $request->input('db_password', $division->db_password));

        if (empty($dbName)) {
            return response()->json([
                'success' => false,
                'message' => 'Database Name tidak boleh kosong.'
            ]);
        }

        // Detect if SQLite
        if (str_ends_with($dbName, '.sqlite') || file_exists($dbName)) {
            try {
                $pdo = new \PDO("sqlite:{$dbName}");
                return response()->json([
                    'success' => true,
                    'message' => "Koneksi database SQLite ke \"{$dbName}\" Berhasil!"
                ]);
            } catch (\PDOException $e) {
                return response()->json([
                    'success' => false,
                    'message' => "Koneksi SQLite Gagal: " . $e->getMessage()
                ]);
            }
        }

        // MySQL connection
        $host = config('database.connections.mysql.host', '127.0.0.1');
        $port = config('database.connections.mysql.port', '3306');
        
        $dsn = "mysql:host={$host};port={$port};dbname={$dbName};charset=utf8mb4";

        try {
            // Set short timeout for testing connections
            $pdo = new \PDO($dsn, $dbUser, $dbPassword, [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_TIMEOUT => 3, // 3 seconds timeout
            ]);

            return response()->json([
                'success' => true,
                'message' => "Koneksi database ke \"{$dbName}\" ({$division->name}) Berhasil!\nHost: {$host}\nPort: {$port}\nUser: {$dbUser}\nStatus: Active & Connected"
            ]);
        } catch (\PDOException $e) {
            return response()->json([
                'success' => false,
                'message' => "Koneksi Gagal: " . $e->getMessage()
            ]);
        }
    }

    /**
     * Save global third-party settings and SMTP settings.
     */
    public function saveGlobalSettings(Request $request)
    {
        $settings = [
            'cpanel_api_token' => $request->input('cpanelApiToken'),
            'meta_ads_token' => $request->input('metaAdsToken'),
            'google_ads_token' => $request->input('googleAdsToken'),
            'smtp_host' => $request->input('smtpHost', 'smtp.mailtrap.io'),
            'smtp_port' => $request->input('smtpPort', '587'),
            'smtp_user' => $request->input('smtpUser', 'dnb-system-notif'),
            'smtp_password' => $request->input('smtpPassword'),
        ];

        foreach ($settings as $key => $value) {
            if ($value !== null) {
                GlobalSetting::updateOrCreate(
                    ['key' => $key],
                    ['value' => $value]
                );
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Pengaturan Global Third-Party Integrations & SMTP berhasil disimpan.'
        ]);
    }
}
