<?php
class analyticsController extends analytics {
	function init(){
	}

	function triggerBeforeDisplay(&$obj){
		$responseMethod = Context::getResponseMethod();

		if($responseMethod != 'HTML')
		{
			return;
		}

		$oModuleModel = getModel('module');
		$module_config = $oModuleModel->getModuleConfig('analytics');

		// api_key가 설정되어있지 않은 경우 스크립트 삽입하지 않는다.
		if(!$module_config->api_key || $module_config->api_key == "")
		{
			return;
		}

		$script =  '<script type="text/javascript" src="//wcs.naver.net/wcslog.js"></script> <script type="text/javascript"> if(!wcs_add) var wcs_add = {}; wcs_add["wa"] = "'.$module_config->api_key.'"; wcs_do(); </script>';
		Context::addHtmlFooter( $script );
	}

	function triggerGetTextyleCustomMenu(&$custom_menu) {
		// menu 3(통계) 메뉴에 추가
		$attache_menu3 = array(
			'dispAnalyticsAdminContent' => 'Naver Analytics'
		);

		if(!$custom_menu->attached_menu[3])
		{
			$custom_menu->attached_menu[3] = array();
		}
			$custom_menu->attached_menu[3] = array_merge($custom_menu->attached_menu[3], $attache_menu3);
	}
}
