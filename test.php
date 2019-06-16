<?php 





/**
 * parse_url的作用
 * @var string
 */
$url = 'http://username:password@hostname/path?arg=value#anchor';
echo $url;
var_dump(parse_url($url));

echo parse_url($url, PHP_URL_PATH);
