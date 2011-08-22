<?php

/**
 * ApiGen - API Generator.
 *
 * Copyright (c) 2010 David Grudl (http://davidgrudl.com)
 * Copyright (c) 2011 Ondřej Nešpor (http://andrewsville.cz)
 * Copyright (c) 2011 Jaroslav Hanslík (http://kukulich.cz)
 *
 * This source file is subject to the "Nette license", and/or
 * GPL license. For more information please see http://nette.org
 */

namespace ApiGen\Plugin;

use ApiGen;

/**
 * Base plugin interface.
 *
 * All plugins have to implement the same constructor that accepts a template
 * and configuration instance.
 *
 * Do not implement this interface directly, use one of its subclasses instead.
 *
 * @author Ondřej Nešpor
 * @author Jaroslav Hanslík
 */
interface Base
{
	/**
	 * Plugin constructor.
	 *
	 * @param \ApiGen\Generator $generator Generator instance
	 * @param \ApiGen\Template $template Template instance
	 * @param \ApiGen\Config $config Configuration
	 */
	public function __construct(ApiGen\Generator $generator, ApiGen\Template $template, ApiGen\Config $config);
}
