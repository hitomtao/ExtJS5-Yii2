<?php

/* 
 * Конфиг меню для админ панели
 */

return array(
	array(
		'text' => "Настройки",
		'iconCls' => 'icon-cog',
		'children' => array(
			array(
			'text' => "Пользователи",
			'iconCls' => 'icon-user',
			'action' => 'User:list',
			'role' => '123',
			'leaf' => true
			)
		),
	),

	array(
		'text' => "Test",
		'iconCls' => 'icon-grid',
		'action' => 'User:test',
		'role' => '123',
		'leaf' => true
	),

	array(
		'text' => "Список пользователей",
		'iconCls' => 'icon-grid',
		'action' => 'User:list',
		'role' => '123',
		'leaf' => true
	)
);