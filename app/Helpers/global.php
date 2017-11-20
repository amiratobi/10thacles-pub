<?php

if(!function_exists('hasClaim')) {
    function hasClaim($claim) {
        $claims = array_column(getUser()->claims, 'type');
        if(is_array($claim)) {
            return !array_diff($claim, $claims);
        }
        return in_array($claim, $claims);
    }
}

if(!function_exists('getUser')) {
    function getUser() {
        return (new \App\Models\Auth)->getUser();
    }
}
