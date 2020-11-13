<?php
// api/src/Entity/GraphMap.php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * The GraphMap is an explicit specification of the types of subjects, objects, and their relations .
 *
 * @ORM\Entity
 * @ApiResource(iri="http://example.org/GraphMap")
 */
class GraphMap
{
    /**
     * @var int The internal id of this GraphMap.
     * @Groups("expand")
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var string The type of subject as a URL.
     * @Groups("expand")
     * @ApiProperty(iri="http://example.org/subjectType")
     * @Assert\Url
     * @ORM\Column
     */
    public $subjectType;

    /**
     * @var string The predicate in the relation, as a URL
     * @Groups("expand")
     * @ApiProperty(iri="http://example.org/predicate")
     * @Assert\NotBlank
     * @Assert\Url
     * @ORM\Column
     */
    public $predicate;

    /**
     * @var string The type of object, as a URL
     * @Groups("expand")
     * @ApiProperty(iri="http://example.org/objectType")
     * @Assert\Url
     * @ORM\Column
     */
    public $objectType;

    /**
     * @var Dataset The Dataset this GraphMap refers to.
     *
     * @ApiProperty(iri="http://example.org/hasDataset")
     * @ORM\ManyToOne(targetEntity="Dataset", inversedBy="graphmaps")
     */
    public $dataset;

    public function getId(): ?int
    {
        return $this->id;
    }
}