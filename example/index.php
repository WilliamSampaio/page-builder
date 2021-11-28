<?php

require __DIR__ . '/../vendor/autoload.php';

use WilliamSampaio\PageBuilder\AddBootstrapCss;
use WilliamSampaio\PageBuilder\Body;
use WilliamSampaio\PageBuilder\Br;
use WilliamSampaio\PageBuilder\Div;
use WilliamSampaio\PageBuilder\Head;
use WilliamSampaio\PageBuilder\Heading;
use WilliamSampaio\PageBuilder\Hr;
use WilliamSampaio\PageBuilder\Html;
use WilliamSampaio\PageBuilder\Image;
use WilliamSampaio\PageBuilder\Paragraph;
use WilliamSampaio\PageBuilder\Style;
use WilliamSampaio\PageBuilder\Title;

$name_date = 'William Benjamim Menezes Sampaio, ' . date("d/m/Y H:i:s");

$new_page = (new Html([

    // the head tag
    new Head([

        // the title tag
        new Title('Page Builder - Example'),

        // add the bootstrap css
        new AddBootstrapCss,

        // the style tag with custom css
        (new Style(".container {padding-top: 64px;}"))->type('text/css')
    ]),

    // the body tag
    (new Body([

        // the div with class container
        (new Div([

            // the div with class row
            (new Div([

                // the div with class col
                (new Div([

                    // the heading tag level 1
                    (new Heading('Bem-vindo ao Page Builder', 1)),

                    // the paragraph tag
                    new Paragraph([
                        'Está é a biblioteca em PHP para gerar paginas em HTML dinamicamente a partir de classes. Sei que talvez para você, caro colega dev, pode parecer algo desnecessario então vou resumir o motivo que me levou a perder algumas horas de sono para desenvolver isso.'
                    ]),

                    (new Paragraph([
                        'Todo começou de um sistema antigo em PHP que, na verdade atualmente ainda estou refatorando tudo, e como trata-se de um sistema legado no versão do PHP 5...alguma coisa perdia muito tempo com o front-end. Então tive a ideia de deixar tudo mais dinamico assim não preciso ter que lidar diretamente com HTML.'
                    ]))

                        // added into last paragraph tag a BR, HR and a Img tag
                        ->addChildElements([

                            // add a break line
                            new Br,

                            // add horizontal line
                            new Hr,

                            // add a img tag
                            (new Image('https://upload.wikimedia.org/wikipedia/pt/7/73/Trollface.png'))->class('img-thumbnail')
                        ]),


                    (new Heading('1. Documentação', 2)),

                    // the paragraph tag
                    new Paragraph([
                        'Em breve...'
                    ]),

                    new Hr,

                    // the paragraph tag
                    new Paragraph([$name_date]),

                ]))->class('col-12')

            ]))->class('row')

        ]))->class('container')

    ]))->style('background-color: lightgray;')

]))->lang('pt-br');

// função magica que imprimi o HTML!
$new_page->detonate();
