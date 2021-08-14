<?php
namespace ljh13043434556\qianduanhuancun;


/**
 * 版本号控制
 * Class CommonVersion
 * @package ljh13043434556\qianduanhuancun
 */
class CommonVersion extends Version
{
    public function __construct(ApiCache $apiCache)
    {
        parent::__construct($apiCache);
        $this->cacheKey = $this->apiCache->getCacheKey('common');
        $this->load();
    }

    protected function saveToJsonFile()
    {
        $file = $this->apiCache->getJsonFile('common');
        file_put_contents($file, json_encode($this->versionList));
        return $this;
    }
}