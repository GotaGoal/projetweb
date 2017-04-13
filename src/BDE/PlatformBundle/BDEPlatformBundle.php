<?php

namespace BDE\PlatformBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BDEPlatformBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
