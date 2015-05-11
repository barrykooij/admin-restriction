<?php

class AR_Hooks {

	private static $instance = null;

	public static function get_instance() {
		if ( null == self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	public function disallow_editor() {
		global $current_user;
		get_currentuserinfo();
		if ( $current_user->ID != 1 ) {
			if ( ! defined( 'DISALLOW_FILE_MODS' ) {
				define( 'DISALLOW_FILE_MODS', true );
			}
    	}
	}

	public function hide_plugin_controls( $actions ) {
		global $current_user;
		get_currentuserinfo();

		if ( $current_user->ID != 1 ) {
			if ( isset( $actions['activate'] ) ) {
				unset( $actions['activate'] );
			}
			if ( isset( $actions['edit'] ) ) {
				unset( $actions['edit'] );
			}
			if ( isset( $actions['deactivate'] ) ) {
				unset( $actions['deactivate'] );
			}
		}

		return $actions;
	}

	public function catch_plugin_cap( $allcaps, $caps, $args ) {
		global $current_user, $action;
		get_currentuserinfo();
		if ( $current_user->ID == 1 ) {
			return $allcaps;
		}
		if ( isset( $action ) && ( $action == 'activate' || $action == 'deactivate' ) ) {
			$allcaps['activate_plugins'] = 0;
		}

		return $allcaps;
	}

	public function disallow_core_update( $param ) {
		global $current_user;
		get_currentuserinfo();
		if ( $current_user->ID != 1 ) {
			return null;
		}

		return $param;
	}

	/**
	 * Unables all users without ID 1 from doing bulk functions on plugins
	 * @param $actions all available bulk actions
	 * @return mixed array With all available bulk actions
	 */
	public function remove_bulk_actions( $actions ) {
		global $current_user;
		get_currentuserinfo();

		if ( $current_user->ID != 1 ) {
			if( isset( $actions['activate-selected'] ) ) unset( $actions['activate-selected'] );
			if( isset( $actions['deactivate-selected'] ) ) unset( $actions['deactivate-selected'] );
			if( isset( $actions['update-selected'] ) ) unset( $actions['update-selected'] );
			if( isset( $actions['delete-selected'] ) ) unset( $actions['delete-selected'] );
		}

		return $actions;
	}

}
