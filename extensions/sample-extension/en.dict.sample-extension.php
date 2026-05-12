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
    
    // ServiceSubcategory linked set
    'Class:UserRequest/Attribute:access_level_name' => 'Access Level',
    'Class:ServiceSubcategory/Attribute:access_level_name+' => 'The access levels available for this subcategory',
    
    // Error message for validation
    'Class:ServiceSubcategory/Error:NoAccessLevel' => 'You must add at least one Access Level before creating this Service Subcategory.',
));


?>
