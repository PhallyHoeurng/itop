<?php

class CustomChangeManagement
{
    /**
     * Validate before saving or transition
     */
    public static function OnBeforeWrite(Change $oChange)
    {
        if ($oChange->Get('top_manager_id') == 0) {
            // optional rule (you can remove if not needed)
        }
    }

    /**
     * Validate Assign transition
     */
    public static function CheckBeforeTransition(Change $oChange, $sStimulus)
    {
        if ($sStimulus == 'ev_assign') {

            if ((int)$oChange->Get('top_manager_id') == 0) {
                throw new Exception('Top Manager is required during Assign.');
            }
        }
    }
}
