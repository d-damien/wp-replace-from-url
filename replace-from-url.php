<?php

/*
Plugin Name: Replace from URL
Plugin URI: 
Description: Replace parts of a string with URL parameters. Example use-case : variable iframe link.
Version: 0.1.0
Author: d-damien
*/

add_shortcode('replace_from_url', 'replace_from_url');
function replace_from_url($atts = [])
{
    $atts = shortcode_atts([
        'str' => '<iframe src="https://abc.com/stuff/{id}/show"></iframe>',
        'params' => '{"id": "\d+"}',
        'prefix' => '',
    ], $atts, 'replace_from_url');

    $str = $atts['str'];
    $params = json_decode(str_replace('\\', '\\\\', $atts['params']));
    $prefix = $atts['prefix'];

    foreach ($params as $key => $regex) {
        $param = $_GET[$prefix . $key] ?? null;
        if (is_null($param)) {
            continue;
        }
        if (! is_string($param) || ! preg_match('/^' . $regex . '$/', $param)) {
            throw new Exception('replace_from_url: param match error');
        }
        $str = str_replace('{' . $key . '}', $param, $str);
    }

    echo $str;
}
