<?php

namespace BDE\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LikePhoto
 *
 * @ORM\Table(name="like_photo")
 * @ORM\Entity(repositoryClass="BDE\PlatformBundle\Repository\LikePhotoRepository")
 */
class LikePhoto
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
