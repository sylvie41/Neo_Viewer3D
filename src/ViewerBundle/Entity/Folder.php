<?php

namespace ViewerBundle\Entity;

/**
 * Folder
 */
class Folder
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $ref;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $path1;

    /**
     * @var string
     */
    private $path2;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set ref
     *
     * @param string $ref
     *
     * @return Folder
     */
    public function setRef($ref)
    {
        $this->ref = $ref;

        return $this;
    }

    /**
     * Get ref
     *
     * @return string
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Folder
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set path1
     *
     * @param string $path1
     *
     * @return Folder
     */
    public function setPath1($path1)
    {
        $this->path1 = $path1;

        return $this;
    }

    /**
     * Get path1
     *
     * @return string
     */
    public function getPath1()
    {
        return $this->path1;
    }

    /**
     * Set path2
     *
     * @param string $path2
     *
     * @return Folder
     */
    public function setPath2($path2)
    {
        $this->path2 = $path2;

        return $this;
    }

    /**
     * Get path2
     *
     * @return string
     */
    public function getPath2()
    {
        return $this->path2;
    }
}