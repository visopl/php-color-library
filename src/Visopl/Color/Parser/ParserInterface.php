<?php 
namespace Visopl\Color\Parser;

use Visopl\Color\Mapper\MapperInterface;

interface ParserInterface 
{
    public function parse(): MapperInterface; 
}