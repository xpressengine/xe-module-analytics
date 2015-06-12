<?php
class analyticsView extends analytics
{
	function init()
	{
		$this->setTemplatePath($this->module_path.'tpl');
	}
}
