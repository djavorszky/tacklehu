<?php

class Role {

	public static $role_admin = 1;
	public static $role_user = 2;
	public static $role_mod = 4;

	public static function addRole($role, $userId) {
		if (! self::hasRole($role, $userId)) {
			DB::mq("UPDATE User SET roleId = roleId + $role WHERE userId = $userId");
		}
	}

	public static function removeRole($role, $userId) {
		if (self::hasRole($role, $userId)) {
			DB::mq("UPDATE User SET roleId = roleId - $role WHERE userId = $userId");	
		}
	}

	public static function hasRole($role, $userId) {
		$currentRole = DB::mqval("SELECT roleId FROM User WHERE userId = $userId");

		if (($currentRole & $role) != 0) {
			return true;
		} 
		else {
			return false;
		}
	}
}


?>