<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

        'Instagram' => array(
        	//Local
            'client_id'		=> '34a4df88845e4ee18a8b9373012c8610',
            'client_secret'	=> '5a81d51bd57b4da2b6c5b9fcdea09a9f',
            
            //server "ebashapp.devinsturgeon.com/login-with-instagram"
            //'client_id'		=> 'cda84c7520364f59a5af33b39258e054',
            //'client_secret'	=> '3650b6753ea543818db6e1acb74b83a6',
            
            'scope'			=> ['basic','comments', 'relationships', 'likes'],
        ),

        // 'Twitter' => array(
        // 	'client_id' => 'uE7XKPIhC1Mw6TpiirHTIoH7V',
        //  	'client_secret' => 'VjE4ktGImH5YW4VBgTHitrqK8jx653sduHldVZfQufxMvGnHZi',
        //  	'access_id' => '54129477-FnMiJd51TE59cA0uxyWLuzvnPjktIPDg6lR5oPigl',
        //  	'access_secret' => 'XinVNp628WYs48TY4PUzghRPJXulTKLarLBvgTnToctKi',
        //  	'scope' => [],
        // ),
	),
);