<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aicha
 * Date: 13/03/13
 * Time: 10:02
 * To change this template use File | Settings | File Templates.
 */

function arrayToXML($array,$node_name,$doc)
{
    $root = $doc->createElement($node_name);
    $root = $doc->appendChild($root);

    foreach($array as $key=>$value)
    {
        if (is_array($value)){

            $root->appendChild(arrayToXML($value,$key,$doc));
        }
        else {
            $em = $doc->createElement($key);
            $text = $doc->createTextNode($value);
            $em->appendChild($text);
            $root->appendChild($em);

        }

    }
    return $root;
}

function chargerClasse($classe)
{
    require $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
}


//chargerClasse

spl_autoload_register('chargerClasse'); // On enregistre la fonction

$doc = new DOMDocument('1.0');
$doc->formatOutput = true;

$root=new Root("structure_info");
$root->setVersion("3.0.0");

$spread=new Node("spread");

/*<spread pageId="0" name="362-1.pdf" fileName="362-1.pdf" thumbnail="thumb500-previewPage-362-1.jpg"
                preview="previewPage-362-1.jpg" width="595.275590551" height="841.889763778" indexInPdf="0"/>$*/

$spread_array = array (
    'pageId' => '0',
    'name' => '362-1.pdf',
    'thumbnail' =>'thumb500-previewPage-362-1.jpg',
    'preview'=>'previewPage-362-1.jpg',
);


$spread->setAttributes($spread_array);
$spread->addAttribute('width','595.275590551');
//print_r($spread->attributes());

//$test=$doc->appendChild(arrayToXML($spread_array,'spread',$doc));

//$root->nodeXML($doc);

//$spread->nodeXML($doc);

$racine=$doc->appendChild($root->nodeXML($doc));
$spreadXml=$racine->appendChild($doc->appendChild($spread->nodeXML($doc)));

$page=new Node('page');

$page_array=array(
    'name'=>'362-2.pdf',
    'fileName'=>'362-2.pdf',
    'width'=>'595.275590551',
    'height'=>'841.8897637780001',
);

$page->setAttributes($page_array);
$spreadXml->appendChild($doc->appendChild($page->nodeXML($doc)));


//$pageXml=$doc->appendChild($page->nodeXML($doc));



print $doc->saveXML();







