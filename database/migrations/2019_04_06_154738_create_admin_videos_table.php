<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminVideosTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id');
            $table->string('title');
            $table->text('description');
            $table->string('age', 4);
            $table->text('details');
            $table->decimal('price');
            $table->integer('category_id');
            $table->integer('sub_category_id');
            $table->integer('genre_id');
            $table->string('video');
            $table->string('video_subtitle');
            $table->string('trailer_video');
            $table->string('trailer_subtitle');
            $table->string('default_image');
            $table->string('video_gif_image');
            $table->string('video_image_mobile');
            $table->string('banner_image');
            $table->string('ratings');
            $table->string('reviews');
            $table->string('status');
            $table->integer('is_approved');
            $table->integer('is_home_slider')->default(0);
            $table->integer('is_banner');
            $table->string('uploaded_by', 128);
            $table->dateTime('publish_time');
            $table->time('duration');
            $table->time('trailer_duration');
            $table->string('video_resolutions')->nullable();
            $table->string('trailer_video_resolutions')->nullable();
            $table->integer('compress_status')->default(0);
            $table->boolean('main_video_compress_status');
            $table->integer('trailer_compress_status')->default(0);
            $table->text('video_resize_path')->nullable();
            $table->text('trailer_resize_path')->nullable();
            $table->enum('edited_by', array('admin', 'moderator', 'user', 'other'));
            $table->string('ppv_created_by');
            $table->integer('watch_count');
            $table->boolean('is_pay_per_view');
            $table->integer('type_of_user')->default(0);
            $table->integer('type_of_subscription')->default(0);
            $table->float('amount', 10, 0)->default(0);
            $table->float('redeem_amount');
            $table->float('admin_amount');
            $table->float('user_amount');
            $table->integer('video_type');
            $table->integer('video_upload_type');
            $table->smallInteger('position');
            $table->integer('tmdb_video_id')->nullable();
            $table->integer('created_by');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admin_videos');
    }

}
