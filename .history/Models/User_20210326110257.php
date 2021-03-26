<?php
class User
{

    //variables

    /**
     * store the userId
     * @var string 
     */
    private $userId;
    /**
     * store the first name of the user
     * @var string 
     */
    private $fName;
    /**
     * store the last name of the user
     * @var string 
     */
    private $lName;
    /**
     * store the email of the user
     * @var string 
     */
    private $email;
    /**
     * store the user type id (foreign key from the users_type table in the database)
     * @var string 
     */
    private $userTypeId;


    //getters and setters

    /**
     * Get store the userId
     *
     * @return  string
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the userId
     *
     * @param  string  $userId  store the userId
     *
     */
    public function setUserId(string $userId)
    {
        $this->userId = $userId;
    }

    /**
     * Get store the first name of the user
     *
     * @return  string
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * Set the first name of the user
     *
     * @param  string  $fName  store the first name of the user
     *
     */
    public function setFName(string $fName)
    {
        $this->fName = $fName;
    }

    /**
     * Get the last name of the user
     *
     * @return string
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * Set the last name of the user
     *
     * @param  string  $lName store the last name of the user
     *
     */
    public function setLName(string $lName)
    {
        $this->lName = $lName;
    }

    /**
     * Get the email of the user
     *
     * @return  string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the email of the user
     *
     * @param  string  $email  store the email of the user
     *
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * Get the user type id (foreign key from the users_type table in the database)
     *
     * @return  string
     */
    public function getUserTypeId()
    {
        return $this->userTypeId;
    }

    /**
     * Set the user type id (foreign key from the users_type table in the database)
     *
     * @param  string  $userTypeId  store the user type id (foreign key from the users_type table in the database)
     *
     */
    public function setUserTypeId(string $userTypeId)
    {
        $this->userTypeId = $userTypeId;
    }

    /**
     * create an instance of the User class 
     */
    public function __construct()
    {
        //set the default value of the variables
        $this->userId = null;
        $this->fName = null;
        $this->lName = null;
        $this->email = null;
        $this->userTypeId = null;
    }

    //TODO: checkLoggedUser() check the session for uid
    //TODO: login($email,$password) @return bool 
    //TODO: logout() user checkLoggedUser() @return bool if there is an active session then logout the user 
    //TODO: register() @return bool user exists to check for the usr, if there is not user with the same data create an new user in the database
    //TODO: exists() @return bool check the database if the user exists 
    //TODO: initWithSession() @return User create a user instance from session uid (using checkLoggedUser() first to check the session)
    //TODO: initWith() set the values of the instance


}