<?php 
namespace Visopl\Color\Factory; 

interface FactoryInterface 
{
    public function create(string $name, null|string|array $data = null): string; 
}