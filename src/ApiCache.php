<?php
namespace ljh13043434556\qianduanhuancun;

class ApiCache
{
    protected $cacheKey = [];

    protected $jsonFile = [];

    protected $classMap = [];

    public function __construct()
    {
        $this->cacheKey = config('qianduanhuancun.cacheKey');
        $this->jsonFile = config('qianduanhuancun.jsonFile');
    }

    /**
     * 取相应缓存设置的键
     * @param $key
     * @return mixed
     */
    public function getCacheKey($key)
    {
        return $this->cacheKey[$key];
    }

    public function getJsonFile($key)
    {
        return $this->jsonFile[$key];
    }



    protected function getClass($name)
    {
        if(!isset($this->classMap['common'])) {
            $this->classMap['common'] = new $name($this);
        }
        return $this->classMap['common'];
    }

    /**
     * 公众缓存
     * @return CommonVersion|mixed
     */
    public function common()
    {
        return $this->getClass(CommonVersion::class);
    }


    /**
     * 用户缓存
     * @return UserVersion|mixed
     */
    public function user()
    {
        return $this->getClass(UserVersion::class);
    }
}