<?php

// class AccessLevelGroup extends cmdbAbstractObject
// {
//     public function DoCheckToWrite()
//     {
//         parent::DoCheckToWrite();

//         $oSearch = DBObjectSearch::FromOQL(
//             "SELECT AccessLevelGroup
//              WHERE group_name = :name
//              AND id != :id"
//         );

//         $oSet = new DBObjectSet(
//             $oSearch,
//             array(),
//             array(
//                 'name' => $this->Get('group_name'),
//                 'id' => $this->GetKey()
//             )
//         );

//         if ($oSet->Count() > 0) {
//             $this->m_aCheckIssues[] = 'Access Level Group already exists.';
//         }
//     }
// }

// class RoleSystem extends cmdbAbstractObject
// {
//     public function DoCheckToWrite()
//     {
//         parent::DoCheckToWrite();

//         $oSearch = DBObjectSearch::FromOQL(
//             "SELECT RoleSystem
//              WHERE role_name = :name
//              AND access_level_group_id = :group
//              AND id != :id"
//         );

//         $oSet = new DBObjectSet(
//             $oSearch,
//             array(),
//             array(
//                 'name' => $this->Get('role_name'),
//                 'group' => $this->Get('access_level_group_id'),
//                 'id' => $this->GetKey()
//             )
//         );

//         if ($oSet->Count() > 0) {
//             $this->m_aCheckIssues[] = 'Role already exists in this Access Level Group.';
//         }
//     }
// }
