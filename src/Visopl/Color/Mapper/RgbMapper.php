<?php 
namespace Visopl\Color\Mapper;

use Visopl\Color\Mapper\Trait\AlphaAttributeTrait;
use Visopl\Color\Mapper\Trait\RgbAttributesTrait;

class RgbMapper extends BaseMapper 
{
    use RgbAttributesTrait, AlphaAttributeTrait; 
}