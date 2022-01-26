<?php

function theme_url($uri) {
    $CI = & get_instance();
    return $CI->config->base_url('application/views/' . $uri);
}

//to generate an image tag, set tag to true. you can also put a string in tag to generate the alt tag
function theme_img($uri, $tag = false) {
    if ($tag) {
        return '<img src="' . theme_url('assets/img/' . $uri) . '" alt="' . $tag . '">';
    } else {
        return theme_url('assets/img/' . $uri);
    }
}

function theme_js($uri, $tag = false) {
    if ($tag) {
        return '<script type="text/javascript" src="' . theme_url('assets/js/' . $uri) . '"></script>';
    } else {
        return theme_url('assets/js/' . $uri);
    }
}

//you can fill the tag field in to spit out a link tag, setting tag to a string will fill in the media attribute
function theme_css($uri, $tag = false) {
    if ($tag) {
        $media = false;
        if (is_string($tag)) {
            $media = 'media="' . $tag . '"';
        }
        return '<link href="' . theme_url('assets/css/' . $uri) . '" type="text/css" rel="stylesheet" ' . $media . '/>';
    }

    return theme_url('assets/css/' . $uri);
}

function pre($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

function getstore($field = '') {
    $CI = & get_instance();

    if ($field != '') {
        $storedata = $CI->session->userdata('store');
        return isset($storedata->$field) ? $storedata->$field : 0;
    }
    return $CI->session->userdata('store');
}

function errorpage($data) {
    $CI = & get_instance();
    $CI->view('error_404', $data);
}

function upload_file($param = array()) {

    if( !is_dir($param['file_folder']) ) { mkdir($param['file_folder'], 0777, true); }

    if( !file_exists($param['file_folder'].'/'.$param['file_name']) ) {

        $theme_file = fopen($param['file_folder'].'/'.$param['file_name'], "w") or die("Unable to open file!");
        fwrite($theme_file, preg_replace( "/\r|\n/", PHP_EOL, $param['file_content'] ));
        fclose($theme_file);
    }

    $result['file_url']  = base_url("uploads/".$param['shop'].'/'.$param['theme'].'/'.$param['file_name']);
  //  pre($result['file_url']);exit;
    $result['read_file'] = file_get_contents($result['file_url']);

    return $result;
}