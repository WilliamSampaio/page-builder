<?php

require __DIR__ . '/../vendor/autoload.php';

use WilliamSampaio\PageBuilder\Body;
use WilliamSampaio\PageBuilder\Heading;
use WilliamSampaio\PageBuilder\Html;

$page = (new Html)->lang('pt-br');
$body = (new Body)->style('background-color: lightblue;');
$body->addChildElement(new Heading('Hello World', 1));
// $body->prepare();

$body->setAttribute('id','teste');

$page->addChildElement($body);
$page->detonate();

// $page->getChildElementByTag('body')->style('background-color: blue;');
// $page->detonate();

// (new Heading('teste', 1))->detonate();

// echo '<html lang="en"><body style="background-color: red;"></body></html>';