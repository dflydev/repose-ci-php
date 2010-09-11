<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Repose model classes location
 *
 * Use this configuration setting to specify an alternate folder that contains
 * the project's Repose model classes. These are the model class that are
 * referenced by the repose_mapping configuration setting.
 * 
 * If not specified, Repose will default to looking in the repose-models
 * directory in the application folder.
 */
//$config['repose_model_libs'] = APPPATH . 'repose-models';

/**
 * Repose PDO connection
 * 
 * Used in the event that a direct PDO connection is better suited for the
 * task than the built in CodeIgniter DB. For example, connecting to a
 * sqlite3 database.
 */
//$config['repose_pdo_connection'] = array(
//    'dsn' => '',
//    'username' => '',
//    'password' => '',
//);

/**
 * Repose mapping
 * 
 * Refer to the Repose manual for configuration based mapping.
 * http://code.google.com/p/repose-php/wiki/ManualMapping
 * 
 * The classes referenced here should be accessible in the repose_model_libs
 * path. For instance, if a class named 'sample_Project' is mapped, it should
 * live at application/repose-models/sample_Project.php
 */
$config['repose_mapping'] = array(
    
    // 
    // Example mapping:
    //
    //'sample_Project' => array(
    //    'tableName' => 'project',
    //    'properties' => array(
    //        'projectId' => array( 'primaryKey' => 'true', ),
    //        'name' => null,
    //        'manager' => array(
    //            'relationship' => 'many-to-one',
    //            'className' => 'sample_User',
    //            'columnName' => 'managerUserId',
    //        ),
    //        'bugs' => array(
    //            'relationship' => 'one-to-many',
    //            'className' => 'sample_Bug',
    //            'backref' => 'project',
    //            'cascade' => 'delete-orphan',
    //        ),
    //    ),
    //),
    //
    //'sample_ProjectInfo' => array(
    //    'tableName' => 'projectInfo',
    //    'properties' => array(
    //        'projectInfoId' => array( 'primaryKey' => 'true', ),
    //        'description' => null,
    //        'project' => array(
    //            'relationship' => 'one-to-one',
    //            'className' => 'sample_Project',
    //        ),
    //    ),
    //),
    //
    //'sample_Bug' => array(
    //    'tableName' => 'bug',
    //    'properties' => array(
    //        'bugId' => array( 'primaryKey' => 'true', ),
    //        'title' => null,
    //        'body' => null,
    //        'project' => array(
    //            'relationship' => 'many-to-one',
    //            'className' => 'sample_Project',
    //        ),
    //        'reporter' => array(
    //            'relationship' => 'many-to-one',
    //            'className' => 'sample_User',
    //            'columnName' => 'reporterUserId',
    //        ),
    //        'owner' => array(
    //            'relationship' => 'many-to-one',
    //            'className' => 'sample_User',
    //            'columnName' => 'ownerUserId',
    //        ),
    //    ),
    //),
    //
    //'sample_User' => array(
    //    'tableName' => 'user',
    //    'properties' => array(
    //        'userId' => array( 'primaryKey' => 'true', ),
    //        'name' => null,
    //    ),
    //)
    //
    
);

?>