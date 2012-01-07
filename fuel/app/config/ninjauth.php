<?php
/**
 * Configuration for NinjAuth
 */
return array(
	
	'urls' => array(
		'registration' => 'users/signup',
		'login' => 'users/login',
		'callback' => 'auth/callback',
		
		'registered' => 'auth/account',
		'logged_in' => 'auth/account',
	),

	/**
	 * Providers
	 * 
	 * Providers such as Facebook, Twitter, etc all use different Strategies such as oAuth, oAuth2, etc.
	 * oAuth takes a key and a secret, oAuth2 takes a (client) id and a secret, optionally a scope.
	 */
	'providers' => array(
		
		'facebook' => array(
			'id' => '182415161842191',
			'secret' => '61e004359180d065af72d4eee5ae3595',
			'scope' => 'email,offline_access,publish_stream',
		),
		
		'twitter' => array(
			'key' => 'rkT7Ow9rSBUgy3m81PHzA',
			'secret' => 'IeUiU3fAOmbO0KFYA2AogMd4eqnsuM7hrupnYezq8',
		),

		'dropbox' => array(
			'key' => '',
			'secret' => '',
		),

		'linkedin' => array(
			'key' => '',
			'secret' => '',
		),

		'flickr' => array(
			'key' => '',
			'secret' => '',
		),

		'youtube' => array(
			'key' => '',
			'scope' => 'http://gdata.youtube.com',
		),
	
	),

	/**
	 * link_multiple_providers
	 * 
	 * Can multiple providers be attached to one user account
	 */
	'link_multiple_providers' => true,

	/**
	 * default_group
	 * 
	 * How should users be signed up
	 */
	'default_group' => 1,
);
