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
 * Annotation processor.
 *
 * Allows custom processing of particular annotation tags.
 *
 * @author Ondřej Nešpor
 * @author Jaroslav Hanslík
 */
interface AnnotationProcessor extends Base
{
	/**#@+
	 * Inline tag with no children, {@link} for example.
	 *
	 * @var integer
	 */
	const TYPE_INLINE_SIMPLE = 1;

	/**
	 * Inline tag that can contain another inline tags, {@internal} for example.
	 */
	const TYPE_INLINE_WITH_CHILDREN = 2;

	/**
	 * Block tag, @copyright for example.
	 */
	const TYPE_BLOCK = 4;
	/**#@-*/

	/**
	 * Returns a list of tags being processed by this plugin.
	 *
	 * Please note that there can be only one plugin for each tag and defining
	 * multiple plugins for a single tag will result in the latest one being used.
	 *
	 * The function has to return an array where keys are tag names and values
	 * are definitions (tag types or-ed together).
	 *
	 * This way you can specify multiple tag types (to process a block and inline
	 * tag of the same name) to be processed by a plugin.
	 *
	 * @return array
	 */
	public function getProcessedTags();

	/**
	 * Processes a tag name.
	 *
	 * This function can alter the block tag name that will be displayed
	 * in the documentation.
	 *
	 * If the function returns an empty string, the tag will be skipped.
	 *
	 * @param string $tag Tag name
	 * @param integer $type Tag type
	 * @param \ApiGen\ReflectionBase $element Documented reflection element
	 * @return string|null
	 */
	public function getTagName($tag, $type, ApiGen\ReflectionBase $element);

	/**
	 * Processes a tag value.
	 *
	 * Retrieves the tag value (if any) and returns its processed form.
	 *
	 * @param string $tag Tag name
	 * @param integer $type Tag type
	 * @param string $value Tag value
	 * @param \ApiGen\ReflectionBase $element Documented reflection element
	 * @return string
	 */
	public function getTagValue($tag, $type, $value, ApiGen\ReflectionBase $element);
}
