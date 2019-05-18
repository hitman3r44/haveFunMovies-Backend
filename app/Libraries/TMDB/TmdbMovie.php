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
}