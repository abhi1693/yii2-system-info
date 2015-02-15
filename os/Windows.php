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
	}