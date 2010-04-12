<?php
/**
 * Repose library
 * @package repose_ci
 */

if ( ! class_exists('dd_ci_VendorLibs') ) {
    // If VendorLibs is not available we will try to use some simple default
    // settings. VendorLibs makes this sort of thing more flexible.
    // Use VendorLibs!
    $newPaths = array(get_include_path());
    foreach ( array('vendors/repose') as $testPath ) {
        foreach ( array(APPPATH, BASEPATH) as $testBase ) {
            if ( file_exists($testBase . $testPath) ) {
                $newPaths[] = $testBase . $testPath;
            }
        }
    }
    set_include_path(implode(PATH_SEPARATOR, $newPaths));
}

require_once('repose_AbstractSessionFactory.php');
require_once('repose_Mapping.php');
require_once('repose_AbstractSqlEngine.php');
require_once('repose_Session.php');
require_once('repose_PathAutoloader.php');

/**
 * Repose library
 * @package repose_ci
 */
class Repose extends repose_AbstractSessionFactory {
    
    /**
     * Engine
     * @var repose_IEngine
     */
    protected $engine;

    /**
     * Mapping
     * @var repose_Mapping
     */
    protected $mapping;

    /**
     * Autoloader
     * @var repose_IAutoloader
     */
    protected $autoloader;

    /**
     * Constructor
     */
    public function __construct() {
        
        $CI =& get_instance();
        
        $CI->load->database();
        
        $config = $CI->config;
        
        $config->load('repose');
        
        if ( ! $config->item('repose_model_libs') ) {
            // If the location for the model libs has not been specified
            // we will use the default location.
            $config->set_item('repose_model_libs', APPPATH . 'repose-models');
        }
        
        $this->engine = new repose_ci_DbEngine($CI->db);
        $this->mapping = new repose_Mapping();
        $this->autoloader = new repose_PathAutoloader($config->item('repose_model_libs'));
        
        foreach ( $config->item('repose_mapping') as $clazz => $clazzConfig ) {
            // TODO Replace this with an autoloader.
            $this->mapping->mapClass(
                $clazz,
                $clazzConfig['tableName'],
                $clazzConfig['properties']
            );
        }
        
    }


    /**
     * Session
     * @return repose_Session
     */
    public function session() {
        return $this->currentSession();
    }
    
    /**
     * Opens a new session
     * @return repose_Session
     */
    public function openSession() {
        return new repose_Session(
            $this->engine,
            $this->mapping,
            $this->autoloader
        );
    }
    
    /**
     * Load a model class
     * @param string $clazz Model class to load
     */
    public function loadModel($clazz) {
        $this->autoloader->loadClass($clazz);
    }

}

/**
 * Db Engine.
 * @package repose
 */
class repose_ci_DbEngine extends repose_AbstractSqlEngine {

    /**
     * Simplify the SQL
     * @var bool
     */
    protected $simplify = true;
    
    /**
     * CodeIgniter DB Instance
     * @var Db
     */
    protected $ciDb;

    /**
     * Constructor
     * @param Db $ciDb Db Data Source
     */
    public function __construct($ciDb) {
        $this->ciDb = $ciDb;
    }

    /**
     * Insert data into a table
     * @param string $sql SQL
     * @param array $data Associative array
     */
    protected function doInsert($sql, array $params) {
        $this->ciDb->query($sql, $params);
        return $this->ciDb->insert_id();
    }

    /**
     * Update data in a table
     * @param string $sql SQL
     * @param array $data Associative array
     */
    protected function doUpdate($sql, array $params) {
        $this->ciDb->query($sql, $params);
    }

    /**
     * Delete data from a table
     * @param string $sql SQL
     * @param array $data Associative array
     */
    protected function doDelete($sql, array $params) {
        $this->ciDb->query($sql, $params);
    }

    /**
     * Select data
     * @param string $sql SQL
     * @param array $data Associative array
     * @return array
     */
    protected function doSelect($sql, array $params) {
        return $this->ciDb->query($sql, $params)->result_array();
    }

}

?>