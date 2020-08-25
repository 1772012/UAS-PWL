
<?php

/**
 * @author 1772012 - Kafka Febianto Agiharta
 */

class portfolio implements JsonSerializable
{
    private $name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFeUserId()
    {
        return $this->fe_user_id;
    }

    /**
     * @param mixed $fe_user_id
     */
    public function setFeUserId($fe_user_id)
    {
        $this->fe_user_id = $fe_user_id;
    }

    /**
     * @return mixed
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * @param mixed $level
     */
    public function setLevel($level)
    {
        $this->level = $level;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getParticipation()
    {
        return $this->participation;
    }

    /**
     * @param mixed $participation
     */
    public function setParticipation($participation)
    {
        $this->participation = $participation;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getCertificate()
    {
        return $this->certificate;
    }

    /**
     * @param mixed $certificate
     */
    public function setCertificate($certificate)
    {
        $this->certificate = $certificate;
    }
    private $fe_user_id;
    private $level;
    private $type;
    private $participation;
    private $description;
    private $certificate;

    public function jsonSerialize()
    {
        // TODO: Implement jsonSerialize() method.
        return get_object_vars($this);
    }
}