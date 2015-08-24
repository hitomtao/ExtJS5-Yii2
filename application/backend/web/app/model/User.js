/* 
 * Модель упревления пользователями
 */


Ext.define('Adminpanel.model.User', {
    extend: 'Ext.data.Model',
	
	/**
	 * id: 3
	 * username: "user"
	 * email: "user@m.ru"
	 * blocked_at: null
	 * confirmed_at: 1423326383
	 * created_at: 1423989204
	 * flags: 0
	 * password_hash: "$2y$13$65m5BGRvTHCQuuvgRPZmlua7D8PfIT6ffdmIRiEUOMY3dEqlPE7gS"
	 * registration_ip: null
	 * role: "user"
	 * status: 10
	 * unconfirmed_email: null
	 * updated_at: 1426527795
	 */
	
	fields: [
		{
			name: 'id',
			type: 'int'
		},
        'username',
		'email',
		'blocked_at',
		'confirmed_at',
		'created_at',
		'flags',
		'registration_ip',
		'role',
		'status',
		'unconfirmed_email',
		'updated_at'
    ]
});