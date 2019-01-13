<?php
define('CONFIGSRVFILE',"Server.json");
define('MAXSIZE',2048);   // Max size of configuration file (Server.json)

/**
 * This file is called by ajax.post. determine if user is valid
 *
 * Ce fichier redirige les demandes vers la page appropriée
 *
 * PHP version 5.6
 *
 * LICENSE: This source file is subject to version 3.01 of the PHP license
 * that is available through the world-wide-web at the following URI:
 * http://www.php.net/license/3_01.txt.  If you did not receive a copy of
 * the PHP License and are unable to obtain it through the web, please
 * send a note to license@php.net so we can mail you a copy immediately.
 *
 * @category  Main
 * @package   phpAduc
 * @author    Serge NOEL <serge.noel@net6a.com>
 * @copyright 2016-2017 NET6A
 * @license   http://opensource.org/licenses/gpl-license.php GNU Public License
 * @version   GIT: 1.0
 * @link      ../tests/Documentation Tests/Documentation.odt
 */

// Read Server.json
$hFile = fopen($_SERVER['DOCUMENT_ROOT'].'/src/config/'.CONFIGSRVFILE,'r');
if( $hFile === FALSE )
  die('ERROR: unable to load '.CONFIGSRVFILE);
$jsonConfig = fread($hFile,MAXSIZE);
fclose($hFile);

session_start();

$Cfg = json_decode($jsonConfig);
// Read user and password from POST datas
$sLogin=filter_input(INPUT_POST,'User',FILTER_SANITIZE_STRING);
$sPasswd=filter_input(INPUT_POST,'Pass',FILTER_SANITIZE_STRING);

if( $sLogin == "snoel" && $sPasswd='Pa$$w0rd' )
  {
  echo "OK";
  // Save usefull informations
  $_SESSION['Loggued']=true;
  $_SESSION['User']['login'] = $sLogin;
  $_SESSION['User']['lang'] = "fr";
  $_SESSION['Action'] = "Main";
  }
else
  {
  echo "ERREUR: Compte ou mot de passe invalide !";
  }
