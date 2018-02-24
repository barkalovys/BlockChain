<?php

require_once 'vendor/autoload.php';

$service = new \Blockchain\Service\HashcashService();
$blockchain = new \Blockchain\Entity\Blockchain($service);
$blockchain
    ->addBlock(['test' => 123])
    ->addBlock(11)
    ->addBlock(444)
    ->addBlock('test2');

echo $blockchain->isValid() ? "Blockhain is valid!" : "Blockhain is invalid!";