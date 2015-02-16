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
		 * Gets the Kernel Version of the Operating System
		 *
		 * @return string
		 */
		public static function getKernelVersion();

		/**
		 * Gets the hostname
		 *
		 * @return string
		 */
		public static function getHostname();

		/**
		 * Gets Processor's Model
		 *
		 * @return string
		 */
		public static function getCpuModel();

		/**
		 * Gets Processor's Vendor
		 *
		 * @return string
		 */
		public static function getCpuVendor();

		/**
		 * Gets Processor's Frequency
		 *
		 * @return string
		 */
		public static function getCpuFreq();

		/**
		 * Gets Processor's Architecture
		 *
		 * @return string
		 */
		public static function getCpuArchitecture();

		/**
		 * Gets current system load
		 *
		 * @return string
		 */
		public static function getLoad();

		/**
		 * Gets system up-time
		 *
		 * @return string
		 */
		public static function getUpTime();
	}