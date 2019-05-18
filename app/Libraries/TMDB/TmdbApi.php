<?php

namespace App\Libraries\TMDB;

use TMDB;

class TmdbApi extends TMDB
{
    private $apikey;
    private $language;
    private $debug = false;

    public function __construct()
    {
        $this->apikey = config('kryptonit3_tmdb.TMDB_API');
        $this->language = config('kryptonit3_tmdb.TMDB_LANG');

        parent::__construct($this->apikey, $this->language, $this->debug);
    }



    public function getMovieDetails($idMovie, $appendToResponse = 'append_to_response=trailers,images,casts,translations'){

        return new TmdbMovie($this->call('movie/' . $idMovie, $appendToResponse));
    }


    public function searchTmdbMovie($movieTitle){

        $movies = array();

        $result = $this->call('search/movie', 'query='. urlencode($movieTitle), $this->getLang());

        foreach($result['results'] as $data){
            $movies[] = new TmdbMovie($data);
        }

        return $movies;
    }


    private function call($action, $appendToResponse){

        $url = self::_API_URL_.$action .'?api_key='. $this->apikey .'&language='. $this->getLang() .'&'.$appendToResponse;

        if ($this->debug) {
            echo '<pre><a href="' . $url . '">check request</a></pre>';
        }

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if (!$err) {
            return (array) json_decode(($response), true);
        }
    }
}