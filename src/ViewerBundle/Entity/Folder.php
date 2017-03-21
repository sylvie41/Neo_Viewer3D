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
    /**
     * @var string
     */
    private $path3;

    /**
     * @var string
     */
    private $path4;


    /**
     * Set path3
     *
     * @param string $path3
     *
     * @return Folder
     */
    public function setPath3($path3)
    {
        $this->path3 = $path3;

        return $this;
    }

    /**
     * Get path3
     *
     * @return string
     */
    public function getPath3()
    {
        return $this->path3;
    }

    /**
     * Set path4
     *
     * @param string $path4
     *
     * @return Folder
     */
    public function setPath4($path4)
    {
        $this->path4 = $path4;

        return $this;
    }

    /**
     * Get path4
     *
     * @return string
     */
    public function getPath4()
    {
        return $this->path4;
    }
    /**
     * @var string
     */
    private $md5;


    /**
     * Set md5
     *
     * @param string $md5
     *
     * @return Folder
     */
    public function setMd5($md5)
    {
        $this->md5 = $md5;

        return $this;
    }

    /**
     * Get md5
     *
     * @return string
     */
    public function getMd5()
    {
        return $this->md5;
    }
    /**
     * @var string
     */
    private $mallocmandObj;
    /**
     * @var string
     */
    private $mallocmaxObj;



    /**
     * @var string
     */
    private $mallocmandMtl;

    /**
     * @var string
     */
    private $mallocmaxMtl;



    /**
     * @var string
     */
    private $setupmandObj;

    /**
     * @var string
     */
    private $setupmaxObj;


    /**
     * @var string
     */
    private $setupmandMtl;

    /**
     * @var string
     */
    private $setupmaxMtl;



    /**
     * @var integer
     */
    private $nbGtS;

    /**
     * @var integer
     */
    private $nbGtI;

    /**
     * @var integer
     */
    private $estimationTraitement;


    /**
     * Set mallocmandObj
     *
     * @param string $mallocmandObj
     *
     * @return Folder
     */
    public function setMallocmandObj($mallocmandObj)
    {
        $this->mallocmandObj = $mallocmandObj;

        return $this;
    }

    /**
     * Get mallocmandObj
     *
     * @return string
     */
    public function getMallocmandObj()
    {
        return $this->mallocmandObj;
    }

    /**
     * Set mallocmaxObj
     *
     * @param string $mallocmaxObj
     *
     * @return Folder
     */
    public function setMallocmaxObj($mallocmaxObj)
    {
        $this->mallocmaxObj = $mallocmaxObj;

        return $this;
    }

    /**
     * Get mallocmaxObj
     *
     * @return string
     */
    public function getMallocmaxObj()
    {
        return $this->mallocmaxObj;
    }

    /**
     * Set mallocmandMtl
     *
     * @param string $mallocmandMtl
     *
     * @return Folder
     */
    public function setMallocmandMtl($mallocmandMtl)
    {
        $this->mallocmandMtl = $mallocmandMtl;

        return $this;
    }

    /**
     * Get mallocmandMtl
     *
     * @return string
     */
    public function getMallocmandMtl()
    {
        return $this->mallocmandMtl;
    }


    /**
     * Set mallocmaxMtl
     *
     * @param string $mallocmaxMtl
     *
     * @return Folder
     */
    public function setMallocmaxMtl($mallocmaxMtl)
    {
        $this->mallocmaxMtl = $mallocmaxMtl;

        return $this;
    }

    /**
     * Get mallocmaxMtl
     *
     * @return string
     */
    public function getMallocmaxMtl()
    {
        return $this->mallocmaxMtl;
    }


    /**
     * Set setupmandObj
     *
     * @param string $setupmandObj
     *
     * @return Folder
     */
    public function setSetupmandObj($setupmandObj)
    {
        $this->setupmandObj = $setupmandObj;

        return $this;
    }

    /**
     * Get setupmandObj
     *
     * @return string
     */
    public function getSetupmandObj()
    {
        return $this->setupmandObj;
    }

    /**
     * Set setupmaxObj
     *
     * @param string $setupmaxObj
     *
     * @return Folder
     */
    public function setSetupmaxObj($setupmaxObj)
    {
        $this->setupmaxObj = $setupmaxObj;

        return $this;
    }

    /**
     * Get setupmaxObj
     *
     * @return string
     */
    public function getSetupmaxObj()
    {
        return $this->setupmaxObj;
    }

    /**
     * Set setupmandMtl
     *
     * @param string $setupmandMtl
     *
     * @return Folder
     */
    public function setSetupmandMtl($setupmandMtl)
    {
        $this->setupmandMtl = $setupmandMtl;

        return $this;
    }

    /**
     * Get setupmandMtl
     *
     * @return string
     */
    public function getSetupmandMtl()
    {
        return $this->setupmandMtl;
    }

    /**
     * Set setupmaxMtl
     *
     * @param string $setupmaxMtl
     *
     * @return Folder
     */
    public function setSetupmaxMtl($setupmaxMtl)
    {
        $this->setupmaxMtl = $setupmaxMtl;

        return $this;
    }

    /**
     * Get setupmaxMtl
     *
     * @return string
     */
    public function getSetupmaxMtl()
    {
        return $this->setupmaxMtl;
    }

    /**
     * Set nbGtS
     *
     * @param integer $nbGtS
     *
     * @return Folder
     */
    public function setNbGtS($nbGtS)
    {
        $this->nbGtS = $nbGtS;

        return $this;
    }

    /**
     * Get nbGtS
     *
     * @return integer
     */
    public function getNbGtS()
    {
        return $this->nbGtS;
    }

    /**
     * Set nbGtI
     *
     * @param integer $nbGtI
     *
     * @return Folder
     */
    public function setNbGtI($nbGtI)
    {
        $this->nbGtI = $nbGtI;

        return $this;
    }

    /**
     * Get nbGtI
     *
     * @return integer
     */
    public function getNbGtI()
    {
        return $this->nbGtI;
    }

    /**
     * Set estimationTraitement
     *
     * @param integer $estimationTraitement
     *
     * @return Folder
     */
    public function setEstimationTraitement($estimationTraitement)
    {
        $this->estimationTraitement = $estimationTraitement;

        return $this;
    }

    /**
     * Get estimationTraitement
     *
     * @return integer
     */
    public function getEstimationTraitement()
    {
        return $this->estimationTraitement;
    }
    /**
     * @var boolean
     */
    private $accepted;


    /**
     * Set accepted
     *
     * @param boolean $accepted
     *
     * @return Folder
     */
    public function setAccepted($accepted)
    {
        $this->accepted = $accepted;

        return $this;
    }

    /**
     * Get accepted
     *
     * @return boolean
     */
    public function getAccepted()
    {
        return $this->accepted;
    }
}
