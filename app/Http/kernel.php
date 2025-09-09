
protected $middlewareGroups = [
    'web' => [
        // ...
        \App\Http\Middleware\LastUserActivity::class,
    ],
];
