<?php

namespace Blockchain\Service;

use Blockchain\Entity\Block;

/**
 * Class HashcashService
 * @package Blockchain
 */
class HashcashService implements IBlockHashingService
{
    const INITIAL_HASH = '0000000000000000000000000000000000000000000000000000000000000000';

    const DEFAULT_DIFFICULTY = 3;

    /**
     * @var int
     */
    protected $difficulty = self::DEFAULT_DIFFICULTY;

    /**
     * @param mixed $data
     * @param string $previousHash
     * @return Block
     */
    public function generateBlock($data, $previousHash = null): Block
    {
        if (is_null($previousHash)) {
            $previousHash = self::INITIAL_HASH;
        }

        $timestamp = time();
        $difficulty = $this->getDifficulty();
        $nonce = 0;
        do {
            $nonce++;
            $hash = hash('sha256', $previousHash . $timestamp . json_encode($data) . $nonce);
        } while(substr($hash, 0, $difficulty) !== str_repeat('0', $difficulty));

        return new Block($hash, $previousHash, $timestamp, json_encode($data), $nonce);
    }


    /**
     * @return int
     */
    public function getDifficulty()
    {
        return $this->difficulty;
    }

    /**
     * @param int $difficulty
     */
    public function setDifficulty($difficulty)
    {
        $this->difficulty = $difficulty;
    }

}