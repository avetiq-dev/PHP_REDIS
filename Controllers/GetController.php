<?php

require_once 'env.php';

class GetController
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
     * Get value from redis by key
     */
    public function get($key)
    {
        if (is_string($key)) {
            return [$key => $this->redis->get($key)];
        }
        return false;
    }

    public function remove_all() {
        $this->redis->flushDB();
        return ['status' => true, 'message' => 'All keys removed successfully'];
    }
}