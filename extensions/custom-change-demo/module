<?php

SetupWebPage::AddModule(
    __FILE__,
    'custom-change-mgmt/1.0.0',
    array(
        'label' => 'Custom Change Management Lifecycle and Security Rules',
        'category' => 'business',
        'dependencies' => array(
            'itop-change-mgmt/3.2.1',
            'itop-config-mgmt/2.2.0',
            'itop-tickets/2.0.0',
        ),
        'mandatory' => false,
        'visible' => true,

        'datamodel' => array(
            'datamodel.custom-change-mgmt.xml', // Fixed missing 'm'
        ),

        'webservice' => array(),

        'dictionary' => array(
            'en.dict.custom-change-mgmt.php', // Fixed missing 'm'
        ),

        'data.struct' => array(
            // add your 'structure' definition XML files here,
        ),

        'data.sample' => array(
            // add your sample data XML files here,
        ),

        // Documentation
        'doc.manual_setup' => '',
        'doc.more_information' => '',

        // Default settings
        'settings' => array(
            // Module specific settings go here, if any
        ),
    )
);
