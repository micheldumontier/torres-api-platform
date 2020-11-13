<?php
// api/src/Entity/Dataset.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/*
dc	http://purl.org/dc/elements/1.1/
dcat	http://www.w3.org/ns/dcat#
dct	http://purl.org/dc/terms/
dctype	http://purl.org/dc/dcmitype/
foaf	http://xmlns.com/foaf/0.1/
locn	http://www.w3.org/ns/locn#
odrl	http://www.w3.org/ns/odrl/2/
owl	http://www.w3.org/2002/07/owl#
prov	http://www.w3.org/ns/prov#
rdf	http://www.w3.org/1999/02/22-rdf-syntax-ns#
rdfs	http://www.w3.org/2000/01/rdf-schema#
skos	http://www.w3.org/2004/02/skos/core#
time	http://www.w3.org/2006/time#
vcard	http://www.w3.org/2006/vcard/ns#
xsd	http://www.w3.org/2001/XMLSchema#
*/

/**
 * A Dataset.
 *
 * @ORM\Entity
 * @ApiResource(
 *  iri="http://www.w3.org/ns/dcat#Dataset",
 *  normalizationContext = {
 *      "groups" = {"expand"}
 *   },
 *  denormalizationContext = {
 *      "groups" = {"expand"}
 *   }
 * )
 */
class Dataset
{
    /**
     * @var int The internal identifier for this dataset.
     * @Groups("expand")
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The user assigned identifier for this dataset.
     * @Groups("expand")
     * @ApiProperty(iri="http://purl.org/dc/terms/identifier")
     * @ORM\Column
     * 
     */
    public $identifier;

    /**
     * @var string The title of this dataset.
     * @Groups("expand")
     * @ApiProperty(iri="http://purl.org/dc/terms/title")
     * @Assert\NotBlank
     * @ORM\Column 
     */
    public $title;

    /**
     * @var string The description of this datast.
     * @Groups("expand")
     * @ApiProperty(iri="http://purl.org/dc/terms/description")
     * @ORM\Column(type="text")
     */
    public $description;

    /**
     * @var string The publisher IRI/URL of this dataset.
     * @Groups("expand")
     * @ApiProperty(iri="http://purl.org/dc/terms/publisher")
     * @Assert\Url
     * @Assert\NotBlank
     * @ORM\Column
     */
    public $publisher;

    /**
     * @var string The name of the publisher
     * @Groups("expand")
     * @ApiProperty(iri="http://example.org/terms/publisher_name")
     * @ORM\Column
     */
    public $publisher_name;

    /**
     * @var string The license for this dataset.
     * @Groups("expand")
     * @ApiProperty(iri="http://purl.org/dc/terms/license")
     * @Assert\Url
     * @Assert\NotBlank
     * @ORM\Column
     */
    public $license;

    /**
     * @var \DateTimeInterface The date of publication for this dataset.
     * @Groups("expand")
     * @ApiProperty(iri="http://purl.org/dc/terms/issued")
     * @ORM\Column(type="datetime")
     */
    public $publicationDate;



    /**
     * @var GraphMap[] Available dataservices for this dataset.
     * @Groups("expand")
     * @ApiProperty(iri="http://example.org/hasGraphMap")
     * @ORM\OneToMany(targetEntity="GraphMap", mappedBy="dataset", cascade={"persist", "remove"})
     */
    public $graphmaps;

    /**
     * @var DataService[] Available dataservices for this dataset.
     * @Groups("expand")
     * @ApiProperty(iri="http://www.w3.org/ns/dcat#isServedBy")
     * @ORM\OneToMany(targetEntity="DataService", mappedBy="dataset", cascade={"persist", "remove"})
     */
    public $dataservices;
    
    public function __construct()
    {
        $this->graphmaps = new ArrayCollection();
        $this->dataservices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function addDataService(DataService $dataservice): void
    {
        $dataservice->dataset = $this;
        $this->dataservices->add($dataservice);
    }

    public function removeDataService(DataService $dataservice): void
    {
        $dataservice->dataset = null;
        $this->dataservices->removeElement($dataservice);
    }

    public function addGraphMap(GraphMap $graphmap): void
    {
        $graphmap->dataset = $this;
        $this->graphmaps->add($graphmap);
    }

    public function removeGraphMap(GraphMap $graphmap): void
    {
        $graphmap->dataset = null;
        $this->graphmaps->removeElement($graphmap);
    }

}
