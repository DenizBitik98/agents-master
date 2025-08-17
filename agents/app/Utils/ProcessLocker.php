<?php


namespace App\Utils;

use \Exception;

class ProcessLocker
{
    private $name;
    private $lockFile;
    private $gotLock;
    private $wouldBlock;

    function __construct($name)
    {
        $this->name = $name;

        $this->lockFile = fopen(storage_path('locks/'.$this->name.'.pid'), 'c');

        if ($this->lockFile === false) {
            throw new Exception("Unable to open the file.");
        }

        $this->gotLock = flock($this->lockFile, LOCK_EX | LOCK_NB, $this->wouldBlock);
    }

    function __destruct()
    {
        $this->unlockProcess();
    }

    public function isLocked()
    {
        if (!$this->gotLock && $this->wouldBlock) {
            return true;
        }

        return false;
    }

    public function lockProcess()
    {
        if (!$this->gotLock && !$this->wouldBlock) {
            throw new Exception("Unable to lock the file.");
        }

        ftruncate($this->lockFile, 0);
        fwrite($this->lockFile, getmypid() . "\n");
    }

    public function unlockProcess()
    {
        ftruncate($this->lockFile, 0);
        flock($this->lockFile, LOCK_UN);
    }
}
