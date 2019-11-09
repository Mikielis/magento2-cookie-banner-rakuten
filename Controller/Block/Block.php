<?php

namespace Mikielis\Cookie\Controller\Block;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Mikielis\Cookie\Helper\Block as BlockHelper;

class Block extends Action
{
    /**
     * @var JsonFactory
     */
    protected $resultJsonFactory;

    /**
     * @var BlockHelper
     */
    protected $blockHelper;

    public function __construct(
        Context $context,
        JsonFactory $jsonFactory,
        BlockHelper $blockHelper
    ) {
        $this->resultJsonFactory = $jsonFactory;
        $this->blockHelper = $blockHelper;
        parent::__construct($context);
    }

    /**
     * Execute action based on request and return result
     *
     * Note: Request will be added as operation argument in future
     *
     * @return \Magento\Framework\Controller\ResultInterface|ResponseInterface
     * @throws \Magento\Framework\Exception\NotFoundException
     */
    public function execute()
    {
        $result = $this->resultJsonFactory->create();
        return $result->setData([
            'block' => $this->blockHelper->getStaticBlock($this->getRequest()->getPostValue('block'))
        ]);
    }
}