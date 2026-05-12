<?php
require_once dirname(__FILE__) . '/../../../approot.inc.php';
require_once APPROOT . '/application/startup.inc.php';

header('Content-Type: application/json');

try {
    $iSubcategoryId = (int) utils::ReadParam('subcategory_id', 0);
    if ($iSubcategoryId <= 0) throw new Exception('Invalid subcategory');

    $sSQL = "SELECT id, access_name FROM access_level WHERE subcategory_id = $iSubcategoryId AND status = 'active'";
    $oResult = CMDBSource::Query($sSQL);

    $aData = [];
    while ($aRow = $oResult->fetch_assoc()) {
        $aData[] = ['id' => (int)$aRow['id'], 'name' => $aRow['access_name']];
    }

    echo json_encode(['success' => true, 'data' => $aData]);
} catch (Exception $e) {
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}
exit;
