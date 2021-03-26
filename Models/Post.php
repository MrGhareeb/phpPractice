<?php
//import the database class
include_once "./Database.php";
class Post
{

    //variables

    /**
     * @var string store the id of the post
     */
    private $post_id;
    /**
     * @var string store the title of the post
     */
    private $post_title;
    /**
     * @var string store the body of the post
     */
    private $post_body;
    /**
     * @var string store the id of how created the post 
     */
    private $created_by;
    /**
     * @var string store the img location in the server
     */
    private $post_img;
    /**
     * @var string store the date of when the post was created
     */
    private $post_time_stamp;
    /**
     * store the connection of the database
     * @var mysqli
     */
    private $conn;


    //getter and setters

    /**
     * Get the id of the post
     *
     * @return  string
     */
    public function getPostId()
    {
        return $this->post_id;
    }

    /**
     * Set the id of the post
     *
     * @param  string  $post_id  store the id of the post
     *
     */
    public function setPostId(string $post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * Get the title of the post
     *
     * @return  string
     */
    public function getPostTitle()
    {
        return $this->post_title;
    }

    /**
     * Set the title of the post
     *
     * @param  string  $post_title  the title of the post
     *
     */
    public function setPostTitle(string $post_title)
    {
        $this->post_title = $post_title;
    }

    /**
     * Get sre the body of the post
     *
     * @return  string
     */
    public function getPostBody()
    {
        return $this->post_body;
    }

    /**
     * Set the body of the post
     *
     * @param  string  $post_body  the body of the post
     *
     */
    public function setPostBody(string $post_body)
    {
        $this->post_body = $post_body;
    }

    /**
     * Get the id of how created the post
     *
     * @return  string
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Set the id of how created the post
     *
     * @param  string  $created_by the id of how created the post
     *
     */
    public function setCreatedBy(string $created_by)
    {
        $this->created_by = $created_by;
    }

    /**
     * Get the img location in the server
     *
     * @return  string
     */
    public function getPostImg()
    {
        return $this->post_img;
    }

    /**
     * Set the img location in the server
     *
     * @param  string  $post_img the img location in the server
     *
     */
    public function setPostImg(string $post_img)
    {
        $this->post_img = $post_img;
    }

    /**
     * Get the date of when the post was created
     *
     * @return  string
     */
    public function getPostTimeStamp()
    {
        return $this->post_time_stamp;
    }

    /**
     * Set store the date of when the post was created
     *
     * @param  string  $post_time_stamp the date of when the post was created
     *
     */
    public function setPostTimeStamp(string $post_time_stamp)
    {
        $this->post_time_stamp = $post_time_stamp;
    }

    //TODO: save() save the data in the database

    /**
     * create an instance of post
     */
    public function __construct()
    {
        //set the values of the variables as null
        $this->post_id = null;
        $this->post_title = null;
        $this->post_body = null;
        $this->created_by = null;
        $this->post_img = null;
        $this->post_time_stamp = null;
        //get and store the connection of mysqli
        $this->conn = Database::getInstance()->getConnection();
    }

    /**
     * set the values of the instance variables
     * @param string $post_id the id of the post
     * @param string $post_title the title of the post
     * @param string $post_body the body of the post 
     * @param string $created_by the id of the user how created the post
     * @param string $post_img the post img (if there is not post img leave it null)
     * @param string $post_time_stamp the time when the post was created 
     */
    public function initWith($post_id, $post_title, $post_body, $created_by, $post_img, $post_time_stamp)
    {
        //set the values of the variables 
        $this->post_id = $post_id;
        $this->post_title = $post_title;
        $this->post_body = $post_body;
        $this->created_by = $created_by;
        $this->post_img = $post_img;
        $this->post_time_stamp = $post_time_stamp;
    }

    /**
     * populate the instance with the provided id if it exists
     * @param string $post_id the id of the post
     */
    public function getPostById($post_id)
    {
        //the sql query to execute
        $sql = "SELECT * FROM posts WHERE post_id = ?";
        //prepare the sql for parameters
        $stmt = $this->conn->prepare($sql);
        //set the parameters value
        $stmt->bind_param("i", $post_id);
        //execute the query
        $stmt->execute();
        //get the data as in array
        $result = $stmt->get_result()->fetch_assoc();
        //set the values of the instance
        $this->initWith($result['post_id'], $result['post_title'], $result['post_body'], $result['created_by'], $result['post_img'], $result['post_time_stamp']);
    }


    /**
     * populate the instance with the provided id if it exists
     * @param string $post_id the id of the post
     */
    public function getPostsByCreator($created_by)
    {
        //array of post objects
        $posts = [];
        //the sql query to execute
        $sql = "SELECT * FROM posts WHERE created_by = ?";
        //prepare the sql for parameters
        $stmt = $this->conn->prepare($sql);
        //set the parameters value
        $stmt->bind_param("s", $created_by);
        //execute the query
        $stmt->execute();
        //get the data as in array
        $results = $stmt->get_result();
        //loop throw the data and create an array of post objects
        while ($row = $results->fetch_assoc()) {
            //create a new instance of post
            $post = new Self();
            //set the data of the post object
            $post->initWith($row['post_id'], $row['post_title'], $row['post_body'], $row['created_by'], $row['post_img'], $row['post_time_stamp']);
            //add the post object to the array
            array_push($posts, $post);
        }
        return $posts;
    }

    /**
     * get all the posts from the database
     * @return Post[] return array of post objects
     */
    static public function getAllPosts()
    {
        //array of post objects
        $posts = [];
        //get the connection of the database
        $conn = Database::getInstance()->getConnection();
        //query the database
        $results = $conn->query("SELECT * FROM posts");
        //loop throw the data and create an array of post objects
        while ($row = $results->fetch_assoc()) {
            //create a new instance of post
            $post = new Self();
            //set the data of the post object
            $post->initWith($row['post_id'], $row['post_title'], $row['post_body'], $row['created_by'], $row['post_img'], $row['post_time_stamp']);
            //add the post object to the array
            array_push($posts, $post);
        }
        return $posts;
    }
}