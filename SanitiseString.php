<?php

/**
 * Utility class to simplify the sanitising of a string.
 *
 * @author Mike Hart
 * @version 0.1
 * @copyright MIT Style
 */
class SanitiseString
{
	/**
	 * Holds the string to be modified.
	 */
	private static $payload = "";

	/**
	 * @var self
	 */
	private static $instance;

	/**
	 * Holds an associative array of characters where the key is the banned char
	 * and the value is it's replacement.
	 */
	public static $generalBannedChars = array(
        "’" => "'",
        "“" => "\"",
        "”" => "\"",
        "…" => "...",
        "–" => "-"
	);

	/**
	 * Sets the payload.
	 */
	private static function setPayload($payload)
	{
		self::$payload = $payload;
	}

	/**
	 * Run every sanitising command.
	 */
	public static function runGeneral($payload)
	{
		self::setPayload($payload);

        self::stripGeneral();

		return self::$payload;
	}

	/**
	 * Iterate over the general banned characters and apply any replacements
	 *
	 * @return void
	 */
	private static function stripGeneral()
	{
		foreach (self::$generalBannedChars as $banned => $replacement)
		{
			self::$payload = str_replace($banned, $replacement, self::$payload);
		}
	}
}
