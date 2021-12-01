<?php

require __DIR__ . '/../vendor/autoload.php';

use WilliamSampaio\PageBuilder\Bootstrap;
use WilliamSampaio\PageBuilder\Element;

$html = new Element;

$dados_usuario = ['nome' => 'Erllison', 'idade' => '18'];

echo $html::html(
    [$html::GLOBAL_ATTR_LANG => $html::LANG_PORTUGUEASE_BR],

    [
        // head element
        $html::head([

            $html::comment("Aqui é um comentario!"),

            $html::title('Page Builder - Example'),
            Bootstrap::addBootstrapCss(),
            // $html::style(
            //     [$html::ATTR_TYPE => $html::TYPE_CSS],
            //     ['body{background-color:lightgray;}']
            // )
        ]),

        // body element
        $html::body(
            ['id' => 'body'],

            [
                $html::div(
                    [$html::GLOBAL_ATTR_CLASS => 'container'],
                    [
                        $html::div(
                            [$html::GLOBAL_ATTR_CLASS => 'row'],
                            [
                                $html::h1(
                                    [$html::GLOBAL_ATTR_STYLE => 'color:red;'],
                                    ['olá mundo!']
                                ),

                                $html::form(
                                    [$html::ATTR_ACTION => 'index.php', $html::ATTR_METHOD => 'get'],
                                    [
                                        Bootstrap::addBootstrapInputText('nome', 'nome', 'Digite seu Nome: ', 'Digite aqui seu nome!'),
                                        $html::button([$html::ATTR_TYPE => $html::TYPE_SUBMIT], ['ENVIAR'])
                                    ]
                                )
                            ]
                        )
                    ]
                ),



                $html::h2(
                    ['style' => 'font-style:bold;color:red;'],
                    ['Informações usuarios']
                ),

                $html::p([], ['Nome: ' . $dados_usuario['nome'], $html::br(), 'Idade: ' . $dados_usuario['idade']]),

                $html::br(), $html::br(), $html::br(),

                $html::h2(
                    [$html::GLOBAL_ATTR_STYLE => 'color:blue;font-style:italic;'],
                    ['teste...']
                ),

                $html::h6(
                    [$html::GLOBAL_ATTR_STYLE => 'color:purple;font-style:italic;'],
                    ['teste...']
                ),

                $html::hr(),

                $html::p([], ['Lorem ipsum dolor sit amet consectetur adipisicing elit. Illo non sed alias distinctio asperiores recusandae labore nemo vitae aliquam id voluptatum, ipsa aut natus maxime doloremque perferendis neque dolores accusamus!']),

                $html::img([
                    $html::ATTR_SRC => 'https://files.tecnoblog.net/wp-content/uploads/2021/01/o_que_e_php_unsplash-700x467.jpg'
                ])
            ]
        )
    ]
);

/*$name_date = 'William Benjamim Menezes Sampaio, ' . date("d/m/Y H:i:s");

(new Heading([
    'olá mundo',
    (new Br)->id('teste'),
    'cadassistrar'
], 1))->class('teste...')->detonate();*/

/*$new_page = (new Html([

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
$new_page->detonate();*/
