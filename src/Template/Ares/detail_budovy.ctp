<?php
/**
 * @var AppView $this
 * @var Budova $budova
 */

use App\Model\Entity\Budova;
use App\View\AppView;

$this->set('title', 'Detail adresy: ' . $budova->ulice . ' ' . $budova->cisloDomovni);