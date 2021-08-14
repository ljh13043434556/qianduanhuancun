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
        $this->cacheKey = $this->apiCache->getCacheKey('user') . ':' . $userUniqid;
        $this->load();
    }


    protected function saveToJsonFile()
    {
        $dir = $this->apiCache->getJsonFile('user') . substr($this->userUniqid, -3) . DIRECTORY_SEPARATOR;
        $file = $dir . $this->userUniqid . '.json';

        if(!is_dir($dir)) {
            mkdir($dir, '0777', true);
        }
        file_put_contents($file, json_encode($this->versionList));
        return $this;
    }
}