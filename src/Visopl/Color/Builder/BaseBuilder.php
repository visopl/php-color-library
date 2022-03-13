<?php 
namespace Visopl\Color\Builder;

use Visopl\Color\Mapper\MapperInterface;

abstract class BaseBuilder implements BuilderInterface 
{
    protected MapperInterface $mapper; 

    public function __construct(MapperInterface $mapper)
    {
        $this->mapper = $mapper; 
    }
}