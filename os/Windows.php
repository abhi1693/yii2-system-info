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
	}