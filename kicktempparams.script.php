<?php
/**
 * @version 1.0.0
 * @package Kicktempparams
 * @copyright 2014 Niels Nübel- NN-Medienagentur
 * @license GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link http://www.nn-medienagentur.de
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');


/**
 * Class PlgSystemKicktempparamsInstallerScript
 *
 * @category Kicktempparams
 * @package Kicktempparams
 * @author Niels Nübel <n.nuebel@nn-medienagentur.de>
 * @license GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link http://www.nn-medienagentur.de
 * @since 1.0.0
 */
class PlgSystemKicktempparamsInstallerScript
{
    /**
     * Called before any type of action
     *
     * @param  string  $type  type of current action
     *
     * @return  boolean  True on success
     */
    public function preflight($type)
    {
        // make version check only when installing the plugin
        if ($type != "discover_install" && $type != "install")
        {
            return true;
        }

        $version = new JVersion;

        // Abort if the current Joomla release is older
        if (version_compare($version->getShortVersion(), "3", 'lt'))
        {
            Jerror::raiseWarning(null, 'Cannot install Kicktempparams in a Joomla release prior to 3');

            return false;
        }

        return true;
    }
}