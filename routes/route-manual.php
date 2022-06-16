<?php

Route::get('manual/layout-da-aplicacao', function () {
    return inertia('Manual/LayoutDaAplicacao');
});
Route::get('manual/layout-da-pagina', function () {
    return inertia('Manual/LayoutDaPagina');
});
Route::get('manual/menus', function () {
    return inertia('Manual/Menus');
});
Route::get('manual/mensagens', function () {
    return inertia('Manual/Mensagens');
});
