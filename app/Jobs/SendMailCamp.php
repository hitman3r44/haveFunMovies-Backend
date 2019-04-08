<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Model\Moderator;
use App\Helpers\Helper;

use Log; 

class SendMailCamp extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;

        protected $user_email;
        protected $subject;
        protected $content;
        protected $users_moderator_type;
        
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_email,$subject,$content,$users_moderator_type)
    {
        // 
        $this->user_email = $user_email;
        $this->subject = $subject;
        $this->content = $content;
        $this->users_moderator_type = $users_moderator_type;
        
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        
        if($this->users_moderator_type==USERS) {

            foreach ($this->user_email as $key => $data) {

                $user_detail = User::select('users.name','users.email')->where('id',$data)->where('email_notification', 1)->first();

                if( !isset($user_detail->email) || empty($user_detail->email) ){
                    continue;
                }

                Log::info('User List Collection:'.$user_detail);

                $subject = $this->subject;

                $content = $this->content;

                $page = "emails.send_mail";

                $email = isset($user_detail->email) ? $user_detail->email : '';

                $email_data['name'] = isset($user_detail->name) ? $user_detail->name : '';

                $email_data['content'] = $email_data['mailcamp_content'] = $content;

                $email_data['email'] =  isset($user_detail->email) ? $user_detail->email : '';

                Helper::send_email($page,$subject,$email,$email_data);
            }

        }  else {

            foreach ($this->user_email as $key => $data) {

                $moderator_detail = Moderator::select('moderators.name','moderators.email')->where('id',$data)->first();

                if( !isset($moderator_detail->email) || empty($moderator_detail->email) ){
                    continue;
                }

                Log::info('Moderator Detail'.$moderator_detail);

                $subject = $this->subject;

                $content = $this->content;

                $page = "emails.send_mail";

                $email = $moderator_detail->email;

                $email_data['name'] = $moderator_detail->name;

                $email_data['content'] = $email_data['mailcamp_content'] = $content;

                $email_data['email'] =  $moderator_detail->email;

                Helper::send_email($page,$subject,$email,$email_data);
            }
        }
    }
}
