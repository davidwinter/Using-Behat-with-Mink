<?php

require_once __DIR__.'/silex.phar'; 

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application(); 

$app->get('/', function() { 
    ob_start(); ?>
    <h1>Login</h1>
    <form action="" method="post">
		<label for="email">Email: </label>
		<input type="email" name="email" id="email" />
		<label for="password">Password: </label>
		<input type="password" name="password" id="password" />
		<input type="submit" value="Login" />
    </form>

    <?php return ob_get_clean();
}); 

$app->post('/', function(Request $request) use ($app) {
	if ($request->get('email') === 'myemail@test.com' && $request->get('password') === 'mysecurepassword')
	{
		session_start();
		$_SESSION['logged_in'] = true;
		return $app->redirect('/dashboard');
	}
	else
	{
		return $app->redirect('/');
	}
});

$app->get('/dashboard', function() use ($app) {
	session_start();

	if ( ! isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true)
	{
		return $app->redirect('/');
	}

	ob_start(); ?>
	<h1>Welcome back!</h1>
	<p><a href="/logout">Logout</a></p>
	<?php return ob_get_clean();
});

$app->get('/logout', function() use ($app) {
	session_start();
	unset($_SESSION['logged_in']);
	return $app->redirect('/');
});

$app->run(); 
