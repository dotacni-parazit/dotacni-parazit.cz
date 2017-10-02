<?php

namespace App\Controller\Component;

use App\Model\Entity\CiselnikDotacePoskytovatelv01;
use Cake\Cache\Cache;
use Cake\Controller\Component;
use InvalidArgumentException;

class CachingComponent extends Component
{

    static $defaultCacheConfig = 'long_term';

    public function cacheAll()
    {
        $this->initCacheMMROP($this->getController()->CiselnikMmrOperacniProgramv01->find('all'));
        $this->initCachePodlePoskytovatelu($this->getController()->CiselnikDotacePoskytovatelv01->find('all'));
    }

    public function initCacheMMROP($mmr_ops)
    {
        $cacheTag = $this->getCacheTag('op_dotace_counts', 'mmr');
        $cache = $this->cacheRead($cacheTag);
        if ($cache === false) {
            $counts = [];
            foreach ($mmr_ops as $op) {
                $counts[$op->idOperacniProgram] = $this->getController()->Dotace->find('all', [
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

    /**
     * @param CiselnikDotacePoskytovatelv01[] $poskytovateleDotaci
     * @return array
     */
    public function initCachePodlePoskytovatelu($poskytovateleDotaci)
    {
        $counts = [];

        foreach ($poskytovateleDotaci as $d) {
            $cache_key = 'sum_rozhodnuti_podle_poskytovatele_' . sha1($d->id);
            $cache_key_spotrebovano = 'sum_rozhodnuti_podle_poskytovatele_' . sha1($d->id);

            $cnt = $this->cacheRead($cache_key);
            $cnt_spotreba = $this->cacheRead($cache_key_spotrebovano);

            if ($cnt === false) {
                // cache overall sum
                $cnt = $this->getController()->Rozhodnuti->find('all', [
                    'fields' => [
                        'iriPoskytovatelDotace',
                        'SUM' => 'SUM(castkaRozhodnuta)'
                    ],
                    'conditions' => [
                        'iriPoskytovatelDotace' => $d->id,
                        'refundaceIndikator' => 0
                    ]
                ])->first()->SUM;
                $this->cacheWrite($cache_key, $cnt);
            }
            if ($cnt_spotreba === false) {
                $cnt_spotreba = $this->getController()->RozpoctoveObdobi->find('all', [
                        'fields' => [
                            'sum' => 'SUM(castkaSpotrebovana)'
                        ],
                        'conditions' => [
                            'iriPoskytovatelDotace' => $d->id,
                            'refundaceIndikator' => 0
                        ],
                        'contain' => [
                            'Rozhodnuti.Dotace.PrijemcePomoci'
                        ]
                    ])->first()->sum + 0;
                $this->cacheWrite($cache_key_spotrebovano, $cnt_spotreba);
            }

            $counts[$d->id] = [
                'soucet' => $cnt,
                'soucetSpotrebovano' => $cnt_spotreba
            ];

        }

        return $counts;
    }

    public function initCacheCEDROP($cedr_ops)
    {
        $cacheTag = $this->getCacheTag('op_dotace_counts', 'cedr');
        $cache = $this->cacheRead($cacheTag);
        if ($cache === false) {
            $counts = [];
            foreach ($cedr_ops as $op) {
                $counts[$op->idOperacniProgram] = $this->getController()->Dotace->find('all', [
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

}