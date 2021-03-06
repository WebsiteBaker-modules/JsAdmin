<?php
/**
 *
 * @category        modules
 * @package         jsadmin
 * @author          WebsiteBaker Project
 * @copyright       WebsiteBaker Org. e.V.
 * @link            http:/websitebaker.org/
 * @license         http://www.gnu.org/licenses/gpl.html
 * @platform        WebsiteBaker 2.8.3
 * @requirements    PHP 5.3.6 and higher
 * @version         $Id: upgrade.php 67 2017-03-03 22:14:28Z manu $
 * @filesource      $HeadURL: svn://isteam.dynxs.de/wb2.10/tags/WB-2.10.0/wb/modules/jsadmin/upgrade.php $
 * @lastmodified    $Date: 2017-03-03 23:14:28 +0100 (Fr, 03. Mrz 2017) $
 *
 */

/* -------------------------------------------------------- */
// Must include code to stop this file being accessed directly
if(defined('WB_PATH') == false) { die('Illegale file access /'.basename(__DIR__).'/'.basename(__FILE__).''); }
/* -------------------------------------------------------- */

$msg = '';
$sTable = TABLE_PREFIX.'mod_jsadmin';
if(($sOldType = $database->getTableEngine($sTable))) {
    if(('myisam' != strtolower($sOldType))) {
        if(!$database->query('ALTER TABLE `'.$sTable.'` Engine = \'MyISAM\' ')) {
            $msg = $database->get_error();
        }
    }
} else {
    $msg = $database->get_error();
}
// ------------------------------------
    $sInstallStruct = __DIR__.'/install-struct.sql';
    if (!is_readable($sInstallStruct)) {
        $msg[] = '<strong>\'missing or not readable file [install-struct.sql]\'</strong> '.$FAIL.'<br />';
        $iErr = true;
    } else {
        $database->SqlImport($sInstallStruct, TABLE_PREFIX, true );
    }
