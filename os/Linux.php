<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 16-02-2015
	 * Time: 00:06
	 */

	namespace abhimanyu\systemInfo\os;

	use abhimanyu\systemInfo\interfaces\InfoInterface;
	use Exception;

	class Linux implements InfoInterface
	{
		public function __construct()
		{
			if (!is_dir('/sys') || !is_dir('/proc'))
				throw new Exception('Needs access to /proc and /sys to work.');
		}

		/**
		 * Gets the name of the Operating System
		 *
		 * @return string
		 */
		public static function getOS()
		{
			return 'Linux';
		}

		/**
		 * Gets the Kernel Version of the Operating System
		 *
		 * @return string
		 */
		public static function getKernelVersion()
		{
			return shell_exec('/usr/bin/lsb_release -ds');
		}

		/**
		 * Gets the hostname
		 *
		 * @return string
		 */
		public static function getHostname()
		{
			return php_uname('n');
		}

		/**
		 * Gets Processor's Model
		 *
		 * @return string
		 */
		public static function getCpuModel()
		{
			$cpuInfo = '/proc/cpuinfo';

			// Not there?
			if (!is_file($cpuInfo) || !is_readable($cpuInfo)) {
				return 'Unknown';
			}

			if ($cpuInfo) {
				$cpuInfo = explode("\n", $cpuInfo);
				$values  = [];
				foreach ($cpuInfo as $v) {
					$v = array_map("trim", explode(':', $v));
					if (isset($v[0]) && isset($v[1])) {
						$values[$v[0]] = $v[1];
					}
				}

				return 'model name' ? (isset($values['model name']) ? $values['model name'] : NULL) : $values;
			}

			return 'Unknown';
		}

		/**
		 * Gets Processor's Vendor
		 *
		 * @return string
		 */
		public static function getCpuVendor()
		{
			$cpuInfo = '/proc/cpuinfo';

			// Not there?
			if (!is_file($cpuInfo) || !is_readable($cpuInfo)) {
				return 'Unknown';
			}

			if ($cpuInfo) {
				$cpuInfo = explode("\n", $cpuInfo);
				$values  = [];
				foreach ($cpuInfo as $v) {
					$v = array_map("trim", explode(':', $v));
					if (isset($v[0]) && isset($v[1])) {
						$values[$v[0]] = $v[1];
					}
				}

				return 'vendor_id' ? (isset($values['vendor_id']) ? $values['vendor_id'] : NULL) : $values;
			}

			return 'Unknown';
		}

		/**
		 * Gets Processor's Frequency
		 *
		 * @return string
		 */
		public static function getCpuFreq()
		{
			$cpuInfo = '/proc/cpuinfo';

			// Not there?
			if (!is_file($cpuInfo) || !is_readable($cpuInfo)) {
				return 'Unknown';
			}

			if ($cpuInfo) {
				$cpuInfo = explode("\n", $cpuInfo);
				$values  = [];
				foreach ($cpuInfo as $v) {
					$v = array_map("trim", explode(':', $v));
					if (isset($v[0]) && isset($v[1])) {
						$values[$v[0]] = $v[1];
					}
				}

				return 'cpu MHZ' ? (isset($values['cpu MHZ']) ? $values['cpu MHZ'] : NULL) : $values;
			}

			return 'Unknown';
		}

		/**
		 * Gets Processor's Architecture
		 *
		 * @return string
		 */
		public static function getCpuArchitecture()
		{
			return php_uname('m');
		}

		/**
		 * Gets current system load
		 *
		 * @return string
		 */
		public static function getLoad()
		{
			// TODO: Implement getLoad() method.
		}
	}