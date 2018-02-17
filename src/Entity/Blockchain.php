<?php

namespace Blockchain\Entity;

use Blockchain\Service\IBlockHashingService;

/**
 * Class Blockchain
 * @package Blockchain
 */
class Blockchain
{
    /**
     * @var array
     */
    protected $blocks = [];

    /**
     * @var IBlockHashingService
     */
    protected $service;

    /**
     * @param IBlockHashingService $service
     */
    public function __construct(IBlockHashingService $service)
    {
        $this->service = $service;
    }

    /**
     * @param mixed $data
     * @return $this
     */
    public function addBlock($data)
    {
        $lastBlock = $this->getLastBlock();
        $previousHash = $lastBlock instanceof Block ? $lastBlock->getHash() : null;
        array_push($this->blocks, $this->getService()->generateBlock($data, $previousHash));
        return $this;
    }

    /**
     * @return Block|false
     */
    public function getLastBlock()
    {
        if (!count($this->blocks)) {
            return false;
        }
        return $this->blocks[count($this->blocks) - 1];
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        for($i = 1; $i < count($this->blocks); ++$i) {
            if ($this->blocks[$i]->getPreviousHash() !== $this->blocks[$i-1]->getHash()) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return array
     */
    public function getBlocks(): array
    {
        return $this->blocks;
    }

    /**
     * @return IBlockHashingService
     */
    public function getService(): IBlockHashingService
    {
        return $this->service;
    }

}