<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 22:17
	 */

	namespace abhimanyu\systemInfo\interfaces;

	/**
	 * Interface InfoInterface
	 *
	 * @package abhimanyu\interfaces
	 */
	interface InfoInterface
	{
		/**
		 * Gets the name of the Operating System
		 *
		 * @return string
		 */
		public static function getOS();

		/**
		 * @return string
		 */
		public static function getKernelVersion();
	}