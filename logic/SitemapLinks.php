<?php
/**
 * Created by PhpStorm.
 * User: floor12
 * Date: 22.04.2018
 * Time: 11:07
 */

namespace app\logic;

use floor12\news\News;

class SitemapLinks
{
    private $_links = [];
    private $_objects;

    public function __construct()
    {
        $this->_objects = array_merge(
            News::find()->active()->all()
        );
    }

    /**
     * @return array
     */
    public function execute(): array
    {
        if ($this->_objects)
            foreach ($this->_objects as $object)
                $this->_links[] = ['url' => $object->url, 'priority' => 0.5, 'lastmod' => date("c", $object->updated)];
        return $this->_links;
    }
}