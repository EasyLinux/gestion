<?php
ini_set("display_errors","on");
error_reporting("E_ALL");
require_once "src/components/error/errHandler.php";
set_error_handler("ErrorHandler");

/**
 * This file is the entry point of SendMail 
 *
 * Ce fichier redirige les demandes vers la page appropriée 
 *
 * PHP version 7.3
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Main
 * @package   MailSend
 * @author    Serge NOEL <serge.noel@easylinux.fr>
 * @copyright 2016-2019 NET6A
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License  	
 * @version   GIT: (see tag )
 * @link      ../tests/Documentation Tests/Documentation.odt
 * @todo configuration si pas de serveur.json
 */

// Charge les classes installées par Composer
require_once 'vendor/autoload.php';
// Lire la configuration du site
//require_once 'src/config/config.php';
//require_once 'src/class/autoload.php';
session_start();

// @todo Ajouter dans la config le moyen de lire la langue acceptée
/* Initialisation de Smarty */
$oSmarty = new Smarty();
// Définir le dossier templates
$oSmarty->template_dir = 'src/templates';
// Définir le dossier qui recoit les templates compilés
$oSmarty->compile_dir = 'templates_c';
// Définir le dossier i18n
$oSmarty->config_dir = 'src/templates/locales/en/';
$aLanguages = explode(";",$_SERVER['HTTP_ACCEPT_LANGUAGE']);
foreach($aLanguages as $sLang)
  {
  $sFolder = @explode(",",$sLang)[1];
  if( file_exists("src/templates/locales/$sFolder/README.md") )
    {
    $oSmarty->config_dir = "src/templates/locales/$sFolder/";
    break;
    }
  }

// Lire la page demandée
if(!isset($_SESSION['Loggued']) || !isset($_SESSION['Action']))
  $Action='Login';
else
  $Action = $_SESSION['Action'];


switch($Action)
  {

  case 'Logout':
    unset($_SESSION['Loggued']);

  case 'Login':
    // if Server.json does'nt exist then display config
    $First = true;
    if( file_exists('src/config/Server.json') )
      {
      $First = false; 
      $template='login.tpl';
      }
    else
      {
      $template="config.tpl";
      }
    $component="";
    break;

  case 'Main':
    $template='main.tpl';
    $hFile = fopen('src/config/Menu.json',"r");
    $oMenu = json_decode(fread($hFile,8192));
    fclose($hFile);
    $oSmarty->assign('Menu',$oMenu);
    $component="";
    break;

  default:
    $component=strtolower($Action);
    $template="$component.tpl";
    echo nl2br(print_r($_SESSION,true));
    break;
  }

if($component!="")
  {
  require_once("src/components/$component.php");
  }

//echo "Display : $template";
$oSmarty->display($template);
