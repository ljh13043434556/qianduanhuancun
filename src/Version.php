<?php
namespace ljh13043434556\qianduanhuancun;


/**
 * 版本号控制
 * Class Version
 * @package ljh13043434556\qianduanhuancun
 */
class Version
{
    protected $apiCache;    //缓存键
    protected $versionList = [];
    protected $cache;
    protected $cacheKey = '';
    public function __construct(ApiCache $apiCache)
    {
        $this->cache = Cache::store('redis');
        $this->apiCache = $apiCache;
        $this->load();

        var_dump($this->versionList);

    }

    /**
     * 对一个键，版本号加1
     * @param $key
     */
    public function add($key)
    {
        $this->versionList[$key] = isset($this->versionList[$key]) ? $this->versionList[$key] + 1 :  2;
    }


    /**
     * 获取这个键的版本号
     * @param $key
     */
    public function get($key)
    {
        return $this->versionList[$key] ?? 1;
    }

    /**
     * 把版本，把存为本地文件
     */
    public function save()
    {
        $this->saveToRedis();
        $this->saveToJsonFile();
    }


    /**
     * 把版本数据缓存到redis中
     */
    protected function saveToRedis()
    {
        $this->cache->set($this->cacheKey, $this->versionList);
    }


    /**
     * 把缓存生成为json文件
     */
    protected function saveToJsonFile()
    {

    }


    /**
     * 从Redis中加载缓存数据
     */
    public function load()
    {
        $this->versionList = $this->cache->get($this->cacheKey);
        return $this->versionList;
    }
}