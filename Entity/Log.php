<?php

namespace Devoralive\LogViewerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Log
 * @package Devoralive\LogViewerBundle\Entity
 */
class Log implements \JsonSerializable
{
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

    /**
     * Source of log (security, request, ...)
     * @var string
     */
    private $logSource;

    /**
     * @var string
     *
     */
    private $status;

    /**
     * @var string
     *
     */
    private $description;

    /**
     * @var string
     *
     */
    private $dateLog;

    /**
     * Set status
     *
     * @param string $status
     *
     * @return Log
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set dateLog
     *
     * @param \DateTime $dateLog
     *
     * @return Log
     */
    public function setDateLog($dateLog)
    {
        $this->dateLog = $dateLog->format('h:i:s d-m-Y');

        return $this;
    }

    /**
     * Get dateLog
     *
     * @return \DateTime
     */
    public function getDateLog()
    {
        return $this->dateLog;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Log
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set logSource
     *
     * @param string $logSource
     *
     * @return Log
     */
    public function setLogSource($logSource)
    {
        $this->logSource = $logSource;

        return $this;
    }

    /**
     * Get logSource
     *
     * @return string
     */
    public function getLogSource()
    {
        return $this->logSource;
    }
}
