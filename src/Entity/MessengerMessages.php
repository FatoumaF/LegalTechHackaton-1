<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessengerMessages
 *
 * @ORM\Table(name="messenger_messages", indexes={@ORM\Index(name="idx_75ea56e016ba31db", columns={"delivered_at"}), @ORM\Index(name="idx_75ea56e0e3bd61ce", columns={"available_at"}), @ORM\Index(name="idx_75ea56e0fb7336f0", columns={"queue_name"})})
 * @ORM\Entity
 */
class MessengerMessages
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=false)
     */
    private $body;

    /**
     * @var string
     *
     * @ORM\Column(name="headers", type="text", nullable=false)
     */
    private $headers;

    /**
     * @var string
     *
     * @ORM\Column(name="queue_name", type="string", length=190, nullable=false)
     */
    private $queueName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="available_at", type="datetime", nullable=false)
     */
    private $availableAt;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="delivered_at", type="datetime", nullable=true)
     */
    private $deliveredAt;


}
