<?php
require_once 'GitTask.php';

/**
 * Perform a checkout in git.
 * @author Beau Simensen <simensen@gmail.com>
 */
class DatePropertyTask extends GitTask {

    /**
     * Property name
     * @var string
     */
    private $name = null;

    /**
     * Date format
     * @var string
     */
    private $format = null;
    
    /**
     * Time
     * @var string
     */
    private $time = null;

    /**
     * Property name
     * @var string $name Property name
     */
    public function setName($name) {
        $this->name = $name;
    }
    
    /**
     * Date format
     * @var string $format Date format
     */
    public function setFormat($format) {
        $this->format = $format;
    }
    
    /**
     * Time
     * @var string $time Time
     */
    public function setTime($time) {
        $this->time = $time;
    }


    /**
     * Main entry point.
     */
    public function main() {
        if ($this->name === null ) {
            throw new BuildException("Date property must have a property name specified");
        }
        if ($this->format === null ) {
            throw new BuildException("Format property must have a property name specified");
        }
        if ($this->time === null ) {
            $this->time = time();
        } else {
            $this->time = strtotime($this->time);
        }
        
        $this->project->setProperty($this->name, date($this->format, $this->time));

    }

}
?>