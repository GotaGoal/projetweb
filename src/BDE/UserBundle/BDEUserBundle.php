<?php

namespace BDE\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BDEUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
