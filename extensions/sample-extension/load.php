<?php
$sClass = utils::ReadParam('class', '');

if ($sClass === 'UserRequest') {
    $sBaseUrl = utils::GetAbsoluteUrlModulesRoot() . 'sample-extension/assets/';
    echo '<script src="' . $sBaseUrl . 'js/userrequest.js"></script>' . "\n";
    echo '<link rel="stylesheet" href="' . $sBaseUrl . 'css/style.css">' . "\n";
}
