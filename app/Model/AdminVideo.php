<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

use Setting;

use DB;

class AdminVideo extends Model
{

    protected $fillable = ['unique_id','title','description','age','details','category_id',
        'sub_category_id','genre_id','video','video_subtitle','trailer_video','trailer_subtitle',
        'default_image','video_gif_image','video_image_mobile','banner_image','ratings',
        'reviews','status','is_approved','is_home_slider','is_banner','uploaded_by',
        'publish_time','duration','trailer_duration','video_resolutions', 'trailer_video_resolutions',
        'compress_status','main_video_compress_status', 'trailer_compress_status','video_resize_path',
        'trailer_resize_path','edited_by', 'ppv_created_by','watch_count','is_pay_per_view','type_of_user',
        'type_of_subscription', 'amount','redeem_amount','admin_amount','user_amount','video_type',
        'video_upload_type', 'position',];


	public function videoImage()
    {
        return $this->hasMany('App\Model\AdminVideoImage');
    }

    public function userHistory()
    {
        return $this->hasMany('App\Model\UserHistory');
    }

    public function moderator()
    {
        return $this->hasOne('App\Model\Moderator', 'id', 'uploaded_by');
    }


    public function user()
    {
        return $this->hasOne('App\User', 'id', 'uploaded_by');
    }


    public function getScopeLikeCount() {

        return $this->hasMany('App\Model\LikeDislikeVideo', 'admin_video_id', 'video_id')->where('like_status', DEFAULT_TRUE);

    }

    public function getLikeCount() {

        return $this->hasMany('App\Model\LikeDislikeVideo', 'admin_video_id', 'id')->where('like_status', DEFAULT_TRUE);

    }

    public function getDisLikeCount() {

        return $this->hasMany('App\Model\LikeDislikeVideo', 'admin_video_id', 'id')->where('dislike_status', DEFAULT_TRUE);

    }
    

    public function getScopeDisLikeCount() {

        return $this->hasMany('App\Model\LikeDislikeVideo', 'admin_video_id', 'video_id')->where('dislike_status', DEFAULT_TRUE);

    }

    public function userRating()
    {
        return $this->hasMany('App\Model\UserRating');
    }

    public function userWishlist()
    {
        return $this->hasMany('App\Model\Wishlist');
    }


    public function category() {
        return $this->belongsTo('App\Model\Category');
    }

    public function subCategory() {
        return $this->belongsTo('App\Model\SubCategory');
    }

    public function genreName() {
        return $this->belongsTo('App\Model\Model\Genre','genre_id');
    }

    public function videoCastCrewList() {
        return $this->hasMany('App\Model\VideoCastCrew');
    }


    /**
     * Save the unique ID 
     *
     *
     */
    public function setUniqueIdAttribute($value){

        $this->attributes['unique_id'] = uniqid(str_replace(' ', '-', $value));

    }

    /**
     * Get the flag record associated with the video.
     */
    public function userFlags()
    {
        return $this->hasMany('App\Model\Flag', 'video_id', 'id');
    }

    /**
     * Get the pay per view record associated with the video.
     */
    public function userVideoSubscription()
    {
        return $this->hasMany('App\Model\PayPerView', 'video_id', 'id');
    }



    /**
     * Get the continueWatchingVideo record associated with the admin video id.
     */
    public function continueWatchingVideo()
    {
        return $this->hasMany('App\Model\ContinueWatchingVideo', 'admin_video_id', 'id');
    }

    public static function boot()
    {
        //execute the parent's boot method 
        parent::boot();

        //delete your related models here, for example
        static::deleting(function($video)
        {
            if (count($video->videoImage) > 0) {
                foreach($video->videoImage as $image)
                {
                    $image->delete();
                } 
            }

            if (count($video->userHistory) > 0) {
                foreach($video->userHistory as $history)
                {
                    $history->delete();
                } 
            }

            if (count($video->userRating) > 0) {
                foreach($video->userRating as $rating)
                {
                    $rating->delete();
                } 
            }

            if (count($video->userFlags) > 0) {
                foreach($video->userFlags as $flag)
                {
                    $flag->delete();
                } 
            }

            if (count($video->userVideoSubscription) > 0) {
                foreach($video->userVideoSubscription as $videoSubscription)
                {
                    $videoSubscription->delete();
                } 
            }

            if (count($video->userWishlist) > 0) {
                foreach($video->userWishlist as $wishlist)
                {
                    $wishlist->delete();
                } 
            }

            if (count($video->getLikeCount) > 0) {
                foreach($video->getLikeCount as $like)
                {
                    $like->delete();
                } 
            }

            if (count($video->getDisLikeCount) > 0) {
                foreach($video->getDisLikeCount as $dislike)
                {
                    $dislike->delete();
                } 
            }

            if (count($video->continueWatchingVideo) > 0) {

                foreach($video->continueWatchingVideo as $continue_watching_video)
                {
                    $continue_watching_video->delete();
                }

            }

            if (count($video->videoCastCrewList) > 0) {

                foreach($video->videoCastCrewList as $cast_details) {

                    $cast_details->delete();
                }

            }


        });	

    }

    /**
     * Scope a query to only include active users.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVideoResponse($query)
    {

        $currency = Setting::get('currency');

        return $query->select(
            'admin_videos.id as admin_video_id' ,
            DB::raw('DATE_FORMAT(admin_videos.publish_time , "%e %b %y") as publish_time'),
            'admin_videos.watch_count' ,
            'admin_videos.duration',
            'admin_videos.ratings',
            'admin_videos.category_id',
            'categories.name as category_name',
            'admin_videos.title',
            'admin_videos.description',
            'admin_videos.default_image',
            'admin_videos.sub_category_id',
            'sub_categories.name as sub_category_name',
            'admin_videos.reviews',
            'admin_videos.created_at as video_date',
            'admin_videos.video',
            'admin_videos.trailer_video',
            'admin_videos.video_type',
            'admin_videos.video_upload_type',
            'admin_videos.amount',
            'admin_videos.type_of_user',
            'admin_videos.type_of_subscription',
            'admin_videos.category_id as category_id',
            'admin_videos.genre_id',
            'categories.is_series',
            'genres.name as genre_name',
            'admin_videos.is_approved',
            'admin_videos.status',
            'admin_videos.compress_status',
            'admin_videos.trailer_compress_status',
            'admin_videos.main_video_compress_status',
            'admin_videos.video_resolutions',
            'admin_videos.video_resize_path',
            'admin_videos.trailer_resize_path',
            'admin_videos.trailer_video_resolutions',
            'admin_videos.details',
            'admin_videos.unique_id',
            'admin_videos.video_subtitle',
            'admin_videos.trailer_subtitle',
            'admin_videos.position',
            'admin_videos.age',
            DB::raw("'$currency' as currency"),
            'admin_videos.is_pay_per_view',
            'admin_videos.video_gif_image'
        );
    }
}
