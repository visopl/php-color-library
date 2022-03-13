<?php 
namespace Visopl\Color\Normalizer; 

interface NormalizerInterface 
{
    public function normalize(string $syntax, array $parameters): string;
}