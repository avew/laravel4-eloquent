<?php

class Passport extends Eloquent {

    protected $guarded = array();

    public function users() {
        return $this->belongsTo('User','user_id');
    }

}
