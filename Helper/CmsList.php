<?php

namespace Mikielis\Cookie\Helper;

class CmsList
{
    public function get(object $collection): array
    {
        $list = [];

        foreach ($collection as $item) {
            $list[] = [
                'label' => $item->getTitle(),
                'value' => $item->getIdentifier(),
            ];
        }

        return $list;
    }
}
