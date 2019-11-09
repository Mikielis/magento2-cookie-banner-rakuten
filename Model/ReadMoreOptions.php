<?php

namespace Mikielis\Cookie\Model;

class ReadMoreOptions implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        $options = [];

        $options[] = [
            'value' => 'openPage',
            'label' => __('Open page')
        ];

        $options[] = [
            'value' => 'theSamePage',
            'label' => __('Open pop-up')
        ];

        return $options;
    }
}
