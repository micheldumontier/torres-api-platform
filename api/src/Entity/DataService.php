<?php
// api/src/Entity/DataService.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * A DataService of a Dataset.
 *
 * @ORM\Entity
 * @ApiResource(iri="http://www.w3.org/ns/dcat#DataService")
 */
class DataService
{
    /**
     * @var int The id of this DataService.
     *
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The name of the DataService.
     *
     * @ApiProperty(iri="http://purl.org/dc/terms/title")
     * @ORM\Column
     * @Assert\NotBlank
     */
    public $name;

    /**
     * @var string The description of the DataService.
     *
     * @ApiProperty(iri="http://www.w3.org/ns/dcat#endpointDescription")
     * @Assert\NotBlank
     * @ORM\Column
     */
    public $description;

    /**
     * @var string The URL of this DataService
     *
     * @ApiProperty(iri="http://www.w3.org/ns/dcat#endpointURL")
     * @Assert\Url
     * @Assert\NotBlank
     * @ORM\Column
     */
    public $url;

    /**
     * @var string The type of service that this DataService provides (e.g. sparql, graphql, api)
     *
     * @ApiProperty(iri="http://example.org/serviceType")
     * @ORM\Column
     */
    public $serviceType;

    /**
     * @var string The standard that this DataService conforms to
     *
     * @ApiProperty(iri="http://purl.org/dc/terms/#conformsTo")
     * @Assert\Url
     * @ORM\Column
     */
    public $conformsTo;

    /**
     * @var string The publisher of this dataset.
     *
     * @ApiProperty(iri="http://purl.org/dc/terms/publisher")
     * @Assert\Url
     * @ORM\Column
     */
    public $publisher;

    /**
     * @var Dataset The Dataset this DataService is about.
     *
     * @ApiProperty(iri="http://www.w3.org/ns/dcat#servesDataset")
     * @ORM\ManyToOne(targetEntity="Dataset", inversedBy="dataservices")
     */
    public $dataset;

    public function getId(): ?int
    {
        return $this->id;
    }
}