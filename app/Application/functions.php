<?php

function isActive($url) {
    if(Request::segment(1) == $url) {
        return 'active';
    }

    return '';
}