<?php

namespace Mikielis\Cookie\Helper;

use Magento\Cms\Model\GetBlockByIdentifier;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Store\Model\StoreManagerInterface;

class Block extends AbstractHelper
{
    /**
     * @var GetBlockByIdentifier
     */
    protected $getBlockByIdentifier;

    /**
     * @var StoreManagerInterface
     */
    protected $storeManager;

    public function __construct(
        Context $context,
        GetBlockByIdentifier $getBlockByIdentifier,
        StoreManagerInterface $storeManager
    ) {
        $this->getBlockByIdentifier = $getBlockByIdentifier;
        $this->storeManager = $storeManager;
        parent::__construct($context);
    }

    /**
     * @param $identifier block identifier
     * @return mixed
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getStaticBlock($identifier)
    {
        $content = $this->getBlockByIdentifier->execute($identifier, $this->storeManager->getStore()->getId())->getContent();
        return $content;
    }
}
