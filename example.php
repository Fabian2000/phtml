<?php

include 'lib/phtml.php';

/*

    GET { _FUNCTION }
    SET { FUNCTION }

*/

$phtml      =   new phtml;
$pmeta      =   (new phtml)->meta();
$plink      =   (new phtml)->link();
$pbase      =   (new phtml)->base();
$plist      =   (new phtml)->list();
$purl       =   (new phtml)->url();
$pimg       =   (new phtml)->img();
$piframe    =   (new phtml)->iframe();
$pvideo     =   (new phtml)->video();
$paudio     =   (new phtml)->audio();
$ptable     =   (new phtml)->table();
$plabel     =   (new phtml)->label();
$pinput     =   (new phtml)->input();
$ptextarea  =   (new phtml)->textarea();
$pbutton    =   (new phtml)->button();
$pprogress  =   (new phtml)->progress();
$pmeter     =   (new phtml)->meter();

$phtml->doctype();
    $phtml->open('html', 'class="test"');
    $phtml->open('head');

        $phtml->title("PHTML");

        $phtml->comment('Test Comment');

        $pmeta->new();
            $pmeta->charset('utf-8');
            $pmeta->create();

        $pmeta->new();
            $pmeta->httpEquiv('X-UA-Compatible');
            $pmeta->content('IE-edge');
            $pmeta->create();

        $pmeta->new();
            $pmeta->name('viewport');
            $pmeta->content('width=device-width, initial-scale=1.0');
            $pmeta->create();

    $phtml->close('head');

    $phtml->open('body');
    
    $phtml->open('h1');
        $phtml->text('Example H1 Title'.$phtml->_break().'With Line Break');
    $phtml->close('h1');

    $phtml->break();
    $phtml->break();
    $phtml->break();

    $plist->new();
        $plist->element('Test 1');
        $plist->element('Test 2');
        $plist->element('Test 3');
        $plist->create();

    $purl->new();
        $purl->href("#");
        $purl->text("Test Url");
        $purl->target("_blank");
        $purl->create();

    $phtml->break(2);

    $ptable->new();
        $ptable->attr("border", "1");
        $ptable->caption("Example Table");
        $ptable->row();
            $ptable->heading("Title 1");
            $ptable->heading("Title 2");
        $ptable->row();
            $ptable->data("Data 1");
            $ptable->data("Data 2");
        $ptable->row();
            $ptable->data("Data 1.1");
            $ptable->data("Data 2.2");
        $ptable->create();

    $phtml->break(3);

    $plabel->new();
        $plabel->text("Test");
        $plabel->for("test");
        $plabel->create();

    $pinput->new();
        $pinput->placeholder("Test");
        $pinput->id("test");
        $pinput->create();

    $phtml->break(3);

    $phtml->open('form', 'action="#" target="_blank" method="get"');
        
        $phtml->open('h2');
            $phtml->text('Test Form');
        $phtml->close('h2');

        $pinput->new();
            $pinput->name("testInputForm");
            $pinput->placeholder("Example");
            $pinput->type("text");
            $pinput->create();

        $phtml->break(2);
    
        $pbutton->new();
            $pbutton->text("Submit");
            $pbutton->type("submit");
            $pbutton->create();
    
        $pbutton->new();
            $pbutton->text("Clear Form");
            $pbutton->type("reset");
            $pbutton->create();

    $phtml->close('form');

    $phtml->close('body');

$phtml->close('html');
