<?php

namespace Linkorb\LibCloud\Compute;

class ComputeFactory
{
    /**
     * @param string $type provider name
     * @param string $accessToken api token
     * @return \Linkorb\LibCloud\Compute\ComputeInterface
     * @throws \Exception
     */
    public static function getProvider($type, $accessToken)
    {
        try {
            $namePart = implode(array_map('ucfirst', explode('_', $type)));
            $className = 'Linkorb\LibCloud\Compute\Providers\\'.$namePart.'\\'.$namePart.'Provider';
            return new $className($accessToken);
        }
        catch (\Exception $e) {
            throw new \Exception(sprintf(
                "Class for '%s' not found",
                $type
            ));
        }
    }
}
