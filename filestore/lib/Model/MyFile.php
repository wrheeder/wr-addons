<?php
namespace filestore;
class Model_MyFile extends Model_File {
    function init(){
        parent::init();
    }
    function setVolume($volume) {
        $this->pref_volume = $volume;
    }
    
}

