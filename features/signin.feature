Feature: User sessions
	In order to access their account
	As a user
	I need to be able to log into the website

	Scenario: Login
		Given I am on "/"
			And I should see "Login"
		When I fill in "email" with "myemail@test.com"
			And I fill in "password" with "mysecurepassword"
			And I press "Login"
		Then I should be on "/dashboard"
			And I should see "Welcome back"

	Scenario: Logout
		Given I am logged in as "myemail@test.com" with password "mysecurepassword"
			And I am on "/dashboard"
		When I follow "Logout"
		Then I should be on "/"
			And I should see "Login"