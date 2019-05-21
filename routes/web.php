<?php

use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/***********************  UI Routes *********************/

Route::get('/upload-video' , 'UIController@upload_video');

Route::get('/video-notification' , 'UIController@video_notification');

/***********************  UI Routes *********************/

/*********************** TEST ROUTES *********************/

Route::get('/test' , 'SampleController@test');

Route::post('/test' , 'SampleController@get_image')->name('sample');

Route::get('/export' , 'SampleController@sample_export');

Route::get('/compress' , 'SampleController@compress_image_upload')->name('compress.image');

Route::get('/compress/i' , 'SampleController@compress_image_check');

Route::post('/compress/image' , 'SampleController@getImageThumbnail');

Route::get('/sendpush' , 'SampleController@send_push_notification');

Route::get('new/dashboard' , 'SampleController@newDashboard');
Route::get('new/form' , 'SampleController@newForm');
Route::get('new/chart' , 'SampleController@newChart');
Route::get('new/ui-element' , 'SampleController@uiElement');
Route::get('new/data-table' , 'SampleController@datatable');
Route::get('new/signin' , 'SampleController@signin');

/*********************** TEST ROUTES *********************/



Route::get('/generate/index' , 'ApplicationController@generate_index');


/***********************  UI Routes *********************/

Route::get('/upload-video' , 'AdminController@upload_video');

// Singout from all devices which is expired account
Route::get('signout/all/devices', 'ApplicationController@signout_all_devices');


Route::get('/email/verification' , 'ApplicationController@email_verify')->name('email.verify');

Route::get('/check/token', 'ApplicationController@check_token_expiry')->name('check_token_expiry');

// Installation
//
//Route::get('/configuration', 'InstallationController@install')->name('installTheme');
//
//Route::get('/system/check', 'InstallationController@system_check_process')->name('system-check');
//
//Route::post('/configuration', 'InstallationController@theme_check_process')->name('install.theme');
//
//Route::post('/install/settings', 'InstallationController@settings_process')->name('install.settings');


// CRON

Route::get('/publish/video', 'ApplicationController@cron_publish_video')->name('publish');

Route::get('/notification/payment', 'ApplicationController@send_notification_user_payment')->name('notification.user.payment');

Route::get('/payment/expiry', 'ApplicationController@user_payment_expiry')->name('user.payment.expiry');

Route::get('/payment/failure' , 'ApplicationController@payment_failure')->name('payment.failure');

Route::get('/automatic/renewal', 'ApplicationController@automatic_renewal_stripe')->name('automatic.renewal');

// Generral configuration routes

Route::post('project/configurations' , 'ApplicationController@configuration_site');


// Static Pages

Route::get('/privacy', 'UserApiController@privacy')->name('user.privacy');

Route::get('/terms_condition', 'UserApiController@terms')->name('user.terms');

Route::get('/static/terms', 'UserApiController@terms')->name('user.terms');

Route::get('/contact', 'UserController@contact')->name('user.contact');

Route::get('/privacy_policy', 'ApplicationController@privacy')->name('user.privacy_policy');

Route::get('/terms', 'ApplicationController@terms')->name('user.terms-condition');

Route::get('/about', 'ApplicationController@about')->name('user.about');

// Video upload

Route::post('select/sub_category' , 'ApplicationController@select_sub_category')->name('select.sub_category');

Route::post('select/genre' , 'ApplicationController@select_genre')->name('select.genre');
Route::get('select/genre' , 'ApplicationController@select_genre')->name('select.genre');

Route::get('/admin-control', 'ApplicationController@admin_control')->name('admin_control');

Route::post('save_admin_control', 'ApplicationController@save_admin_control')->name('save_admin_control');













Route::group(['prefix' => 'admin'  , 'as' => 'admin.'], function(){

    Auth::routes();
    Route::get('register', function () {
        return abort(404);
    })->name('register');
    Route::post('register', function () {
        return abort(404);
    })->name('register');


    Route::get('/', 'AdminController@dashboard')->name('dashboard');

    Route::get('/profile', 'AdminController@profile')->name('profile');

    Route::post('/profile/save', 'AdminController@profile_save')->name('save.profile');

    Route::post('/change/password', 'AdminController@change_password')->name('change.password');

    // users

    Route::get('/users', 'AdminController@users')->name('users');

    Route::get('users/create', 'AdminController@users_create')->name('users.create');

    Route::get('users/edit', 'AdminController@users_edit')->name('users.edit');

    Route::post('users/create', 'AdminController@users_save')->name('save.user');

    Route::get('users/delete', 'AdminController@users_delete')->name('users.delete');

    Route::get('/users/view/{id}', 'AdminController@users_view')->name('users.view');

    Route::get('/users/subprofiles/{id}', 'AdminController@users_sub_profiles')->name('users.subprofiles');

    Route::get('users/status/change', 'AdminController@users_status_change')->name('users.status.change');

    Route::get('/users/upgrade/{id}', 'AdminController@users_upgrade')->name('users.upgrade');

    Route::any('users/upgrade-disable', 'AdminController@users_upgrade_disable')->name('users.upgrade.disable');

    Route::get('moderators/redeems/{id?}', 'AdminController@moderators_redeem_requests')->name('moderators.redeems');

    Route::any('/moderators/payout/invoice', 'AdminController@moderators_redeems_payout_invoice')->name('moderators.payout.invoice');

    Route::post('moderators/payout/direct', 'AdminController@moderators_redeems_payout_direct')->name('moderators.payout.direct');

    Route::any('/moderators/payout/response', 'AdminController@moderators_redeems_payout_response')->name('moderators.payout.response');

    Route::get('/users/verify/{id?}', 'AdminController@users_verify_status')->name('users.verify');


    Route::get('/user/clear-login', 'AdminController@clear_login')->name('users.clear-login');

    // User History - admin

    Route::get('/user/history/{id}', 'AdminController@view_history')->name('user.history');

    Route::get('/delete/history/{id}', 'AdminController@delete_history')->name('delete.history');

    // User Wishlist - admin

    Route::get('/user/wishlist/{id}', 'AdminController@view_wishlist')->name('user.wishlist');

    Route::get('/delete/wishlist/{id}', 'AdminController@delete_wishlist')->name('delete.wishlist');

    // Spam Videos

    Route::get('/spam-videos', 'AdminController@spam_videos')->name('spam-videos');

    Route::get('/spam-videos/user-reports/{id}', 'AdminController@spam_videos_user_reports')->name('spam-videos.user-reports');

    // Redeem Pay from Paypal

    Route::get('moderator/redeem-pay', 'RedeemPaymentController@redeem_pay')->name('moderator.redeem_pay');

    Route::get('moderator/redeem-pay-status', 'RedeemPaymentController@redeem_pay_status')->name('moderator.redeem_pay_status');


    // Moderators

    Route::get('/moderators', 'AdminController@moderators')->name('moderators');

    Route::get('/add/moderator', 'AdminController@add_moderator')->name('add.moderator');

    Route::get('/edit/moderator/{id}', 'AdminController@edit_moderator')->name('edit.moderator');

    Route::post('/add/moderator', 'AdminController@add_moderator_process')->name('save.moderator');

    Route::get('/delete/moderator/{id}', 'AdminController@delete_moderator')->name('delete.moderator');

    Route::get('/moderator/approve/{id}', 'AdminController@moderator_approve')->name('moderator.approve');

    Route::get('/moderator/decline/{id}', 'AdminController@moderator_decline')->name('moderator.decline');

    Route::get('/view/moderator/{id}', 'AdminController@moderator_view_details')->name('moderator.view');

    // Categories

    Route::get('/categories', 'AdminController@categories')->name('categories');

    Route::get('/add/category', 'AdminController@add_category')->name('add.category');

    Route::get('/edit/category/{id}', 'AdminController@edit_category')->name('edit.category');

    Route::post('/add/category', 'AdminController@add_category_process')->name('save.category');

    Route::get('/delete/category', 'AdminController@delete_category')->name('delete.category');

    Route::get('/view/category/{id}', 'AdminController@view_category')->name('view.category');

    Route::get('/category/approve', 'AdminController@approve_category')->name('category.approve');

    // Admin Sub Categories

    Route::get('/subCategories/{category}', 'AdminController@sub_categories')->name('sub_categories');

    Route::get('/add/subCategory/{category}', 'AdminController@add_sub_category')->name('add.sub_category');

    Route::get('/edit/subCategory/{category_id}/{sub_category_id}', 'AdminController@edit_sub_category')->name('edit.sub_category');

    Route::post('/add/subCategory', 'AdminController@add_sub_category_process')->name('save.sub_category');

    Route::get('/delete/subCategory/{id}', 'AdminController@delete_sub_category')->name('delete.sub_category');

    Route::get('/view/subCategory/{id}', 'AdminController@view_sub_category')->name('view.sub_category');

    Route::get('/subCategory/approve', 'AdminController@approve_sub_category')->name('sub_category.approve');


    // Genres

    Route::get('/genres/{sub_category}', 'AdminController@genres')->name('genres');

    Route::get('/add/genre/{sub_category}', 'AdminController@add_genre')->name('add.genre');

    Route::get('/edit/genre/{sub_category_id}/{genre_id}', 'AdminController@genres_edit')->name('edit.edit_genre');


    Route::post('/save/genre' , 'AdminController@genres_save')->name('save.genre');

    Route::get('/genre/approve', 'AdminController@approve_genre')->name('genre.approve');

    Route::get('/delete/genre/{id}', 'AdminController@genres_delete')->name('delete.genre');

    Route::get('/view/genre/{id}', 'AdminController@genres_view')->name('view.genre');

    Route::post('genre/change/position', 'AdminController@genre_position')->name('save.genre.position');

    // Videos

    Route::get('/videos', 'AdminController@videos')->name('videos');

    Route::get('/moderator/videos/{id}','AdminController@moderator_videos')->name('moderator.videos.list');


    // New Video Upload Code

    Route::get('/videos/create', 'AdminController@admin_videos_create')->name('videos.create');

    Route::get('/videos/edit/{id}', 'AdminController@admin_videos_edit')->name('videos.edit');

    Route::post('/videos/save', 'AdminController@admin_videos_save')->name('videos.save');

    Route::get('/view/video', 'AdminController@view_video')->name('view.video');

    Route::get('/gif/generation', 'AdminController@gif_generator')->name('gif_generator');

    Route::post('/save_video_payment/{id}', 'AdminController@save_video_payment')->name('save.video-payment');

    Route::get('/delete/video/{id}', 'AdminController@delete_video')->name('delete.video');

    Route::get('/video/approve/{id}', 'AdminController@approve_video')->name('video.approve');

    Route::get('/video/publish-video/{id}', 'AdminController@publish_video')->name('video.publish-video');

    Route::get('/video/decline/{id}', 'AdminController@decline_video')->name('video.decline');

    Route::post('/video/change/position', 'AdminController@video_position')->name('save.video.position');

    // Slider Videos

    Route::get('/slider/video/{id}', 'AdminController@slider_video')->name('slider.video');

    // Banner Videos

    Route::get('/banner/videos', 'AdminController@banner_videos')->name('banner.videos');

    Route::get('/add/banner/video', 'AdminController@add_banner_video')->name('add.banner.video');

    Route::get('/change/banner/video/{id}', 'AdminController@change_banner_video')->name('change.video');

    // User Payment details
    Route::get('user/payments' , 'AdminController@user_payments')->name('user.payments');

    // Ajax User payments

    Route::get('ajax/subscription/payments', 'AdminController@ajax_subscription_payments')->name('ajax.user-payments');

    Route::get('user/video-payments' , 'AdminController@video_payments')->name('user.video-payments');

    // Ajax Video payments
    Route::get('ajax/video/payments','AdminController@ajax_video_payments')->name('ajax.video-payments');

    Route::get('revenue/system', 'AdminController@revenue_system')->name('revenue.system');

    Route::get('/remove_payper_view/{id}', 'AdminController@remove_payper_view')->name('remove_pay_per_view');

    // Settings

    Route::get('settings' , 'AdminController@settings')->name('settings');

    Route::post('save_common_settings' , 'AdminController@save_common_settings')->name('save.common-settings');

    Route::get('payment/settings' , 'AdminController@payment_settings')->name('payment.settings');

    Route::get('theme/settings' , 'AdminController@theme_settings')->name('theme.settings');

    Route::post('settings' , 'AdminController@settings_process')->name('save.settings');

    Route::get('settings/email' , 'AdminController@email_settings')->name('email.settings');

    Route::post('settings/email' , 'AdminController@email_settings_process')->name('email.settings.save');

    Route::post('settings/mobile' , 'AdminController@mobile_settings_save')->name('mobile.settings.save');

    Route::post('settings/other','AdminController@other_settings')->name('other.settings.save');

    Route::get('help' , 'AdminController@help')->name('help');

    // Home page setting url
    Route::get('homepage/settings','AdminController@home_page_settings')->name('homepage.settings');


    // Pages

    Route::get('/pages', 'AdminController@pages')->name('pages.index');

    Route::get('/pages/edit/{id}', 'AdminController@page_edit')->name('pages.edit');

    Route::get('/pages/view', 'AdminController@page_view')->name('pages.view');

    Route::get('/pages/create', 'AdminController@page_create')->name('pages.create');

    Route::post('/pages/create', 'AdminController@page_save')->name('pages.save');

    Route::get('/pages/delete/{id}', 'AdminController@page_delete')->name('pages.delete');

    // Custom Push

    Route::get('/custom/push', 'AdminController@custom_push')->name('push');

    Route::post('/custom/push', 'AdminController@custom_push_process')->name('send.push');


    // Languages
    Route::get('/languages/index', 'LanguageController@languages_index')->name('languages.index');

    Route::get('/languages/download/{folder}', 'LanguageController@languages_download')->name('languages.download');

    Route::get('/languages/create', 'LanguageController@languages_create')->name('languages.create');

    Route::get('/languages/edit/{id}', 'LanguageController@languages_edit')->name('languages.edit');

    Route::get('/languages/status/{id}', 'LanguageController@languages_status')->name('languages.status');

    Route::post('/languages/save', 'LanguageController@languages_save')->name('languages.save');

    Route::get('/languages/delete/{id}', 'LanguageController@languages_delete')->name('languages.delete');

    Route::get('/languages/set_default_language/{name}', 'LanguageController@set_default_language')->name('languages.set_default_language');


    // subscriptions

    Route::get('/subscriptions', 'AdminController@subscriptions')->name('subscriptions.index');

    Route::get('/user_subscriptions/{id}', 'AdminController@user_subscriptions')->name('subscriptions.plans');

    Route::get('/subscription/save/{s_id}/u_id/{u_id}', 'AdminController@user_subscription_save')->name('subscription.save');

    Route::get('/subscriptions/create', 'AdminController@subscription_create')->name('subscriptions.create');

    Route::get('/subscriptions/edit/{id}', 'AdminController@subscription_edit')->name('subscriptions.edit');

    Route::post('/subscriptions/create', 'AdminController@subscription_save')->name('subscriptions.save');

    Route::get('/subscriptions/delete/{id}', 'AdminController@subscription_delete')->name('subscriptions.delete');

    Route::get('/subscriptions/view/{id}', 'AdminController@subscription_view')->name('subscriptions.view');

    Route::get('/subscriptions/status/{id}', 'AdminController@subscription_status')->name('subscriptions.status');

    Route::get('/subscriptions/popular/status/{id}', 'AdminController@subscription_popular_status')->name('subscriptions.popular.status');

    Route::get('/subscriptions/users/{id}', 'AdminController@subscription_users')->name('subscriptions.users');

    // Coupons

    // Get the add coupon forms
    Route::get('/coupons/add','AdminController@coupon_create')->name('add.coupons');

    // Get the edit coupon forms
    Route::get('/coupons/edit/{id}','AdminController@coupon_edit')->name('edit.coupons');

    // Save the coupon details
    Route::post('/coupons/save','AdminController@coupon_save')->name('save.coupon');

    // Get the list of coupon details
    Route::get('/coupons/list','AdminController@coupon_index')->name('coupon.list');

    //Get the particular coupon details
    Route::get('/coupons/view/{id}','AdminController@coupon_view')->name('coupon.view');

    // Delete the coupon details
    Route::get('/coupons/delete/{id}','AdminController@coupon_delete')->name('delete.coupon');

    //Coupon approve and decline status
    Route::get('/coupon/status','AdminController@coupon_status_change')->name('coupon.status');

    //mail form
    Route::get('/email/form','AdminController@create_mailcamp')->name('add.mailcamp');

    Route::post('/email/form/action','AdminController@email_send_process')->name('email.success');

    // Advertisement

    // Get the add advertisement forms
    Route::get('/advertisement/add','AdvertisementController@advertisement_create')->name('add.advertisement');

    // Get the edit advertisement forms
    Route::get('/advertisement/edit/{id}','AdvertisementController@advertisement_edit')->name('edit.advertisement');

    // Get the list of advertisement details
    Route::get('/advertisement/list','AdvertisementController@advertisement_index')->name('advertisement.list');

    // Save the advertisement details
    Route::post('/advertisement/save','AdvertisementController@advertisement_save')->name('save.advertisement');

    //Get the particular advertisement details
    Route::get('/advertisement/view/{id}','AdvertisementController@advertisement_view')->name('advertisement.view');

    // Delete the advertisement details
    Route::get('/advertisement/delete/{id}','AdvertisementController@advertisement_delete')->name('delete.advertisement');

    //Advertisement approve and decline status
    Route::get('/advertisement/status','AdvertisementController@advertisement_status_change')->name('advertisement.status');

    //Advertisement additional data for form, url content Advertisement in ajax blocked by add-blocker
    Route::get('/advrtise/get-data','AdvertisementController@advertisement_get_data')->name('advertisement.data');


    //search countries, url should be countries/search?term=Bangladesh
    Route::get('/countries/search','CountryController@searchCountries')->name('countries.search');


    // Email Templates,

    Route::get('/create/template', 'AdminController@create_template')->name('create.template');

    Route::get('/edit/template', 'AdminController@edit_template')->name('edit.template');

    Route::post('/save/template', 'AdminController@save_template')->name('save.template');

    Route::get('/view/template', 'AdminController@view_template')->name('view.template');

    Route::get('/templates', 'AdminController@templates')->name('templates');

    // Cancel Subscription

    Route::post('/user/subscription/pause', 'AdminController@user_subscription_pause')->name('cancel.subscription');

    Route::get('/user/subscription/enable', 'AdminController@user_subscription_enable')->name('enable.subscription');

    // Cast & crews

    Route::get('/cast-crews/add', 'AdminController@cast_crews_add')->name('cast_crews.add');

    Route::get('/cast-crews/edit', 'AdminController@cast_crews_edit')->name('cast_crews.edit');

    Route::post('/cast-crews/save', 'AdminController@cast_crews_save')->name('cast_crews.save');

    Route::get('/cast-crews/delete', 'AdminController@cast_crews_delete')->name('cast_crews.delete');

    Route::get('/cast-crews/index', 'AdminController@cast_crews_index')->name('cast_crews.index');

    Route::get('/cast-crews/view', 'AdminController@cast_crews_view')->name('cast_crews.view');

    Route::get('/cast_crews/status', 'AdminController@cast_crews_status')->name('cast_crews.status');


    // Exports tables

    Route::get('/users/export/', 'AdminExportController@users_export')->name('users.export');

    Route::get('/moderators/export/', 'AdminExportController@moderators_export')->name('moderators.export');

    Route::get('/videos/export/', 'AdminExportController@videos_export')->name('videos.export');

    Route::get('/subscription/payment/export/', 'AdminExportController@subscription_export')->name('subscription.export');

    Route::get('/payperview/payment/export/', 'AdminExportController@payperview_export')->name('payperview.export');

    // Video compression status

    Route::get('/videos/compression/complete','AdminController@videos_compression_complete')->name('compress.status');

    // Banner Image upload
    Route::post('videos/banner/set', 'AdminController@videos_set_banner')->name('banner.set');

    Route::get('videos/banner/remove', 'AdminController@videos_remove_banner')->name('banner.remove');

    // to edit the permission of these role
    Route::resource('role', 'RoleController');
});












Route::get('/embed', 'UserController@embed_video')->name('embed_video');

Route::get('/g_embed', 'UserController@genre_embed_video')->name('genre_embed_video');

Route::get('/', 'UserController@index')->name('user.dashboard');

Route::get('/single', 'UserController@single_video');

Route::get('/user/searchall' , 'ApplicationController@search_video')->name('search');

Route::any('/user/search' , 'ApplicationController@search_all')->name('search-all');

// Categories and single video

Route::get('categories', 'UserController@all_categories')->name('user.categories');

Route::get('category/{id}', 'UserController@category_videos')->name('user.category');

Route::get('subcategory/{id}', 'UserController@sub_category_videos')->name('user.sub-category');

Route::get('genre/{id}', 'UserController@genre_videos')->name('user.genre');

Route::get('video/{id}', 'UserController@single_video')->name('user.single');


// Social Login

Route::post('/social', array('as' => 'SocialLogin' , 'uses' => 'SocialAuthController@redirect'));

Route::get('/callback/{provider}', 'SocialAuthController@callback');

Route::get('/user_session_language/{locale}', 'ApplicationController@set_session_language')->name('user_session_language');


Route::group(['middleware' => 'cors'], function(){

//    Route::get('login', 'Auth\AuthController@showLoginForm')->name('user.login.form');
//
//    Route::post('login', 'Auth\AuthController@login')->name('user.login.post');
//
//    Route::get('logout', 'Auth\AuthController@logout')->name('user.logout');

    // Registration Routes...
    Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('user.register.form');

    Route::post('register', 'Auth\AuthController@register')->name('user.register.post');

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');

    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');

    Route::post('password/reset', 'Auth\PasswordController@reset');

    Route::get('profile', 'UserController@profile')->name('user.profile');

    Route::get('update/profile', 'UserController@update_profile')->name('user.update.profile');

    Route::post('update/profile', 'UserController@profile_save')->name('user.profile.save');

    Route::get('/profile/password', 'UserController@profile_change_password')->name('user.change.password');

    Route::post('/profile/password', 'UserController@profile_save_password')->name('user.profile.password');

    // Delete Account

    Route::get('/delete/account', 'UserController@delete_account')->name('user.delete.account');

    Route::post('/delete/account', 'UserController@delete_account_process')->name('user.delete.account.process');


    Route::get('history', 'UserController@history')->name('user.history');

    Route::get('deleteHistory', 'UserController@history_delete')->name('user.delete.history');

    Route::post('addHistory', 'UserController@history_add')->name('user.add.history');

    // Report Spam Video

    Route::post('markSpamVideo', 'UserController@save_report_video')->name('user.add.spam_video');

    Route::get('unMarkSpamVideo/{id}', 'UserController@remove_report_video')->name('user.remove.report_video');

    Route::get('spamVideos', 'UserController@spam_videos')->name('user.spam-videos');

    Route::get('pay-per-videos', 'UserController@payper_videos')->name('user.pay-per-videos');

    // Wishlist

    Route::post('addWishlist', 'UserController@wishlist_add')->name('user.add.wishlist');

    Route::get('deleteWishlist', 'UserController@wishlist_delete')->name('user.delete.wishlist');

    Route::get('wishlist', 'UserController@wishlist')->name('user.wishlist');

    // Comments

    Route::post('addComment', 'UserController@add_comment')->name('user.add.comment');

    Route::get('comments', 'UserController@comments')->name('user.comments');

    // Paypal Payment
    // Route::get('/paypal/{id}','PaypalController@pay')->name('paypal');

    // Paypal Payment
    Route::get('paypal/{id}/{user_id}/{coupon_code?}','PaypalController@pay')->name('paypal');

    Route::get('/user/payment/status','PaypalController@getPaymentStatus')->name('paypalstatus');

    Route::get('/videoPaypal/{id}/{user_id}/{coupon_code?}','PaypalController@videoSubscriptionPay')->name('videoPaypal');

    Route::get('/user/payment/video-status','PaypalController@getVideoPaymentStatus')->name('videoPaypalstatus');

    Route::get('/trending', 'UserController@trending')->name('user.trending');

});
