<?php

$sBaseDir = dirname(__FILE__);
$sBaseDir = dirname($sBaseDir);
$sBaseDir = dirname($sBaseDir);
$sBaseDir = dirname($sBaseDir);

require_once $sBaseDir . '/approot.inc.php';
require_once APPROOT . '/application/startup.inc.php';

ob_clean();

header('Content-Type: application/json; charset=utf-8');

try {

    $iSubcategoryId = (int) utils::ReadParam('subcategory_id', 0);

    if ($iSubcategoryId <= 0) {
        throw new Exception('Invalid subcategory');
    }

    $sSQL = "SELECT id, access_name 
             FROM access_level 
             WHERE subcategory_id = " . (int)$iSubcategoryId . "
             AND status = 'active'
             ORDER BY access_name ASC";

    $oResult = CMDBSource::Query($sSQL);

    $aData = array();

    if ($oResult) {
        while ($aRow = $oResult->fetch_assoc()) {
            $aData[] = array(
                'id' => (int)$aRow['id'],
                'name' => $aRow['access_name']
            );
        }
        $oResult->free();
    }

    echo json_encode(array(
        'success' => true,
        'data' => $aData
    ));
} catch (Exception $e) {

    echo json_encode(array(
        'success' => false,
        'error' => $e->getMessage()
    ));
}

exit;
