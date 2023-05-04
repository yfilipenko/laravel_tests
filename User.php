<?php 
class User {
	private $name;
	private $email;
	private $password;
	
	public function __construct($name, $email, $password){
		$this->name = $name;
		$this->email = $email;
		$this->password = $password;
	}
	
	public function login($email, $password){
		if( $email == $this->email and $password == $this->password ):
			return true;
		else:
			return false;
		endif;
	}
	
	public function changePassword($old_password, $new_password){
		if( $old_password == $this->password ):
			$this->password = $new_password;
			return true;
		else:
			return false;
		endif;
	}
}

$objUser = new User('Yuliya', 'yuliya@test.com', 'yuliyapass');

$user_login[] = $objUser->login('yuliya@test.com', 'yuliyapass');
$user_login[] =  $objUser->login('test', 'yuliya@test.com');

$change_pass[] = $objUser->changePassword('yuliyapass', 'yuliyapassnew');
$change_pass[] = $objUser->changePassword('yuliya', 'yuliyapassnew');

foreach( $user_login as $item ):
	if( $item === true ):
		echo 'You are logged in!';
	else:
		echo 'Error! Wrong email or password!';
	endif;
endforeach;

foreach( $change_pass as $item ):
	if( $item === true ):
		echo 'Your password has been changed!';
	else:
		echo 'Error! Wrong old password!';
	endif;
endforeach;
