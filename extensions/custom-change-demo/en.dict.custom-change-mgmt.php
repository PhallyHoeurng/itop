<?php

/**
 * Localized data for Custom Change Top Manager Approval Flow
 */

Dict::Add('EN US', 'English', 'English', array(
    'Class:Change/Attribute:changemanager_id' => 'Line Manager',
    'Class:Change/Attribute:changemanager_id+' => 'The Line manager responsible for approving this change.',

    'Class:Change/Attribute:top_manager_id' => 'Top Manager',
    'Class:Change/Attribute:top_manager_id+' => 'The top manager responsible for approving this change.',

    /* Status Labels */
    'Class:Change/Attribute:status/Value:approved' => 'Approved By L1',
    'Class:Change/Attribute:status/Value:approved+' => 'Change implementation has been completed and is awaiting top manager approval.',

    'Class:Change/Attribute:status/Value:verified' => 'Verified',
    'Class:Change/Attribute:status/Value:verified+' => 'Change implementation verified and ready for closure.',

    /* Stimulus (Button) Labels */
    'Class:Change/Stimulus:ev_top_mgt_approve' => 'Approve',
    'Class:Change/Stimulus:ev_top_mgt_approve+' => 'Click to approve this change request as Top Manager.',

    'Class:Change/Attribute:status/Value:top_mgt_approve' => 'Approved By L2',
    'Class:Change/Attribute:status/Value:top_mgt_approve+' => 'Change approved by top management and is awaiting verification.',

    'Class:Change/Stimulus:ev_verify' => 'Verify',
    'Class:Change/Stimulus:ev_verify+' => 'Click to verify this change implementation.',

    'Class:Change/Stimulus:ev_close' => 'Close',
    'Class:Change/Stimulus:ev_close+' => 'Click to officially finalize and close this change request.',

    /* Menu Labels */
    'Menu:ChangesAwaitingConfirmation' => 'Changes Awaiting Approval',
    'Menu:ChangesAwaitingConfirmation+' => 'Changes that require your active top management approval step.',
));
