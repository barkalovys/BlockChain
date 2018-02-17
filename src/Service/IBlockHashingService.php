<?php

namespace Blockchain\Service;

use Blockchain\Entity\Block;

/**
 * Interface IBlockHashingService
 * @package Blockchain
 */
interface IBlockHashingService
{
    /**
     * @param mixed $data
     * @param string $previousHash
     * @return Block
     */
    public function generateBlock($data, $previousHash = null): Block;
}