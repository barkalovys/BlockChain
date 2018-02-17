<?php

define('APP_NAME', 'Blockchain');

/**
 * @param string $className
 */
function __autoload(string $className)
{
    $parts = explode('\\', $className);
    if (isset($parts[0]) && $parts[0] === APP_NAME) {
        $includePath = 'src';
        array_shift($parts);
        foreach ($parts as $part) {
            $includePath .= DIRECTORY_SEPARATOR . $part;
        }
        require_once $includePath . '.php';
    }
}

$service = new \Blockchain\Service\HashcashService();
$blockchain = new \Blockchain\Entity\Blockchain($service);
$blockchain
    ->addBlock(['test' => 123])
    ->addBlock(11)
    ->addBlock(444)
    ->addBlock('test2');

echo $blockchain->isValid() ? "Blockhain is valid!" : "Blockhain is invalid!";