<?php

namespace Mikielis\Cookie\Model;

use Magento\Cms\Model\ResourceModel\Block\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;
use Mikielis\Cookie\Helper\CmsList;

class BlockList implements OptionSourceInterface
{
    protected $blockCollectionFactory;
    protected $cmsList;

    public function __construct(CollectionFactory $blockCollectionFactory, CmsList $cmsList)
    {
        $this->blockCollectionFactory = $blockCollectionFactory;
        $this->cmsList = $cmsList;
    }

    /**
     * Returns list of pages
     * @return array
     */
    public function toOptionArray(): array
    {
        return $this->cmsList->get($this->blockCollectionFactory->create());
    }
}
