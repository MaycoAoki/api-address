<?php

function filter_sensitive_info(array $data, array $extraHide = []): void
{
    $hide = [
        'headers.Authorization',
        'headers.ONZ-Token',
        'json.password',
        'json.client_id',
        'json.client_secret',
        'json.usuario',
        'json.senha',
        'json.username',
        'json.password',
        'response.access_token',
        'response.token',
        ...$extraHide
    ];
}
