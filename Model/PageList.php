<?php

namespace Mikielis\Cookie\Model;

use Magento\Cms\Model\ResourceModel\Page\CollectionFactory;
use Magento\Framework\Data\OptionSourceInterface;
use Mikielis\Cookie\Helper\CmsList;

class PageList implements OptionSourceInterface
{
    protected $pageCollectionFactory;
    protected $cmsList;

    public function __construct(CollectionFactory $pageCollectionFactory, CmsList $cmsList)
    {
        $this->pageCollectionFactory = $pageCollectionFactory;
        $this->cmsList = $cmsList;
    }

    /**
     * Returns list of pages
     * @return array
     */
    public function toOptionArray(): array
    {
        return $this->cmsList->get($this->pageCollectionFactory->create());
    }
}
