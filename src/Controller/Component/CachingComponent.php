<?php

namespace App\Controller\Component;

use Cake\Cache\Cache;
use Cake\Controller\Component;
use InvalidArgumentException;

class CachingComponent extends Component
{

    static $defaultCacheConfig = 'long_term';

    public function initCacheMMROP($mmr_ops)
    {
        $cacheTag = $this->getCacheTag('op_dotace_counts', 'mmr');
        $cache = $this->cacheRead($cacheTag);
        if ($cache === false) {
            $counts = [];
            foreach ($mmr_ops as $op) {
                $counts[$op->idOperacniProgram] = $this->controller->Dotace->find('all', [
                    'conditions' => [
                        'iriOperacniProgram' => $op->idOperacniProgram
                    ]
                ])->count();
            }
            $this->cacheWrite($cacheTag, $counts);
            return $counts;
        }
        return $cache;
    }

    public function getCacheTag($type = null, $name = null, $unique = null)
    {
        if (empty($type) || empty($name))
            throw new InvalidArgumentException();
        return $name . '_' . $type . (empty($unique) ? '' : '_' . sha1($unique));
    }

    public function cacheRead($cache_tag = null)
    {
        if (empty($cache_tag))
            return false;

        return Cache::read($cache_tag, self::$defaultCacheConfig);
    }

    public function cacheWrite($cache_tag = null, $content = null)
    {
        if (empty($cache_tag))
            throw new InvalidArgumentException();

        Cache::write($cache_tag, $content, self::$defaultCacheConfig);
    }

}