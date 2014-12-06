<?php

/**
 * Adds a PageTSConfig file which then itself adds BackendLayouts from a subfolder
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
	'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/Configuration/PageTS/Mod/web_layout.txt">'
);
