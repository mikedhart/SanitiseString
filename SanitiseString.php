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
		 "”" => "\""
	);

	/**
	 * Implements a singleton paradigm to ensure we're always dealing with the initially
	 * supplied string and no other.
	 */
	private function __construct($payload)
	{
		self::setPayload($payload);
	}

	/**
	 * Implements a singleton paradigm to ensure we're always dealing with the initially
	 * supplied string and no other.
	 *
	 * @return self
	 */
	public static getInstance($payload)
	{
		if (self::$instance instanceof self)
			return self::$instance;

		self::$instance = new self($payload);

		return self::$instance;
	}

	/**
	 * Sets the payload.
	 */
	private static setPayload($payload)
	{
		self::$payload = $payload;
	}

	/**
	 * Run every sanitising command.
	 */
	public static runGeneral($payload)
	{
		$instance = self::getInstance($payload);

		return self::$payload;
	}

	/**
	 * Iterate over the general banned characters and apply any replacements
	 * 
	 * @return void
	 */
	private function stripGeneral()
	{
		foreach (self::$generalBannedChars as $banned => $replacement)
		{
			str_replace($banned, $replacement, self::$payload);
		}
	}
}
