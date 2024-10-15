<?php

namespace App\Providers;

use App\Models\Ssl;
use App\Models\Cloud;
use App\Models\Client;
use App\Models\Config;
use App\Models\Footer;
use App\Models\EmailServer;
use App\Models\SgoGiaiphap;
use App\Models\EmailSetting;
use App\Services\ConfigService;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        View::composer('*', function ($view) {
            $config = Config::first();

            $view->with('config', $config);
        });
    }

    protected function loadEmailSettingsToEnv()
    {
        // Lấy cấu hình email từ database
        // $emailSettings = EmailSetting::first();

        // if ($emailSettings) {
        //     // Đổ dữ liệu từ bảng email_settings vào file .env
        //     $this->updateEnv([
        //         'MAIL_USERNAME' => $emailSettings->mail_username,
        //         'MAIL_PASSWORD' => $emailSettings->mail_password,
        //     ]);
        // }
    }

    /**
     * Cập nhật file .env với dữ liệu mới
     */
    protected function updateEnv($data) {}
}
