# phtml
PHTML is a simple method to write HTML in just PHP without touching any kind of HTML

## Fast FAQ
No more selfwritten HTML?
- Yes and no! PHTML was made to move the html directly into php. This means you write every code in PHP and it will create the html code for you.

Is this difficult?
- No! It is almost the same like HTML, just in PHP. The most functions got the same names like HTML tags or attributes ...

## How to start?
To start without problems, you need to include the phtml file and initialize the classes that you want to use ...

Initialize Example:
```php
include 'lib/phtml.php';

$phtml      =   new phtml;
$pmeta      =   (new phtml)->meta();
$plink      =   (new phtml)->link();
$pbase      =   (new phtml)->base();
$plist      =   (new phtml)->list();
$purl       =   (new phtml)->url(); # url is the same as the <a>-tag in HTML
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
```
If you done this, you're already ready to start.

## Examples

```php
#Draw a HTML Boilerplate:
$phtml->doctype();

$phtml->open('html');

    $phtml->open('head');
    
        $phtml->title('Example Page'); # Is Equal to <title>Example Page</title>
        
        $pmeta->new();
            $pmeta->charset('utf-8');
            $pmeta->create();
            
        $pmeta->new();
            $pmeta->name('viewport');
            $pmeta->content('width=device-width, initial-scale=1');
            $pmeta->create();
            
        $phtml->open('link', 'rel="stylesheet" href="style/main.min.css"');
            
    $phtml->close('head');
    
    $phtml->open('body');
    
    $phtml->close('body');
    
$phtml->close('html');
```

All sub classes of phtml needs are working like that:
```php
$varOfSubClass->new(); # To initialize the new coming element
/* Options for the element (Attributes, Content, ...) */
$varOfSubClass->create(); # Create is really important. Without create the element will be ignored and not created
```

## Getter & Setter
You can create the code directly or move it into a variable to work with it ...
A underscore symbol + the function to create the element will return it.
```php
$phtml->text('example'); # This will create a simple output of 'example'
$save = $phtml->_text('example'); # This will create and save the output into the $save variable. It can get used everywhere
```

## Help, my attribute does not work
It could happen that not all functions have all possible attributes ... But what can you do now?
Every SubClass has a function to create every attribute which is needed:
```php
$varOfSubClass->attr('ATTRIBUTE_NAME', 'VALUE');
```

## How to use tags, which doesn't exist?
Simple use the "open" function and if needed the "close" function.
```php
$phtml->open('HTML_TAG', 'ATTRIBUTES', 'CONTENT');
$phtml->open('HTML_TAG', 'ATTRIBUTES');
$phtml->open('HTML_TAG');
  # Maybe some content between
$phtml->close('HTML_TAG');
```

## br-tag
The br tag got a little special ...
If you need it more often, you can type a number inside:
```php
$phtml->break(); # The normal br tag
$phtml->break(2); # Creates 2 br tags
```

If you find a problem or you have any question, feel free to contact me:
Contact only on Discord: Fabian#3563 (Don't message me for fun!)
