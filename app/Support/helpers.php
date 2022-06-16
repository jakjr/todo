<?php

if (!function_exists('user')) {
    /**
     * @return \App\Models\Usuario
     */
    function user()
    {
        return auth()->check() ? auth()->user() : null;
    }
}

if (!function_exists('getLastSeen')) {
    function getLastSeen($key, $item = null, $class = 'warning')
    {
        if (!session()->has("lastSeen:$key")) {
            return;
        }

        if (is_null($item)) {
            return session()->get("lastSeen:$key");
        }

        $id = is_object($item) ? $item->id : $item;

        if (session()->get("lastSeen:$key") == $id) {
            return $class;
        }
    }
}

if (!function_exists('setLastSeen')) {
    function setLastSeen($key, $item = null)
    {
        if (is_object($key) && is_null($item)) {
            $item = $key;
            $key = get_class($key);
        }

        $id = is_object($item) ? $item->id : $item;
        session()->put("lastSeen:$key", $id);
    }
}
