<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'userApi'], function(){

    Route::post('/register','UserApiController@register');

    Route::post('/login','UserApiController@login');

    Route::get('/userDetails','UserApiController@user_details');

    Route::post('/updateProfile', 'UserApiController@update_profile');

    Route::post('/forgotpassword', 'UserApiController@forgot_password');

    Route::post('/changePassword', 'UserApiController@change_password');

    Route::get('/tokenRenew', 'UserApiController@token_renew');

    Route::post('/deleteAccount', 'UserApiController@delete_account');

    Route::post('/settings', 'UserApiController@settings');


    // Categories And SubCategories

    Route::post('/categories' , 'UserApiController@get_categories');

    Route::post('/subCategories' , 'UserApiController@get_sub_categories');


    // Videos and home

    Route::post('/home' , 'UserApiController@home');

    Route::post('/common' , 'UserApiController@common');

    Route::post('/categoryVideos' , 'UserApiController@get_category_videos');

    Route::post('/subCategoryVideos' , 'UserApiController@get_sub_category_videos');

    Route::post('/singleVideo' , 'UserApiController@single_video');


    Route::post('/apiSearchVideo' , 'UserApiController@api_search_video')->name('api-search-video');

    Route::post('/searchVideo' , 'UserApiController@search_video')->name('search-video');

    Route::post('/test_search_video' , 'UserApiController@test_search_video');


    // Rating and Reviews

    Route::post('/userRating', 'UserApiController@user_rating'); // @TODO - Not used for future use

    // Wish List

    Route::post('/addWishlist', 'UserApiController@wishlist_add');

    Route::post('/getWishlist', 'UserApiController@wishlist_index');

    Route::post('/deleteWishlist', 'UserApiController@wishlist_delete');

    // History

    Route::post('/addHistory', 'UserApiController@history_add');

    Route::post('getHistory', 'UserApiController@history_index');

    Route::post('/deleteHistory', 'UserApiController@history_delete');

    Route::get('/clearHistory', 'UserApiController@clear_history');

    Route::post('/details', 'UserApiController@details');

    Route::post('/active-categories', 'UserApiController@getCategories');

    Route::post('/browse', 'UserApiController@browse');

    Route::post('/active-profiles', 'UserApiController@activeProfiles');

    Route::post('/add-profile', 'UserApiController@addProfile');

    Route::post('/view-sub-profile','UserApiController@view_sub_profile');

    Route::post('/edit-sub-profile','UserApiController@edit_sub_profile');

    Route::post('/delete-sub-profile', 'UserApiController@delete_sub_profile');

    Route::post('/active_plan', 'UserApiController@active_plan');

    Route::post('/subscription_index', 'UserApiController@subscription_index');

    Route::post('/zero_plan', 'UserApiController@zero_plan');

    Route::get('/site_settings' , 'UserApiController@site_settings');

    Route::post('/allPages', 'UserApiController@allPages');

    Route::get('/getPage/{id}', 'UserApiController@getPage');

    Route::get('check_social', 'UserApiController@check_social');

    Route::post('/get-subscription', 'UserApiController@last_subscription');

    Route::post('/genre-video', 'UserApiController@genre_video');

    Route::post('/genre-list', 'UserApiController@genre_list');

    Route::get('/searchall' , 'UserApiController@searchAll');

    Route::post('/notifications', 'UserApiController@notifications');

    Route::post('/red-notifications', 'UserApiController@red_notifications');

    Route::post('subscribed_plans', 'UserApiController@subscribed_plans');


    Route::post('stripe_payment_video', 'UserApiController@stripe_payment_video');

    Route::post('card_details', 'UserApiController@card_details');

    Route::post('payment_card_add', 'UserApiController@payment_card_add');

    Route::post('default_card', 'UserApiController@default_card');

    Route::post('delete_card', 'UserApiController@delete_card');

    Route::post('subscription_plans', 'UserApiController@subscription_plans');

    Route::post('subscribedPlans', 'UserApiController@subscribedPlans');

    Route::post('/stripe_payment', 'UserApiController@stripe_payment');

    Route::post('pay_now', 'UserApiController@pay_now');

    Route::post('/like_video', 'UserApiController@likeVideo');

    Route::post('/dis_like_video', 'UserApiController@disLikeVideo');

    Route::post('/add_spam', 'UserApiController@add_spam');

    Route::get('/spam-reasons', 'UserApiController@reasons');

    Route::post('remove_spam', 'UserApiController@remove_spam');

    Route::post('spam_videos', 'UserApiController@spam_videos');

    Route::post('stripe_ppv', 'UserApiController@stripe_ppv');

    Route::post('ppv_end', 'UserApiController@ppv_end');

    Route::post('paypal_ppv', 'UserApiController@paypal_ppv');

    Route::post('keyBasedDetails', 'UserApiController@keyBasedDetails');

    Route::post('plan_detail', 'UserApiController@plan_detail');

    Route::post('logout', 'UserApiController@logout');

    Route::post('check_token_valid', 'UserApiController@check_token_valid');

    Route::post('ppv_list', 'UserApiController@ppv_list');


    // Continue watching Video

    Route::post('continue/videos', 'UserApiController@continue_watching_videos');

    Route::any('save/watching/video', 'UserApiController@save_continue_watching_video');

    Route::post('/oncomplete/video', 'UserApiController@on_complete_video');

    // Enable / Disable Notifications

    Route::post('/email/notification', 'UserApiController@email_notification');


    Route::post('coupon/apply/vidoes','UserApiController@coupon_apply_videos');

    // Genres

    Route::post('genres/videos', 'UserApiController@genres_videos');

    Route::post('/apply/coupon/subscription', 'UserApiController@apply_coupon_subscription');

    Route::post('/apply/coupon/ppv', 'UserApiController@apply_coupon_ppv');

    Route::post('/cancel/subscription', 'UserApiController@autorenewal_cancel');

    Route::post('/autorenewal/enable', 'UserApiController@autorenewal_enable');

    Route::post('/pay_ppv', 'UserApiController@pay_ppv');

    // Cast Crews

    Route::post('cast_crews/videos', 'UserApiController@cast_crews_videos');

});