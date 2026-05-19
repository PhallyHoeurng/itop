<?php
/**
 * Localized data
 *
 * @copyright   Copyright (C) 2013 XXXXX
 * @license     http://opensource.org/licenses/AGPL-3.0
 */

Dict::Add('EN US', 'English', 'English', array(
    // AccessLevel class
    'Class:AccessLevel' => 'Access Level',
    'Class:AccessLevel+' => 'Access levels that can be assigned to service subcategories',
    
    'Class:AccessLevel/Attribute:access_name' => 'Access Name',
    'Class:AccessLevel/Attribute:access_name+' => 'The name of this access level',
    
    'Class:AccessLevel/Attribute:subcategory_id' => 'Service Subcategory',
    'Class:AccessLevel/Attribute:subcategory_id+' => 'The parent service subcategory',
    
    'Class:AccessLevel/Attribute:status' => 'Status',
    'Class:AccessLevel/Attribute:status+' => 'Whether this access level is active',
    'Class:AccessLevel/Attribute:status/Value:active' => 'Active',
    'Class:AccessLevel/Attribute:status/Value:inactive' => 'Inactive',
    
    // Error message for validation
    'Class:ServiceSubcategory/Error:NoAccessLevel' => 'You must add at least one Access Level before creating this Service Subcategory.',



    // UserRequest attribute overrides
    'Class:UserRequest/Attribute:access_level_name' => 'System Role',
    'Class:UserRequest/Attribute:access_level_name+' => 'Selected system role',

));


?>
