<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

// 当生成伪静态时此文件会被系统覆盖；如果发生页面指向错误，可以调整下面的规则顺序；越靠前的规则优先级越高。

$route['article\/(\d+)(\d+)(\d+)(\d+)\/(\d+).html']= 'show/index/id/$4/page/$5'; // 【内容页】 对应规则：/article/{y}{m}{d}{id}/{page}.html
$route['article\/(\d+)(\d+)(\d+)\/(\d+).html']  = 'show/index/id/$4'; // 【内容页】 对应规则：/article/{y}{m}{d}/{id}.html
$route['extend\/(\d+).html']                    = 'extend/index/id/$1'; // 【扩展页】 对应规则：/extend/{id}.html
$route['(\w+)\/p(\d+).html']                    = 'category/index/dir/$1/page/$2'; // 【栏目页】 对应规则：/{dirname}/p{page}.html
$route['(\w+)']                                 = 'category/index/dir/$1'; // 【栏目页】 对应规则：/{dirname}/
