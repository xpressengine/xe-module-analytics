<?php
class analyticsAdminView extends analytics
{
	function init()
	{
		 $template_path = sprintf("%stpl/",$this->module_path);
		 $this->setTemplatePath($template_path);
	}

	function dispAnalyticsAdminContent()
	{
		$oModuleModel = getModel('module');
		$module_config = $oModuleModel->getModuleConfig('analytics');

		if($module_config->api_key)
		{
			Context::set('api_key', $module_config->api_key);
		}

		$this->setTemplateFile('index');
	}
}
