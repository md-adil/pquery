<?php
/**
* 
*/
class Str extends Core  implements \ArrayAccess, \IteratorAggregate
{
	protected $allowed = ['len', 'json'];
	public function __construct($str) {
		$this->var = $str;
	}

	// Custom methods

	public function split() {
		$args = func_get_args();
		$pattern = array_shift($args);
		$callback = null;
		foreach($args as $key => $arg) {
			if(is_callable($arg)) {
				$callback = $arg;
				unset($args[$key]);
			}
		}
		$spliter = $this->isRegex($pattern) ? 'preg_split' : 'explode';
		$ret = call_user_func_array($spliter, array_merge([$pattern, $this->var], $args));
		$arr = [];
		if($callback) {
			foreach($ret as $key => $val) {
				$caller = $callback->bindTo(new Self($val));
				$arr[] = $caller(new Self($key), new Self($val));
			}
			return new Arr($arr);
		}
		return new Arr($ret);
	}

	public function html($element, $attrs) {
		$attribute = '';
		foreach($attrs as $attr => $val) {
			$attribute .= "{$attr}=\"{$val}\" ";
		}
		$this->var = "<{$element} {$attribute}>$this->var</{$element}>";
		return $this;
	}

	public function json($array = false) {
		if($array) {
			return new Arr(json_decode($this->var, true));
		}
		return json_decode($this->var);
	}
	// Core methods
	public function replace($pattern, $replace) {
		if($this->isRegex($pattern)) {
			$this->var = preg_replace($pattern, $replace, $this->var);
		} else {
			$this->var = str_replace($pattern, $replace, $this->replace);
		}
		return $this;
	}

	public function len() {
		return strlen($this->var);
	}

	
	/*
	public function addslashes($char = null) {
		$this->var = addcslashes($this->var, $char);
		return $this;
	}

	public function bin2hex() {

	}

	public function chop() {

	}

	public function chr() {

	}
	public function chunk_split() {

	}
	public function convert_cyr_string() {

	}
	public function convert_uudecode() {

	}
	public function convert_uuencode() {

	}
	public function count_chars() {

	}
	public function crc32() {

	}
	public function crypt() {

	}

	public function fprintf() {

	}

	public function get_html_translation_table() {

	}

	public function hebrev() {

	}
	public function hebrevc() {

	}
	public function hex2bin() {

	}
	public function html_entity_decode() {

	}
	public function htmlentities() {

	}
	public function htmlspecialchars_decode() {

	}
	public function htmlspecialchars() {

	}

	public function lcfirst() {

	}
	public function levenshtein() {

	}
	public function localeconv() {

	}
	public function ltrim() {

	}
	
	public function md5_file() {

	}
	public function metaphone() {

	}
	public function money_format() {

	}
	public function nl_langinfo() {

	}
	public function nl2br() {

	}
	public function number_format() {

	}
	public function ord() {

	}
	public function parse_str() {

	}
	public function printf() {

	}
	public function quoted_printable_decode() {

	}
	public function quoted_printable_encode() {

	}
	public function quotemeta() {

	}
	public function rtrim() {

	}
	public function setlocale() {

	}
	public function sha1() {

	}
	public function sha1_file() {

	}
	public function similar_text() {

	}
	public function soundex() {

	}
	public function sprintf() {

	}
	public function sscanf() {

	}
	public function str_getcsv() {

	}
	public function str_ireplace() {

	}
	public function str_pad() {

	}
	public function str_repeat() {

	}
	public function str_replace() {

	}
	public function str_rot13() {

	}
	public function str_shuffle() {

	}
	public function str_split() {

	}
	public function str_word_count() {

	}
	public function strcasecmp() {

	}
	public function strchr() {

	}
	public function strcmp() {

	}
	public function strcoll() {

	}
	public function strcspn() {

	}
	public function strip_tags() {

	}
	public function stripcslashes() {

	}
	public function stripslashes() {

	}
	public function stripos() {

	}
	public function stristr() {

	}
	public function strlen() {

	}
	public function strnatcasecmp() {

	}
	public function strnatcmp() {

	}
	public function strncasecmp() {

	}
	public function strncmp() {

	}
	public function strpbrk() {

	}
	public function strpos() {

	}
	public function strrchr() {

	}
	public function strrev() {

	}
	public function strripos() {

	}
	public function strrpos() {

	}
	public function strspn() {

	}
	public function strstr() {

	}
	public function strtok() {

	}
	public function strtolower() {

	}
	public function strtoupper() {

	}
	public function strtr() {

	}
	public function substr() {

	}
	public function substr_compare() {

	}
	public function substr_count() {

	}
	public function substr_replace() {

	}
	public function trim() {
		$this->var = trim($this->var);
		return $this;
	}

	public function ucfirst() {
		$this->var = ucfirst($this->var);
		return $this;
	}

	public function ucwords() {

	}
	public function vfprintf() {

	}
	public function vprintf() {

	}
	public function vsprintf() {

	}
	public function wordwrap() {

	}
	*/

	// Inspired by JAVASCRIPT
	public function charAt() {
	
	}
	public function charCodeAt() {
		
	}
	public function concat() {
		
	}
	public function fromCharCode() {
		
	}
	public function indexOf() {
		
	}
	public function lastIndexOf() {
		
	}

	public function localeCompare() {
		
	}

	public function match() {
		
	}

	public function search() {
		
	}
	public function slice() {
		
	}
	public function substring() {
		
	}
	public function toLocaleLowerCase() {
		
	}
	public function toLocaleUpperCase() {
		
	}
	public function toLowerCase() {
		
	}
	
	public function toUpperCase() {
		
	}
	public function valueOf() {
		
	}
	public function anchor() {
		
	}
	public function big() {
		
	}
	public function blink() {
		
	}
	public function bold() {
		
	}
	public function fixed() {
		
	}
	public function fontcolor() {
		
	}
	public function fontsize() {
		
	}
	public function italics() {
		
	}
	public function link() {
		
	}
	public function small() {
		
	}
	public function strike() {
		
	}

	// laravel Helper functions

	public static function ascii($value)
	{
		return Utf8::toAscii($value);
	}

	/**
	 * Convert a value to camel case.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public static function camel($value)
	{
		if (isset(static::$camelCache[$value]))
		{
			return static::$camelCache[$value];
		}

		return static::$camelCache[$value] = lcfirst(static::studly($value));
	}

	/**
	 * Determine if a given string contains a given substring.
	 *
	 * @param  string  $haystack
	 * @param  string|array  $needles
	 * @return bool
	 */
	public static function contains($haystack, $needles)
	{
		foreach ((array) $needles as $needle)
		{
			if ($needle != '' && strpos($haystack, $needle) !== false) return true;
		}

		return false;
	}

	/**
	 * Determine if a given string ends with a given substring.
	 *
	 * @param  string  $haystack
	 * @param  string|array  $needles
	 * @return bool
	 */
	public static function endsWith($haystack, $needles)
	{
		foreach ((array) $needles as $needle)
		{
			if ((string) $needle === substr($haystack, -strlen($needle))) return true;
		}

		return false;
	}

	/**
	 * Cap a string with a single instance of a given value.
	 *
	 * @param  string  $value
	 * @param  string  $cap
	 * @return string
	 */
	public static function finish($value, $cap)
	{
		$quoted = preg_quote($cap, '/');

		return preg_replace('/(?:'.$quoted.')+$/', '', $value).$cap;
	}

	/**
	 * Determine if a given string matches a given pattern.
	 *
	 * @param  string  $pattern
	 * @param  string  $value
	 * @return bool
	 */
	public static function is($pattern, $value)
	{
		if ($pattern == $value) return true;

		$pattern = preg_quote($pattern, '#');

		// Asterisks are translated into zero-or-more regular expression wildcards
		// to make it convenient to check if the strings starts with the given
		// pattern such as "library/*", making any string check convenient.
		$pattern = str_replace('\*', '.*', $pattern).'\z';

		return (bool) preg_match('#^'.$pattern.'#', $value);
	}

	/**
	 * Return the length of the given string.
	 *
	 * @param  string  $value
	 * @return int
	 */
	public static function length($value)
	{
		return mb_strlen($value);
	}

	/**
	 * Limit the number of characters in a string.
	 *
	 * @param  string  $value
	 * @param  int     $limit
	 * @param  string  $end
	 * @return string
	 */
	public static function limit($value, $limit = 100, $end = '...')
	{
		if (mb_strlen($value) <= $limit) return $value;

		return rtrim(mb_substr($value, 0, $limit, 'UTF-8')).$end;
	}

	/**
	 * Convert the given string to lower-case.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public static function lower($value)
	{
		return mb_strtolower($value);
	}

	/**
	 * Limit the number of words in a string.
	 *
	 * @param  string  $value
	 * @param  int     $words
	 * @param  string  $end
	 * @return string
	 */
	public static function words($value, $words = 100, $end = '...')
	{
		preg_match('/^\s*+(?:\S++\s*+){1,'.$words.'}/u', $value, $matches);

		if ( ! isset($matches[0]) || strlen($value) === strlen($matches[0])) return $value;

		return rtrim($matches[0]).$end;
	}

	/**
	 * Parse a Class@method style callback into class and method.
	 *
	 * @param  string  $callback
	 * @param  string  $default
	 * @return array
	 */
	public static function parseCallback($callback, $default)
	{
		return static::contains($callback, '@') ? explode('@', $callback, 2) : array($callback, $default);
	}

	/**
	 * Get the plural form of an English word.
	 *
	 * @param  string  $value
	 * @param  int     $count
	 * @return string
	 */
	public static function plural($value, $count = 2)
	{
		return Pluralizer::plural($value, $count);
	}

	/**
	 * Generate a more truly "random" alpha-numeric string.
	 *
	 * @param  int  $length
	 * @return string
	 *
	 * @throws \RuntimeException
	 */
	public static function random($length = 16)
	{
		if (function_exists('openssl_random_pseudo_bytes'))
		{
			$bytes = openssl_random_pseudo_bytes($length * 2);

			if ($bytes === false)
			{
				throw new \RuntimeException('Unable to generate random string.');
			}

			return substr(str_replace(array('/', '+', '='), '', base64_encode($bytes)), 0, $length);
		}

		return static::quickRandom($length);
	}

	/**
	 * Generate a "random" alpha-numeric string.
	 *
	 * Should not be considered sufficient for cryptography, etc.
	 *
	 * @param  int  $length
	 * @return string
	 */
	public static function quickRandom($length = 16)
	{
		$pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

		return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
	}

	/**
	 * Convert the given string to upper-case.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public static function upper($value)
	{
		return mb_strtoupper($value);
	}

	/**
	 * Convert the given string to title case.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public static function title($value)
	{
		return mb_convert_case($value, MB_CASE_TITLE, 'UTF-8');
	}

	/**
	 * Get the singular form of an English word.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public static function singular($value)
	{
		return Pluralizer::singular($value);
	}

	/**
	 * Generate a URL friendly "slug" from a given string.
	 *
	 * @param  string  $title
	 * @param  string  $separator
	 * @return string
	 */
	public static function slug($title, $separator = '-')
	{
		$title = static::ascii($title);

		// Convert all dashes/underscores into separator
		$flip = $separator == '-' ? '_' : '-';

		$title = preg_replace('!['.preg_quote($flip).']+!u', $separator, $title);

		// Remove all characters that are not the separator, letters, numbers, or whitespace.
		$title = preg_replace('![^'.preg_quote($separator).'\pL\pN\s]+!u', '', mb_strtolower($title));

		// Replace all separator characters and whitespace by a single separator
		$title = preg_replace('!['.preg_quote($separator).'\s]+!u', $separator, $title);

		return trim($title, $separator);
	}

	/**
	 * Convert a string to snake case.
	 *
	 * @param  string  $value
	 * @param  string  $delimiter
	 * @return string
	 */
	public static function snake($value, $delimiter = '_')
	{
		$key = $value.$delimiter;

		if (isset(static::$snakeCache[$key]))
		{
			return static::$snakeCache[$key];
		}

		if ( ! ctype_lower($value))
		{
			$replace = '$1'.$delimiter.'$2';

			$value = strtolower(preg_replace('/(.)([A-Z])/', $replace, $value));
		}

		return static::$snakeCache[$key] = $value;
	}

	/**
	 * Determine if a given string starts with a given substring.
	 *
	 * @param  string  $haystack
	 * @param  string|array  $needles
	 * @return bool
	 */
	public static function startsWith($haystack, $needles)
	{
		foreach ((array) $needles as $needle)
		{
			if ($needle != '' && strpos($haystack, $needle) === 0) return true;
		}

		return false;
	}

	/**
	 * Convert a value to studly caps case.
	 *
	 * @param  string  $value
	 * @return string
	 */
	public static function studly($value)
	{
		$key = $value;

		if (isset(static::$studlyCache[$key]))
		{
			return static::$studlyCache[$key];
		}

		$value = ucwords(str_replace(array('-', '_'), ' ', $value));

		return static::$studlyCache[$key] = str_replace(' ', '', $value);
	}

	// Magic methods
	

	public function __toString() {
		return (string)$this->var;
	}
	// Array 
	public function getIterator() {
		return new ArrayIterator($this->var);
	}

	public function offsetGet($key) {
		return $this->var[$key];
	}

	public function offsetSet($key, $val) {

	}

	public function offsetExists($key) {
		return isset($this->var[$key]);
	}

	public function offsetUnset($key) {

	}
}