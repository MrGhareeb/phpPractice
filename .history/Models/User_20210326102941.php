<?php
Class User{

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
    * store the user type id (foreign key from the users_type in the database)
    * @var string 
    */
   private $userTypeId;

    public function __construct($userId,$fName,$lName,$email,$userId){

    }



}