<?php

// Prevent direct execution outside of the iTop framework
if (!class_exists('UserRights')) {
    return;
}

/**
 * Custom Change Confirmation Handler
 * Extends AbstractApplicationObjectExtension so we don't need empty stub methods.
 */
class ChangeConfirmationExtension extends AbstractApplicationObjectExtension
{
    /**
     * Intercepts and validates stimuli execution
     * * @param string $sClass
     * @param DBObject $oObject
     * @param string $sStimulusCode
     * @param bool $bAllowed
     */
    public function OnIsAllowedStimulus($sClass, $oObject, $sStimulusCode, &$bAllowed)
    {
        // Enforce rules strictly on Change tickets (or subclasses)
        if (!($oObject instanceof Change)) {
            return;
        }

        // Intercept our specific manager approval stimuli
        if (in_array($sStimulusCode, array('ev_confirm', 'ev_reject'))) {
            $oUser = UserRights::GetUserObject();
            if (!$oUser) {
                $bAllowed = false;
                return;
            }

            // Fetch the logged-in user's contact (Person) ID and compare it to the designated manager
            $iPersonId = $oUser->Get('contactid');
            $iManagerId = $oObject->Get('confirm_manager_id');

            // If no manager is assigned or the user is not the designated manager, block the action
            if (empty($iManagerId) || $iManagerId != $iPersonId) {
                $bAllowed = false;
            }
        }
    }
}
