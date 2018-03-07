<?php

if (!function_exists('trans')) {

	/**
	 * Translate the given message. Overrides
	 *
	 * @param  string  $key
	 * @param  array   $replace
	 * @param  string  $locale
	 * @return \Illuminate\Contracts\Translation\Translator|string|array|null
	 */
	function trans($key = null, $replace = [], $locale = null) {
		if (is_null($key)) return app('translator');

		return app('translator')->getFromJson($key, $replace, $locale);
	}
}