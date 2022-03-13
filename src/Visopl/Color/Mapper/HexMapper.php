<?php 
namespace Visopl\Color\Mapper;

use Visopl\Color\Mapper\Trait\AlphaAttributeTrait;
use Visopl\Color\Mapper\Trait\RgbAttributesTrait;

class HexMapper extends BaseMapper 
{
    use RgbAttributesTrait, AlphaAttributeTrait; 
}