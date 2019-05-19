<?php

namespace App\Libraries\TMDB;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Movie;

class TmdbMovie extends Movie
{

    private $_data;

    public function __construct($data) {
        $this->_data = $data;
        parent::__construct($this->_data);
    }




    public function hasData() {

        return (isset($this->_data['id']) && !empty($this->_data['id']));
    }



    public function getOverview() {

        return isset($this->_data['overview']) ? $this->_data['overview'] : '';
    }

    public function getLanguage() {

        return isset($this->_data['original_language']) ? $this->_data['original_language'] : '';
    }


    public function getReleaseDate() {

        try{

            return isset($this->_data['release_date']) ?  Carbon::parse($this->_data['release_date'])->diffForHumans() : '';
        }catch(\Exception $e){
            Log::error($e->getMessage().' - File : '.$e->getFile().' - Line : '.$e->getLine());
            return null;
        }
    }

    public function getPostersWithUrl($imageUrl, $limit = 1, $offset = 1) {
        $posters =  isset($this->_data['images']['posters']) ? $this->_data['images']['posters'] : [];

        $posters = array_slice($posters, $offset, $limit);
        $postersPaths = [];
        $posterCount = 1;

        foreach($posters as $poster){
            $postersPaths[] = $imageUrl.$poster['file_path'];

        }

        return $postersPaths;

    }

    public function hasTrailler(){

        return isset($this->_data['trailers']) && !empty($this->_data['trailers']);
    }

}