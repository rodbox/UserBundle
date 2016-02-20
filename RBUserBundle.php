<?php

namespace RB\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class RBUserBundle extends Bundle
{
	public function getParent()
	{
		return 'FOSUserBundle';
	}
}
