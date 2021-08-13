<?php
namespace ljh13043434556\qianduanhuancun;


/**
 * 版本号控制
 * Class UserVersion
 * @package ljh13043434556\qianduanhuancun
 */
class UserVersion extends Version
{
    protected $userUniqid;
    public function __construct(ApiCache $apiCache, $userUniqid)
    {
        parent::__construct($apiCache);
        $this->userUniqid = $userUniqid;
        $this->cacheKey = $this->apiCache->getCacheKey('user');
    }


    protected function saveToJsonFile()
    {
        $file = $this->apiCache->getJsonFile('user') . substr($this->userUniqid, -3) . DIRECTORY_SEPARATOR . $this->userUniqid . '.json';
        file_put_contents($file, $this->versionList);
    }
}