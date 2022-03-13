<?php 
namespace Visopl\Color\Normalizer; 

class FormatNormalizer implements NormalizerInterface 
{
    public function normalize(string $syntax, array $parameters): string 
    {
        foreach ($parameters as $key => $value) {
            $syntax = str_replace('{'.$key.'}', $value, $syntax);
        }

        return $syntax;
    }
}