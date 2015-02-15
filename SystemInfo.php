<?php
	/**
	 * Created by PhpStorm.
	 * User: Abhimanyu
	 * Date: 15-02-2015
	 * Time: 22:19
	 */

	namespace abhimanyu\systemInfo;

	use abhimanyu\systemInfo\interfaces\InfoInterface;

	class SystemInfo
	{
		/**
		 * @return InfoInterface
		 */
		public static function getInfo()
		{
			$name = strtolower(php_uname('s'));

			if (strpos($name, 'windows') !== FALSE) {
				return __NAMESPACE__ . '\os\Windows';
			} elseif (strpos($name, 'linux') !== FALSE) {
				return __NAMESPACE__ . '\os\Linux';
			}

			return NULL;
		}
	}