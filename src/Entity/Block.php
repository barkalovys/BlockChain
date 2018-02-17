<?php

namespace Blockchain\Entity;

/**
 * Class Block
 * @package Blockchain
 */
class Block
{
    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $previousHash;

    /**
     * @var int
     */
    private $timestamp;

    /**
     * @var string
     */
    private $data;

    /**
     * @var int
     */
    private $nonce;

    /**
     * @param string $hash
     * @param string $previousHash
     * @param int $timestamp
     * @param string $data
     * @param int $nonce
     */
    public function __construct(string $hash, string $previousHash, int $timestamp, string $data, int $nonce)
    {
        $this->hash = $hash;
        $this->previousHash = $previousHash;
        $this->timestamp = $timestamp;
        $this->data = $data;
        $this->nonce = $nonce;
    }

    /**
     * @return string
     */
    public function getHash(): string
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getPreviousHash(): string
    {
        return $this->previousHash;
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getData(): string
    {
        return $this->data;
    }

    /**
     * @return int
     */
    public function getNonce(): int
    {
        return $this->nonce;
    }
}