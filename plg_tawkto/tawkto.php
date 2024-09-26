<?php
/*------------------------------------------------------------------------
# plg_tawkto - tawk.to
# ------------------------------------------------------------------------
# version 4.0.0
# author tawk.to
# @license - https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
# Websites: https://tawk.to
# Technical Support: https://tawk.to
-------------------------------------------------------------------------*/

defined('_JEXEC') or die;

use Joomla\CMS\Plugin\CMSPlugin;
use Joomla\Event\Event;
use Joomla\Event\SubscriberInterface;
use Joomla\CMS\Factory;

class PlgSystemTawkto extends CMSPlugin implements SubscriberInterface
{
    /**
     * Load the language file on instantiation
     *
     * @var    boolean
     */
    protected $autoloadLanguage = true;

    /**
     * Returns an array of events this subscriber will listen to.
     *
     * @return  array
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onBeforeCompileHead' => 'showWidget',
        ];
    }

    /**
     * Add tawk.to script to the page
     *
     * @param   Event  $event  The event object
     *
     * @return  void
     */
    public function showWidget()
    {
        $app = Factory::getApplication();

        if ($app->isClient('administrator')) {
            return;
        }

        $tawkto_siteid = $this->params->get('tawkto_siteid', '');
        $tawkto_widget = strtolower($this->params->get('tawkto_widget', ''));

        if (empty($tawkto_siteid)) {
            return;
        }

        $wa = $app->getDocument()->getWebAssetManager();
        $wa->addInlineScript(
            'var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();' .
            '(function(){' .
            'var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];' .
            's1.async=true;' .
            's1.src="https://embed.tawk.to/' . $tawkto_siteid . '/' . $tawkto_widget . '";' .
            's1.charset="UTF-8";' .
            's1.setAttribute("crossorigin","*");' .
            's0.parentNode.insertBefore(s1,s0);' .
            '})();',
            [],
            ['defer' => true]
        );
    }
}
