<?php

use app\classes\Flash;

function flash(string $key)
{
    $flash = Flash::get($key);

    if (isset($flash['message'])) {
        return <<<HTML
        <div class="alert alert-{$flash['alert']} alert-dismissible fade show" role="alert">
            {$flash['message']}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        HTML;
    }
}