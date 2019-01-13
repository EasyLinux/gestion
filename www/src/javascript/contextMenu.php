<?php
/*
 * This file generate javascript source file  of function customMenu
 *
 * We use config/contextMenu.json to generate javascript
 * Don't edit directly this file see 'doc'
 *
 */
header('Content-Type: application/javascript');


$sMenu = file_get_contents('../config/contextMenu.json');

$oContextMenu = json_decode($sMenu);
$Javascript = "
function customMenu(node) 
{
  switch(node.original.type)
  {\n";
  
foreach( $oContextMenu as $key => $value)
{
	$Javascript .= "    case \"".$key. "\":\n";
	$Javascript .= "      var items = {\n";
  foreach( $value as $Item )
  {
  	$Javascript .= getItemJS($Item);
  }
  $Javascript = substr($Javascript,0,-2);
  $Javascript .= "\n      };\n      break;\n";
}
$Javascript .= "  }\n  return items;\n}\n";
echo $Javascript;


/**
 * Recursive
 */
function getItemJS($Item,$Space="")
{
	$JS = "";
	$JS .= "        ". $Space . $Item->func.": {\n";
  $JS .= "         $Space label: \"".$Item->label."\",\n";
  if( property_exists($Item,"icon") && ($Item->icon != "") )
    $JS .= "         $Space icon: \"".$Item->icon."\",\n";
  if( property_exists($Item,"separator") && ($Item->separator == "true") )
  	$JS .= "         $Space separator_after: true,\n";
  if( property_exists($Item,"title") && ($Item->title != "") )
  	$JS .= "         $Space title: \"".$Item->title."\",\n";
  if( substr($Item->func,0,3) == "sub")
  {
  	$JS .= "          submenu: {\n";
  	foreach( $Item->items as $subItem)
  	{
  		$JS .= getItemJS($subItem,"    ");
  	}
  	$JS .= "          }}\n";
  }
  else
  {
  	if( property_exists($Item,"action") && ($Item->action != "") )
  		$JS .= "         $Space action: ".$Item->action.",\n";
  	else
  		$JS .= "         $Space action: function() { console.log(\"".$Item->label."\")},\n";
  }
  $JS = substr($JS,0,-2);
  $JS .= "},\n";
  return $JS;
}

