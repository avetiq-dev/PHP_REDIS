<?php

require_once 'env.php';

class PostController
{
    protected $redis;

    public function __construct()
    {
        $this->redis = new redis();
        $this->redis->connect(SETTINGS['redis_host'], SETTINGS['redis_port']);

        if (SETTINGS['redis_password'])
        $this->redis->auth(SETTINGS['redis_password']);
    }

    /**
     * @param $key
     * @return false|mixed|Redis|string
     * @throws RedisException
     * Set value on redis
     */
    public function set($data)
    {
        if ($data && is_array($data)) {
            foreach ($data as $key => $value) {
                $this->redis->set($key, $value);
            }
           return ['status' => true, 'message' => 'Data updated successfully'];
        }
        return ['status' => false, 'message' => 'wrong data'];
    }
}