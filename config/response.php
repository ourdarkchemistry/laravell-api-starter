<?php

use App\Enums\ResponseEnum;

return [

    'error_code' => 200,
    'locale' =>  'enums.'.ResponseEnum::class,
    'exception' => [
        \Illuminate\Validation\ValidationException::class => [
            'code' => 422,
        ],
        \Illuminate\Auth\AuthenticationException::class => [
        ],
        \Symfony\Component\HttpKernel\Exception\NotFoundHttpException::class => [
            'message' => '',
        ],
        \Illuminate\Database\Eloquent\ModelNotFoundException::class => [
            'message' => '',
        ],
    ],
    'format' => [
        'class' => \Jiannei\Response\Laravel\Support\Format::class,
        'config' => [
            'status' => ['alias' => 'status', 'show' => true],
            'code' => ['alias' => 'code', 'show' => true],
            'message' => ['alias' => 'message', 'show' => true],
            'error' => ['alias' => 'error', 'show' => true],
            'data' => ['alias' => 'data', 'show' => true],
            'data.data' => ['alias' => 'data.data', 'show' => true],
        ],
    ],
];
