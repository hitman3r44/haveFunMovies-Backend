<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('settings')->delete();
        DB::table('settings')->insert($this->getSettingsData());
    }

    private function getSettingsData()
    {
        return [
            [
                'key' => 'site_name',
                'value' => 'Have Fun Movies',
            ],

            [
                'key' => 'site_logo',
                'value' => env('APP_URL') . '/uploads/images/logo.png',
            ],

            [
                'key' => 'site_icon',
                'value' => env('APP_URL') . '/uploads/images/favicon.png',
            ],

            [
                'key' => 'tag_name',
                'value' => '',
            ],

            [
                'key' => 'browser_key',
                'value' => '',
            ],

            [
                'key' => 'default_lang',
                'value' => '',
            ],

            [
                'key' => 'currency',
                'value' => '$',
            ],

            [
                'key' => 'admin_delete_control',
                'value' => '0',
            ],

            [
                'key' => 'installation_process',
                'value' => '3',
            ],

            [
                'key' => 'amount',
                'value' => '10',
            ],

            [
                'key' => 'expiry_days',
                'value' => '28',
            ],

            [
                'key' => 'admin_take_count',
                'value' => '12',
            ],

            [
                'key' => 'google_analytics',
                'value' => '',
            ],

            [
                'key' => 'streaming_url',
                'value' => 'http://streaming.url:8080/',
            ],

            [
                'key' => 'video_compress_size',
                'value' => '50',
            ],

            [
                'key' => 'image_compress_size',
                'value' => '8',
            ],

            [
                'key' => 's3_bucket',
                'value' => '',
            ],

            [
                'key' => 'track_user_mail',
                'value' => '',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Sexual content',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Violent or repulsive content.',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Hateful or abusive content.',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Harmful dangerous acts.',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Child abuse.',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Spam or misleading.',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Infringes my rights.',
            ],

            [
                'key' => 'REPORT_VIDEO',
                'value' => 'Captions issue.',
            ],

            [
                'key' => 'VIDEO_RESOLUTIONS',
                'value' => '426x240',
            ],

            [
                'key' => 'VIDEO_RESOLUTIONS',
                'value' => '640x360',
            ],

            [
                'key' => 'VIDEO_RESOLUTIONS',
                'value' => '854x480',
            ],

            [
                'key' => 'VIDEO_RESOLUTIONS',
                'value' => '1280x720',
            ],

            [
                'key' => 'VIDEO_RESOLUTIONS',
                'value' => '1920x1080',
            ],

            [
                'key' => 'email_verify_control',
                'value' => '0',
            ],

            [
                'key' => 'is_subscription',
                'value' => '1',
            ],

            [
                'key' => 'is_spam',
                'value' => '1',
            ],

            [
                'key' => 'is_payper_view',
                'value' => '1',
            ],

            [
                'key' => 'admin_language_control',
                'value' => '1',
            ],

            [
                'key' => 'appstore',
                'value' => '',
            ],

            [
                'key' => 'playstore',
                'value' => '',
            ],

            [
                'key' => 'home_page_bg_image',
                'value' => env('APP_URL') . '/images/home_page_bg_image.jpg',
            ],

            [
                'key' => 'common_bg_image',
                'value' => env('APP_URL') . '/images/login-bg.jpg',
            ],

            [
                'key' => 'header_scripts',
                'value' => '',
            ],

            [
                'key' => 'body_scripts',
                'value' => '',
            ],

            [
                'key' => 'ANGULAR_SITE_URL',
                'value' => '',
            ],

            [
                'key' => 'JWPLAYER_KEY',
                'value' => 'M2NCefPoiiKsaVB8nTttvMBxfb1J3Xl7PDXSaw==',
            ],

            [
                'key' => 'HLS_STREAMING_URL',
                'value' => '',
            ],

            [
                'key' => 'demo_admin_email',
                'value' => '',
            ],

            [
                'key' => 'demo_admin_password',
                'value' => '',
            ],

            [
                'key' => 'post_max_size',
                'value' => '20M',
            ],

            [
                'key' => 'upload_max_size',
                'value' => '20M',
            ],

            [
                'key' => 'stripe_publishable_key',
                'value' => 'pk_test_uDYrTXzzAuGRwDYtu7dkhaF3',
            ],

            [
                'key' => 'stripe_secret_key',
                'value' => 'sk_test_lRUbYflDyRP3L2UbnsehTUHW',
            ],

            [
                'key' => 'video_viewer_count',
                'value' => '10',
            ],

            [
                'key' => 'amount_per_video',
                'value' => '100',
            ],

            [
                'key' => 'minimum_redeem',
                'value' => '1',
            ],

            [
                'key' => 'redeem_control',
                'value' => '1',
            ],

            [
                'key' => 'admin_commission',
                'value' => '10',
            ],

            [
                'key' => 'user_commission',
                'value' => '90',
            ],

            [
                'key' => 'facebook_link',
                'value' => '',
            ],

            [
                'key' => 'linkedin_link',
                'value' => '',
            ],

            [
                'key' => 'twitter_link',
                'value' => '',
            ],

            [
                'key' => 'google_plus_link',
                'value' => '',
            ],

            [
                'key' => 'pinterest_link',
                'value' => '',
            ],

            [
                'key' => 'token_expiry_hour',
                'value' => '1',
            ],

            [
                'key' => 'MAILGUN_PUBLIC_KEY',
                'value' => 'pubkey-7dc021cf4689a81a4afb340d1a055021',
            ],

            [
                'key' => 'MAILGUN_PRIVATE_KEY',
                'value' => '',
            ],

            [
                'key' => 'copyright_content',
                'value' => 'Copyrights 2018 . All rights reserved.',
            ],

            [
                'key' => 'contact_email',
                'value' => '',
            ],

            [
                'key' => 'contact_address',
                'value' => '',
            ],

            [
                'key' => 'contact_mobile',
                'value' => '',
            ],

            [
                'key' => 'RTMP_SECURE_VIDEO_URL',
                'value' => '',
            ],

            [
                'key' => 'HLS_SECURE_VIDEO_URL',
                'value' => '',
            ],

            [
                'key' => 'VIDEO_SMIL_URL',
                'value' => '',
            ],

            [
                'key' => 'socket_url',
                'value' => 'http://your-ip-address:3003/',
            ],

            [
                'key' => 'email_notification',
                'value' => '1',
            ],

            [
                'key' => 'custom_users_count',
                'value' => '50',
            ],

            [
                'key' => 'ios_payment_subscription_status',
                'value' => '0',
            ],

            [
                'key' => 'no_of_static_pages',
                'value' => '8',
            ],

            [
                'key' => 'prefix_file_name',
                'value' => 'SV',
            ],

            [
                'key' => 'ffmpeg_installed',
                'value' => '1',
            ],

            [
                'key' => 'home_banner_heading',
                'value' => 'See what\'s next.',
            ],

            [
                'key' => 'home_banner_description',
                'value' => 'WATCH ANYWHERE. CANCEL ANYTIME.',
            ],

            [
                'key' => 'home_about_site',
                'value' => 'Have Fun Movies is programmed to start subscription based on-demand video streaming sites like Netflix and Amazon Prime. Any business idea with this core concept can be easily developed using Have Fun Movies. From admin uploading a video to users making payment to users watching the videos, it’s all automated by a dynamic and responsive admin panel with multiple monetization channels.',
            ],

            [
                'key' => 'home_cancel_content',
                'value' => 'If you decide Have Fun Movies isn\'t for you - no problem. No commitment. Cancel online at anytime.',
            ],

            [
                'key' => 'home_browse_desktop_image',
                'value' => 'http://demo.streamhash.com/img/lap.png',
            ],

            [
                'key' => 'home_browse_tv_image',
                'value' => 'http://demo.streamhash.com/img/tv-ui.png',
            ],

            [
                'key' => 'home_browse_mobile_image',
                'value' => 'http://demo.streamhash.com/img/mobile.png',
            ],

            [
                'key' => 'home_cancel_image',
                'value' => 'http://demo.streamhash.com/img/cancel.png',
            ],

            [
                'key' => 'meta_title',
                'value' => 'HaveFunMovies',
            ],

            [
                'key' => 'meta_description',
                'value' => 'HaveFunMovies',
            ],

            [
                'key' => 'meta_author',
                'value' => 'HaveFunMovies',
            ],

            [
                'key' => 'meta_keywords',
                'value' => 'HaveFunMovies',
            ],

            [
                'key' => 'is_mailgun_check_email',
                'value' => '0',
            ],
        ];
    }
}
