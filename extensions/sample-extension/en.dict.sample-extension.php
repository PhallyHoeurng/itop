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



//     // UserRequest attribute overrides
//     'Class:UserRequest/Attribute:access_level_name' => 'System Role',
//     'Class:UserRequest/Attribute:access_level_name+' => 'Selected system role',
//     'Class:UserRequest/Attribute:access_level_id' => 'Access Level ID',

//     'Class:AccessLevelGroup' => 'Access Level Group',
//     'Class:AccessLevelGroup+' => 'Group of Access Levels',
//     'Class:AccessLevelGroup/Attribute:group_name' => 'Group Name',
//     'Class:AccessLevelGroup/Attribute:subcategory_id' => 'Service Subcategory',
//     'Class:AccessLevelGroup/Attribute:subcategory_name' => 'Service Subcategory',
//     'Class:AccessLevelGroup/Attribute:status' => 'Status',
//     'Class:AccessLevelGroup/Attribute:access_levels_list' => 'Access Levels',
//     'Class:AccessLevelGroup/Error:NoAccessLevel' => 'You must add at least one Access Level before creating this Access Level Group.',

//     'Class:ServiceSubcategory/Attribute:access_level_groups_list' => 'Access Level Groups',

//     'Class:AccessLevel/Attribute:access_level_group_id' => 'Access Level Group',
//     'Class:AccessLevel/Attribute:access_level_group_name' => 'Access Level Group',

//     'Class:UserRequestAccessLevel' => 'User Request Access Level',
//     'Class:UserRequestAccessLevel+' => 'Store User Request Access Level',
//     'Class:UserRequestAccessLevel/Attribute:name' => 'Name',
//     'Class:UserRequestAccessLevel/Attribute:request_id' => 'Request',
//     'Class:UserRequestAccessLevel/Attribute:accesslevel_id' => 'Access Level ID',

    // UserRequest attribute overrides
    'Class:UserRequest/Attribute:access_level_name' => 'System Role',
    'Class:UserRequest/Attribute:access_level_name+' => 'Selected system role',
    'Class:UserRequest/Attribute:access_level_id' => 'Access Level ID',

    // Access Level Group
    'Class:AccessLevelGroup' => 'Access Level Group',
    'Class:AccessLevelGroup+' => 'Group of Access Levels',
    'Class:AccessLevelGroup/Attribute:group_name' => 'Group Name',
    'Class:AccessLevelGroup/Attribute:subcategory_id' => 'Service Subcategory',
    'Class:AccessLevelGroup/Attribute:subcategory_name' => 'Service Subcategory',
    'Class:AccessLevelGroup/Attribute:status' => 'Status',
    // Updated list pointer and error string to reference Role Systems instead of Access Levels
    'Class:AccessLevelGroup/Attribute:role_systems_list' => 'Role Systems',
    'Class:AccessLevelGroup/Attribute:role_systems_list+' => 'List of roles associated with this access level group',
    'Class:AccessLevelGroup/Error:NoRoleSystem' => 'You must add at least one Role System before creating this Access Level Group.',

    // Service Subcategory
    'Class:ServiceSubcategory/Attribute:access_level_groups_list' => 'Access Level Groups',

    // NEW NEW NEW: Role System Class Strings
    'Class:RoleSystem' => 'Role System',
    'Class:RoleSystem+' => 'System roles assigned to access groups',
    'Class:RoleSystem/Attribute:role_name' => 'Role Name',
    'Class:RoleSystem/Attribute:role_name+' => 'The unique name of this system role',
    'Class:RoleSystem/Attribute:access_level_group_id' => 'Access Level Group',
    'Class:RoleSystem/Attribute:access_level_group_id+' => 'Linked group for this system role',
    'Class:RoleSystem/Attribute:access_level_group_name' => 'Access Level Group Name',
    'Class:RoleSystem/Attribute:access_level_group_name+' => '',

    // User Request Access Level
    'Class:UserRequestAccessLevel' => 'User Request Access Level',
    'Class:UserRequestAccessLevel+' => 'Store User Request Access Level',
    'Class:UserRequestAccessLevel/Attribute:name' => 'Name',
    'Class:UserRequestAccessLevel/Attribute:request_id' => 'Request',
    'Class:UserRequestAccessLevel/Attribute:accesslevel_id' => 'Access Level ID',
));
?>