<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 22:24
	 */

	namespace abhimanyu\systemInfo\os;

	use abhimanyu\systemInfo\interfaces\InfoInterface;
	use Exception;

	class Windows implements InfoInterface
	{
		/**
		 * Gets the name of the Operating System
		 *
		 * @return string
		 */
		public static function getOS()
		{
			$wmi = Windows::getInstance();

			foreach ($wmi->ExecQuery("SELECT Caption FROM Win32_OperatingSystem") as $os) {
				return $os->Caption;
			}

			return "Windows";
		}

		public static function getInstance()
		{
			$wmi = new \COM('winmgmts:{impersonationLevel=impersonate}//./root/cimv2');

			if (!is_object($wmi)) {
				throw new Exception('This needs access to WMI. Please enable DCOM in php.ini and allow the current
				user to access the WMI DCOM object.');
			}

			return $wmi;
		}

		/**
		 * Gets the Kernel Version of the Operating System
		 *
		 * @return string
		 */
		public static function getKernelVersion()
		{
			$wmi = Windows::getInstance();

			foreach ($wmi->ExecQuery("SELECT WindowsVersion FROM Win32_Process WHERE Handle = 0") as $process) {
				return $process->WindowsVersion;
			}

			return "Unknown";
		}


		/**
		 * Gets the hostname
		 *
		 * @return string
		 */
		public static function getHostname()
		{
			$wmi = Windows::getInstance();

			foreach ($wmi->ExecQuery("SELECT Name FROM Win32_ComputerSystem") as $cs) {
				return $cs->Name;
			}

			return "Unknown";
		}

		/**
		 * Gets Processor's Model
		 *
		 * @return string
		 */
		public static function getCpuModel()
		{
			$wmi = Windows::getInstance();

			$object = $wmi->ExecQuery("SELECT Name FROM Win32_Processor");

			foreach ($object as $cpu) {
				return $cpu->Name;
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
			$wmi = Windows::getInstance();

			$object = $wmi->ExecQuery("SELECT Manufacturer FROM Win32_Processor");

			foreach ($object as $cpu) {
				return $cpu->Manufacturer;
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
			$wmi = Windows::getInstance();

			$object = $wmi->ExecQuery("SELECT CurrentClockSpeed FROM Win32_Processor");

			foreach ($object as $cpu) {
				return $cpu->CurrentClockSpeed;
			}

			return 'Unknown';
		}

		/**
		 * Gets current system load
		 *
		 * @return string
		 */
		public static function getLoad()
		{
			$wmi  = Windows::getInstance();
			$load = [];

			foreach ($wmi->ExecQuery("SELECT LoadPercentage FROM Win32_Processor") as $cpu) {
				$load[] = $cpu->LoadPercentage;
			}

			return round(array_sum($load) / count($load), 2) . "%";
		}

		/**
		 * Gets Processor's Architecture
		 *
		 * @return string
		 */
		public static function getCpuArchitecture()
		{
			$wmi = Windows::getInstance();

			foreach ($wmi->ExecQuery("SELECT Architecture FROM Win32_Processor") as $cpu) {
				switch ($cpu->Architecture) {
					case 0:
						return "x86";
					case 1:
						return "MIPS";
					case 2:
						return "Alpha";
					case 3:
						return "PowerPC";
					case 6:
						return "Itanium-based systems";
					case 9:
						return "x64";
				}
			}

			return "Unknown";
		}

		/**
		 * Gets system up-time
		 *
		 * @return string
		 */
		public static function getUpTime()
		{
			$wmi = Windows::getInstance();

			$booted_str = '';
			foreach ($wmi->ExecQuery("SELECT LastBootUpTime FROM Win32_OperatingSystem") as $os) {
				$booted_str = $os->LastBootUpTime;
			}

			$booted    = [
				'year'   => substr($booted_str, 0, 4),
				'month'  => substr($booted_str, 4, 2),
				'day'    => substr($booted_str, 6, 2),
				'hour'   => substr($booted_str, 8, 2),
				'minute' => substr($booted_str, 10, 2),
				'second' => substr($booted_str, 12, 2)
			];
			$booted_ts = mktime($booted['hour'], $booted['minute'], $booted['second'], $booted['month'], $booted['day'], $booted['year']);

			return date('m/d/y h:i A (T)', $booted_ts);
		}
	}