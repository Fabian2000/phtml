<?php

class phtml
{

    public function doctype()
    {
        echo '<!DOCTYPE html>';
    }
    
    public function open($tag, $attributes='', $content='')
    {
        if($attributes != '')
        {
            $attributes = ' '.$attributes;
        }

        echo '<'.$tag.$attributes.'>'.$content;
    }
    
    public function _open($tag, $attributes='', $content='')
    {
        if($attributes != '')
        {
            $attributes = ' '.$attributes;
        }

        return '<'.$tag.$attributes.'>'.$content;
    }
    
    public function close($tag)
    {
        echo '</'.$tag.'>';
    }
    
    public function _close($tag)
    {
        return '</'.$tag.'>';
    }

    public function comment($comment)
    {
        echo '<!--'.$comment.'-->';
    }

    public function _comment($comment)
    {
        return '<!--'.$comment.'-->';
    }

    public function title($title)
    {
        echo '<title>'.$title.'</title>';
    }

    public function text($text)
    {
        echo $text;
    }

    public function _text($text)
    {
        return $text;
    }

    public function break($count = 1)
    {
        $br = "";

        for($i = 1; $i <= $count; $i++)
        {
            $br .= '<br>';
        }

        echo $br;
    }

    public function _break($count = 1)
    {
        $br = "";

        for($i = 1; $i <= $count; $i++)
        {
            $br .= '<br>';
        }

        return $br;
    }

    public function wbreak()
    {
        echo '<wbr>';
    }

    public function _wbreak()
    {
        return '<wbr>';
    }

    public function meta()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<meta';
            }

            public function charset($charset)
            {
                global $builder;

                $builder .= ' charset="'.$charset.'"';
            }

            public function content($content)
            {
                global $builder;

                $builder .= ' content="'.$content.'"';
            }

            public function httpEquiv($httpEquiv)
            {
                global $builder;

                $builder .= ' http-equiv="'.$httpEquiv.'"';
            }

            public function name($name)
            {
                global $builder;

                $builder .= ' name="'.$name.'"';
            }

            public function lang($lang)
            {
                global $builder;

                $builder .= ' lang="'.$lang.'"';
            }

            public function scheme($scheme)
            {
                global $builder;

                $builder .= ' scheme="'.$scheme.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'>';
            }
        
        };

    }

    public function link()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<link';
            }

            public function crossorigin($crossorigin)
            {
                global $builder;

                $builder .= ' crossorigin="'.$crossorigin.'"';
            }

            public function href($href)
            {
                global $builder;

                $builder .= ' href="'.$href.'"';
            }

            public function hreflang($hreflang)
            {
                global $builder;

                $builder .= ' hreflang="'.$hreflang.'"';
            }

            public function media($media)
            {
                global $builder;

                $builder .= ' media="'.$media.'"';
            }

            public function referrerpolicy($referrerpolicy)
            {
                global $builder;

                $builder .= ' referrerpolicy="'.$referrerpolicy.'"';
            }

            public function rel($rel)
            {
                global $builder;

                $builder .= ' rel="'.$rel.'"';
            }

            public function sizes($sizes)
            {
                global $builder;

                $builder .= ' sizes="'.$sizes.'"';
            }

            public function title($title)
            {
                global $builder;

                $builder .= ' title="'.$title.'"';
            }

            public function type($type)
            {
                global $builder;

                $builder .= ' type="'.$type.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'>';
            }
        
        };

    }

    public function base()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<base';
            }

            public function href($href)
            {
                global $builder;

                $builder .= ' href="'.$href.'"';
            }

            public function target($target)
            {
                global $builder;

                $builder .= ' target="'.$target.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'>';
            }
        
        };

    }

    public function list()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $lastElementText = "";
            protected $givenListType = "ul";
            protected $isInElements = false;

            public function new($listType = 'ul')
            {
                global $builder;
                global $lastElementText;
                global $givenListType;
                global $isInElements;

                $builder = '<'.$listType;
                $lastElementText = '';
                $givenListType = $listType;
                $isInElements = false;
            }

            public function reversed()
            {
                global $builder;

                $builder .= ' reversed';
            }

            public function start($start)
            {
                global $builder;

                $builder .= ' start="'.$start.'"';
            }

            public function type($type)
            {
                global $builder;

                $builder .= ' type="'.$type.'"';
            }

            public function element($text = '')
            {
                global $builder;
                global $lastElementText;
                global $isInElements;
                
                if($isInElements)
                {
                    $builder .= '>'.$lastElementText.'</li><li';
                }
                else
                {
                    $builder .= '>'.$lastElementText.'<li';
                }

                $lastElementText = $text;
                $isInElements = true;
            }

            public function value($value)
            {
                global $builder;

                $builder .= ' value="'.$value.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;
                global $givenListType;
                global $lastElementText;
                global $isInElements;

                if($isInElements)
                {
                    $builder .= '>'.$lastElementText.'</li>'.'</'.$givenListType.'>';
                }
                else
                {
                    $builder .= '>'.$lastElementText.'</'.$givenListType.'>';
                }

                echo $builder;
            }

            public function _create()
            {
                global $builder;
                global $givenListType;
                global $lastElementText;
                global $isInElements;

                if($isInElements)
                {
                    $builder .= '>'.$lastElementText.'</li>'.'</'.$givenListType.'>';
                }
                else
                {
                    $builder .= '>'.$lastElementText.'</'.$givenListType.'>';
                }

                return $builder;
            }
        
        };

    }

    public function url()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $lastText = "";

            public function new()
            {
                global $builder;
                global $lastText;

                $builder = '<a';
                $lastText = '';
            }

            public function href($href)
            {
                global $builder;

                $builder .= ' href="'.$href.'"';
            }

            public function hreflang($hreflang)
            {
                global $builder;

                $builder .= ' hreflang="'.$hreflang.'"';
            }

            public function target($target)
            {
                global $builder;

                $builder .= ' target="'.$target.'"';
            }

            public function download()
            {
                global $builder;

                $builder .= ' download';
            }

            public function media($media)
            {
                global $builder;

                $builder .= ' media="'.$media.'"';
            }

            public function ping($ping)
            {
                global $builder;

                $builder .= ' ping="'.$ping.'"';
            }

            public function referrerpolicy($referrerpolicy)
            {
                global $builder;

                $builder .= ' referrerpolicy="'.$referrerpolicy.'"';
            }

            public function rel($rel)
            {
                global $builder;

                $builder .= ' rel="'.$rel.'"';
            }

            public function type($type)
            {
                global $builder;

                $builder .= ' type="'.$type.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function text($text)
            {
                global $lastText;

                $lastText = $text;
            }

            public function create()
            {
                global $builder;
                global $lastText;

                echo $builder.'>'.$lastText.'</a>';
            }

            public function _create()
            {
                global $builder;
                global $lastText;

                return $builder.'>'.$lastText.'</a>';
            }
        
        };

    }

    public function img()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<img';
            }

            public function src($src)
            {
                global $builder;

                $builder .= ' src="'.$src.'"';
            }

            public function alt($alt)
            {
                global $builder;

                $builder .= ' alt="'.$alt.'"';
            }

            public function crossorigin($crossorigin)
            {
                global $builder;

                $builder .= ' crossorigin="'.$crossorigin.'"';
            }

            public function height($height)
            {
                global $builder;

                $builder .= ' height="'.$height.'"';
            }

            public function width($width)
            {
                global $builder;

                $builder .= ' width="'.$width.'"';
            }

            public function ismap($ismap)
            {
                global $builder;

                $builder .= ' ismap="'.$ismap.'"';
            }

            public function loading($loading)
            {
                global $builder;

                $builder .= ' loading="'.$loading.'"';
            }

            public function longdesc($longdesc)
            {
                global $builder;

                $builder .= ' longdesc="'.$longdesc.'"';
            }

            public function referrerpolicy($referrerpolicy)
            {
                global $builder;

                $builder .= ' referrerpolicy="'.$referrerpolicy.'"';
            }

            public function sizes($sizes)
            {
                global $builder;

                $builder .= ' sizes="'.$sizes.'"';
            }

            public function srcset($srcset)
            {
                global $builder;

                $builder .= ' srcset="'.$srcset.'"';
            }

            public function usemap($usemap)
            {
                global $builder;

                $builder .= ' usemap="'.$usemap.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'>';
            }
        
        };

    }

    public function iframe()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<iframe';
            }

            public function src($src)
            {
                global $builder;

                $builder .= ' src="'.$src.'"';
            }

            public function height($height)
            {
                global $builder;

                $builder .= ' height="'.$height.'"';
            }

            public function width($width)
            {
                global $builder;

                $builder .= ' width="'.$width.'"';
            }

            public function allow($allow)
            {
                global $builder;

                $builder .= ' allow="'.$allow.'"';
            }

            public function allowfullscreen($allowfullscreen)
            {
                global $builder;

                $builder .= ' allowfullscreen="'.$allowfullscreen.'"';
            }

            public function allowpaymentrequest($allowpaymentrequest)
            {
                global $builder;

                $builder .= ' allowpaymentrequest="'.$allowpaymentrequest.'"';
            }

            public function loading($loading)
            {
                global $builder;

                $builder .= ' loading="'.$loading.'"';
            }

            public function name($name)
            {
                global $builder;

                $builder .= ' name="'.$name.'"';
            }

            public function referrerpolicy($referrerpolicy)
            {
                global $builder;

                $builder .= ' referrerpolicy="'.$referrerpolicy.'"';
            }

            public function sandbox($sandbox)
            {
                global $builder;

                $builder .= ' sandbox="'.$sandbox.'"';
            }

            public function srcdoc($srcdoc)
            {
                global $builder;

                $builder .= ' srcdoc="'.$srcdoc.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'></iframe>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'></iframe>';
            }
        
        };

    }

    public function video()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<video';
            }

            public function src($src)
            {
                global $builder;

                $builder .= ' src="'.$src.'"';
            }

            public function height($height)
            {
                global $builder;

                $builder .= ' height="'.$height.'"';
            }

            public function width($width)
            {
                global $builder;

                $builder .= ' width="'.$width.'"';
            }

            public function autoplay($autoplay)
            {
                global $builder;

                $builder .= ' autoplay="'.$autoplay.'"';
            }

            public function controls($controls)
            {
                global $builder;

                $builder .= ' controls="'.$controls.'"';
            }

            public function loop($loop)
            {
                global $builder;

                $builder .= ' loop="'.$loop.'"';
            }

            public function muted($muted)
            {
                global $builder;

                $builder .= ' muted="'.$muted.'"';
            }

            public function poster($poster)
            {
                global $builder;

                $builder .= ' poster="'.$poster.'"';
            }

            public function preload($preload)
            {
                global $builder;

                $builder .= ' preload="'.$preload.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'></video>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'></video>';
            }
        
        };

    }

    public function audio()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<audio';
            }

            public function src($src)
            {
                global $builder;

                $builder .= ' src="'.$src.'"';
            }

            public function autoplay($autoplay)
            {
                global $builder;

                $builder .= ' autoplay="'.$autoplay.'"';
            }

            public function controls($controls)
            {
                global $builder;

                $builder .= ' controls="'.$controls.'"';
            }

            public function loop($loop)
            {
                global $builder;

                $builder .= ' loop="'.$loop.'"';
            }

            public function muted($muted)
            {
                global $builder;

                $builder .= ' muted="'.$muted.'"';
            }

            public function preload($preload)
            {
                global $builder;

                $builder .= ' preload="'.$preload.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'></audio>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'></audio>';
            }
        
        };

    }

    public function table()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $elementBefore = "";

            public function new()
            {
                global $builder;
                global $elementBefore;

                $builder = '<table';
                $elementBefore = '>';
            }

            public function row()
            {
                global $builder;
                global $elementBefore;

                $builder .= $elementBefore.'<tr>';
                $elementBefore = '</tr>';
            }

            public function caption($caption)
            {
                global $builder;
                global $elementBefore;

                $builder .= $elementBefore.'<caption>'.$caption.'</caption>';
                $elementBefore = '';
            }

            public function heading($heading, $attr='')
            {
                global $builder;

                $builder .= '<th '.$attr.'>'.$heading.'</th>';
            }

            public function data($data, $attr='')
            {
                global $builder;

                $builder .= '<td '.$attr.'>'.$data.'</td>';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;
                global $elementBefore;

                echo $builder.$elementBefore.'</table>';
            }

            public function _create()
            {
                global $builder;
                global $elementBefore;

                return $builder.$elementBefore.'</table>';
            }
        
        };

    }

    public function label()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $content = "";

            public function new()
            {
                global $builder;

                $builder = '<label';
            }

            public function for($for)
            {
                global $builder;

                $builder .= ' for="'.$for.'"';
            }

            public function text($text)
            {
                global $content;

                $content = $text;
            }

            public function form($form)
            {
                global $builder;

                $builder .= ' form="'.$form.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;
                global $content;

                echo $builder.'>'.$content.'</label>';
            }

            public function _create()
            {
                global $builder;
                global $content;

                return $builder.'>'.$content.'</label>';
            }
        
        };

    }

    public function input()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";

            public function new()
            {
                global $builder;

                $builder = '<input';
            }

            public function value($value)
            {
                global $builder;

                $builder .= ' value="'.$value.'"';
            }

            public function placeholder($placeholder)
            {
                global $builder;

                $builder .= ' placeholder="'.$placeholder.'"';
            }

            public function accept($accept)
            {
                global $builder;

                $builder .= ' accept="'.$accept.'"';
            }

            public function alt($alt)
            {
                global $builder;

                $builder .= ' alt="'.$alt.'"';
            }

            public function autocomplete($autocomplete)
            {
                global $builder;

                $builder .= ' autocomplete="'.$autocomplete.'"';
            }

            public function autofocus($autofocus)
            {
                global $builder;

                $builder .= ' autofocus="'.$autofocus.'"';
            }

            public function checked($checked)
            {
                global $builder;

                $builder .= ' checked="'.$checked.'"';
            }

            public function dirname($dirname)
            {
                global $builder;

                $builder .= ' dirname="'.$dirname.'"';
            }

            public function disabled()
            {
                global $builder;

                $builder .= ' disabled';
            }

            public function form($form)
            {
                global $builder;

                $builder .= ' form="'.$form.'"';
            }

            public function formaction($formaction)
            {
                global $builder;

                $builder .= ' formaction="'.$formaction.'"';
            }

            public function formenctype($formenctype)
            {
                global $builder;

                $builder .= ' formenctype="'.$formenctype.'"';
            }

            public function formmethod($formmethod)
            {
                global $builder;

                $builder .= ' formmethod="'.$formmethod.'"';
            }

            public function formnovalidate()
            {
                global $builder;

                $builder .= ' formnovalidate';
            }

            public function formtarget($formtarget)
            {
                global $builder;

                $builder .= ' formtarget="'.$formtarget.'"';
            }

            public function height($height)
            {
                global $builder;

                $builder .= ' height="'.$height.'"';
            }

            public function width($width)
            {
                global $builder;

                $builder .= ' width="'.$width.'"';
            }

            public function datalist($list)
            {
                global $builder;

                $builder .= ' list="'.$list.'"';
            }

            public function max($max)
            {
                global $builder;

                $builder .= ' max="'.$max.'"';
            }

            public function maxlength($maxlength)
            {
                global $builder;

                $builder .= ' maxlength="'.$maxlength.'"';
            }

            public function min($min)
            {
                global $builder;

                $builder .= ' min="'.$min.'"';
            }

            public function minlength($minlength)
            {
                global $builder;

                $builder .= ' minlength="'.$minlength.'"';
            }

            public function multiple()
            {
                global $builder;

                $builder .= ' multiple';
            }

            public function name($name)
            {
                global $builder;

                $builder .= ' name="'.$name.'"';
            }

            public function pattern($pattern)
            {
                global $builder;

                $builder .= ' pattern="'.$pattern.'"';
            }

            public function readonly()
            {
                global $builder;

                $builder .= ' readonly';
            }

            public function required()
            {
                global $builder;

                $builder .= ' required';
            }

            public function size($size)
            {
                global $builder;

                $builder .= ' size="'.$size.'"';
            }

            public function src($src)
            {
                global $builder;

                $builder .= ' src="'.$src.'"';
            }

            public function step($step)
            {
                global $builder;

                $builder .= ' step="'.$step.'"';
            }

            public function type($type)
            {
                global $builder;

                $builder .= ' type="'.$type.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'>';
            }
        
        };

    }

    public function textarea()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $content = "";

            public function new()
            {
                global $builder;

                $builder = '<textarea';
            }

            public function placeholder($placeholder)
            {
                global $builder;

                $builder .= ' placeholder="'.$placeholder.'"';
            }

            public function text($text)
            {
                global $builder;
                global $content;

                $content = $text;
            }

            public function autofocus($autofocus)
            {
                global $builder;

                $builder .= ' autofocus="'.$autofocus.'"';
            }

            public function disabled()
            {
                global $builder;

                $builder .= ' disabled';
            }

            public function form($form)
            {
                global $builder;

                $builder .= ' form="'.$form.'"';
            }

            public function maxlength($maxlength)
            {
                global $builder;

                $builder .= ' maxlength="'.$maxlength.'"';
            }

            public function name($name)
            {
                global $builder;

                $builder .= ' name="'.$name.'"';
            }

            public function readonly()
            {
                global $builder;

                $builder .= ' readonly';
            }

            public function required()
            {
                global $builder;

                $builder .= ' required';
            }

            public function rows($rows)
            {
                global $builder;

                $builder .= ' rows="'.$rows.'"';
            }

            public function wrap($wrap)
            {
                global $builder;

                $builder .= ' wrap="'.$wrap.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;
                global $content;

                echo $builder.'>'.$content.'</textarea>';
            }

            public function _create()
            {
                global $builder;
                global $content;

                return $builder.'>'.$content.'</textarea>';
            }
        
        };

    }

    public function button()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $content = "";

            public function new()
            {
                global $builder;

                $builder = '<button';
            }

            public function text($text)
            {
                global $builder;
                global $content;

                $content = $text;
            }

            public function autofocus($autofocus)
            {
                global $builder;

                $builder .= ' autofocus="'.$autofocus.'"';
            }

            public function disabled()
            {
                global $builder;

                $builder .= ' disabled';
            }

            public function form($form)
            {
                global $builder;

                $builder .= ' form="'.$form.'"';
            }

            public function formaction($formaction)
            {
                global $builder;

                $builder .= ' formaction="'.$formaction.'"';
            }

            public function formenctype($formenctype)
            {
                global $builder;

                $builder .= ' formenctype="'.$formenctype.'"';
            }

            public function formmethod($formmethod)
            {
                global $builder;

                $builder .= ' formmethod="'.$formmethod.'"';
            }

            public function formnovalidate()
            {
                global $builder;

                $builder .= ' formnovalidate';
            }

            public function formtarget($formtarget)
            {
                global $builder;

                $builder .= ' formtarget="'.$formtarget.'"';
            }

            public function name($name)
            {
                global $builder;

                $builder .= ' name="'.$name.'"';
            }

            public function readonly()
            {
                global $builder;

                $builder .= ' readonly';
            }

            public function required()
            {
                global $builder;

                $builder .= ' required';
            }

            public function type($type)
            {
                global $builder;

                $builder .= ' type="'.$type.'"';
            }

            public function value($value)
            {
                global $builder;

                $builder .= ' value="'.$value.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;
                global $content;

                echo $builder.'>'.$content.'</button>';
            }

            public function _create()
            {
                global $builder;
                global $content;

                return $builder.'>'.$content.'</button>';
            }
        
        };

    }

    public function progress()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $content = "";

            public function new()
            {
                global $builder;

                $builder = '<progress';
            }

            public function max($max)
            {
                global $builder;

                $builder .= ' max="'.$max.'"';
            }

            public function value($value)
            {
                global $builder;

                $builder .= ' value="'.$value.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'></progress>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'></progress>';
            }
        
        };

    }

    public function meter()
    {

        return new class() extends phtml
        {
            
            protected $builder = "";
            protected $content = "";

            public function new()
            {
                global $builder;

                $builder = '<meter';
            }

            public function max($max)
            {
                global $builder;

                $builder .= ' max="'.$max.'"';
            }

            public function min($min)
            {
                global $builder;

                $builder .= ' min="'.$min.'"';
            }

            public function value($value)
            {
                global $builder;

                $builder .= ' value="'.$value.'"';
            }

            public function form($form)
            {
                global $builder;

                $builder .= ' form="'.$form.'"';
            }

            public function high($high)
            {
                global $builder;

                $builder .= ' high="'.$high.'"';
            }

            public function low($low)
            {
                global $builder;

                $builder .= ' low="'.$low.'"';
            }

            public function optimum($optimum)
            {
                global $builder;

                $builder .= ' optimum="'.$optimum.'"';
            }

            public function class($class)
            {
                global $builder;

                $builder .= ' class="'.$class.'"';
            }

            public function id($id)
            {
                global $builder;

                $builder .= ' id="'.$id.'"';
            }

            public function attr($attr, $value)
            {
                global $builder;

                $builder .= ' '.$attr.'="'.$value.'"';
            }

            public function create()
            {
                global $builder;

                echo $builder.'></meter>';
            }

            public function _create()
            {
                global $builder;

                return $builder.'></meter>';
            }
        
        };

    }

}
