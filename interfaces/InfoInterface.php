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
		 * Gets total number of cores
		 *
		 * @return integer
		 */
		public static function getCpuCores();

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

		/**
		 * Gets Current PHP Version
		 *
		 * @return string
		 */
		public static function getPhpVersion();

		/**
		 * Gets Server Name
		 *
		 * @return string
		 */
		public static function getServerName();

		/**
		 * Gets Server Protocol
		 *
		 * @return string
		 */
		public static function getServerProtocol();

		/**
		 * Gets the type of server e.g. apache
		 *
		 * @return string
		 */
		public static function getServerSoftware();

		/**
		 * Gets total physical memory
		 *
		 * @return array|null
		 */
		public static function getTotalMemory();

		/**
		 * Gets the current DB Type of Yii2
		 *
		 * @return mixed
		 */
		public static function getDbType();

		/**
		 * * Gets the current DB Version of Yii2
		 *
		 * @return mixed
		 */
		public static function getDbVersion();
	}