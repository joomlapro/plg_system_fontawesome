<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Fontawesome
 * @copyright   Copyright (C) 2013 AtomTech, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/**
 * Joomla Fontawesome plugin.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.Fontawesome
 * @since       3.1
 */
class PlgSystemFontawesome extends JPlugin
{
	/**
	 * Method to catch the onAfterDispatch event.
	 *
	 * @return  boolean  True on success
	 *
	 * @since   3.1
	 */
	public function onAfterDispatch()
	{
		// Check that we are in the site application.
		if (JFactory::getApplication()->isAdmin())
		{
			return true;
		}

		if ($minified = $this->params->get('minified', 1))
		{
			JHtml::stylesheet('plg_system_fontawesome/font-awesome.min.css', false, true, false);
		}
		else
		{
			JHtml::stylesheet('plg_system_fontawesome/font-awesome.css', false, true, false);
		}

		// Get the browser object instance.
		$browser = JBrowser::getInstance();

		// Load any ie7 variation.
		if ($browser->getBrowser() == 'msie' && intval($browser->getMajor()) == 7)
		{
			if ($minified)
			{
				JHtml::stylesheet('plg_system_fontawesome/font-awesome-ie7.min.css', false, true, false);
			}
			else
			{
				JHtml::stylesheet('plg_system_fontawesome/font-awesome-ie7.css', false, true, false);
			}
		}

		return true;
	}
}
