<?php
/**
 * @var AppView $this
 */
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}

use App\View\AppView; ?>
<div class="message success" onclick="this.classList.add('hidden')"><?= $message ?></div>
