<?php

namespace App\Data;

class SearchData
{
    /**
     * @var string
     */
    public $q = '';

    /**
     * @var elementBase[]
     */
    public $elementBases = [];

    /**
     * @var elementPhyto[]
     */
    public $elementPhytos = [];

    /**
     * @var elementSabbat[]
     */
    public $elementSabbats = [];

    /**
     * @var null|integer
     */
    public $min;

    /**
     * @var null|integer
     */
    public $max;

    /**
     * @var booleen
     */
    public $promo = false;

    /**
     * @var integer
     */
    public $page = 1;

    /**
     * @var typeRecueil[]
     */
    public $typeRecueil = [];

    /**
     * @var recetteType[]
     */
    public $typeRecette = [];

    /**
     * @var type[]
     */
    public $type = [];
}
