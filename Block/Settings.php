<?php

namespace Mikielis\Cookie\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Theme\Block\Html\Header\Logo;
use Mikielis\Cookie\Helper\Data;

class Settings extends Template
{
    protected $dataHelper;

    protected $storeManager;

    protected $logo;

    protected $cookieName = 'mikielis_cookie';

    /**
     * Cookie constructor.
     * @param Context $context
     * @param Data $dataHelper
     * @param Logo $logo
     * @param array $data
     */
    public function __construct(Context $context, Data $dataHelper, Logo $logo, array $data)
    {
        $this->dataHelper = $dataHelper;
        $this->storeManager = $context->getStoreManager();
        $this->logo = $logo;
        parent::__construct($context, $data);
    }

    /**
     * @return $this
     */
    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

    /**
     * Module activation
     * @return boolean
     */
    public function isModuleActive()
    {
        return (boolean) $this->dataHelper->getConfig('mikielis_cookie/functional/enable');
    }

    /**
     * Get position
     * @return mixed
     */
    public function getPosition()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/design/position');
    }

    /**
     * Get message
     * @return string
     */
    public function getMessage()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/content/message');
    }

    /**
     * Check whether the "read more" button is enabled
     * @return boolean
     */
    public function isReadMoreEnabled()
    {
        return (bool) $this->dataHelper->getConfig('mikielis_cookie/functional/read_more_button/enable');
    }

    public function getReadMoreBehaviour()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/functional/read_more_button/behaviour');
    }

    /**
     * Get text of read more button
     * @return string
     */
    public function getReadMoreButtonText()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/content/read_more_text');
    }

    /**
     * Get URL of webpage that should be linked by "read more" button
     * @return string
     */
    public function getReadMoreButtonPage()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/functional/read_more_button/page');
    }

    public function getReadMoreBlock()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/functional/read_more_button/block');
    }

    /**
     * Get text of read more button
     * @return string
     */
    public function getAcceptButtonText()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/content/approve_text');
    }

    /**
     * Get button's font colour
     * @param $button
     * @param null/string $state
     * @return mixed
     */
    public function getButtonColor($button, $state = null)
    {
        if ($button == 'read_more') {
            if ($state == 'hover') {
                return $this->dataHelper->getConfig('mikielis_cookie/design/read_more_button/hover_color');
            }

            return $this->dataHelper->getConfig('mikielis_cookie/design/read_more_button/color');
        } elseif ($button == 'approve') {
            if ($state == 'hover') {
                return $this->dataHelper->getConfig('mikielis_cookie/design/approve_button/hover_color');
            }

            return $this->dataHelper->getConfig('mikielis_cookie/design/approve_button/color');
        }
    }

    /**
     * Get button's background
     * @param $button
     * @param null/string $state
     * @return string
     */
    public function getButtonBackground($button, $state = null)
    {
        if ($button == 'read_more') {
            if ($state == 'hover') {
                return $this->dataHelper->getConfig('mikielis_cookie/design/read_more_button/hover_background');
            }

            return $this->dataHelper->getConfig('mikielis_cookie/design/read_more_button/background');
        } elseif ($button == 'approve') {
            if ($state == 'hover') {
                return $this->dataHelper->getConfig('mikielis_cookie/design/approve_button/hover_background');
            }

            return $this->dataHelper->getConfig('mikielis_cookie/design/approve_button/background');
        }
    }

    /**
     * Get button's border colour
     * @param $button
     * @return string
     */
    public function getButtonBorderColor($button)
    {
        if ($button == 'read_more') {
            return $this->dataHelper->getConfig('mikielis_cookie/design/read_more_button/border_color');
        } elseif ($button == 'approve') {
            return $this->dataHelper->getConfig('mikielis_cookie/design/approve_button/border_color');
        }
    }

    /**
     * Get button's border size
     * @param $button
     * @return string
     */
    public function getButtonBorderSize($button)
    {
        if ($button == 'read_more') {
            return $this->dataHelper->getConfig('mikielis_cookie/design/read_more_button/border_size');
        } elseif ($button == 'approve') {
            return $this->dataHelper->getConfig('mikielis_cookie/design/approve_button/border_size');
        }
    }

    /**
     * Get cookie lifetime
     * @return int
     */
    public function getLifeTime()
    {
        return (int) $this->dataHelper->getConfig('mikielis_cookie/functional/lifetime');
    }

    /**
     * Get cookie name
     * @return string
     */
    public function getCookieName()
    {
        return $this->cookieName;
    }

    /**
     * Get page URL that explain cookies policy
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getReadMoreUrl()
    {
        $url = $this->storeManager->getStore()->getBaseUrl() . $this->dataHelper->getConfig('mikielis_cookie/content/read_more_link');
        return $url;
    }

    /**
     * Get info whether close button is enabled or disabled
     * @return boolean
     */
    public function isCloseButtonEnabled()
    {
        return (bool) $this->dataHelper->getConfig('mikielis_cookie/functional/close_button/enable_close_button');
    }

    /**
     * Get expected behavrious of close button (once it's clicked)
     * @return string
     */
    public function getCloseButtonBehaviour()
    {
        return $this->dataHelper->getConfig('mikielis_cookie/functional/close_button/close_button_behaviour');
    }

    /**
     * Get logo but only when it can be displayed
     * @return bool/array false when logo shouldn't be displayed, or array with logo details when it should be displayed
     */
    public function getLogo()
    {
        if ((bool) $this->dataHelper->getConfig('mikielis_cookie/design/logo/display') === true) {
            $logo = [
                'src' => $this->logo->getLogoSrc(),
                'alt' => $this->logo->getLogoAlt(),
                'width' => $this->logo->getLogoWidth(),
                'height' => $this->logo->getLogoHeight()
            ];

            return $logo;
        }

        return false;
    }
}
