<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Aicha
 * Date: 13/03/13
 * Time: 09:54
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

$test_array = array (
    'bla' => 'blub',
    'foo' => 'bar',
    'another_array' => array (
        'stack' => 'overflow',
    ),
);



//test
$doc = new DOMDocument('1.0');
$doc->formatOutput = true;
//$root=$doc->appendChild(arrayToXML($test_array,'root',$doc));
$root=$doc->appendChild(arrayToXML($test_array,'root',$doc));

print $doc->saveXML();
//print arrayToXML($test_array,'root')->saveXML();

$monfichier = fopen('arrayToXML.xml', 'a+');

fseek($monfichier, 0); // On remet le curseur au début du fichier
fputs($monfichier, $doc->saveXML()); // On écrit  de pages vues
fclose($monfichier);