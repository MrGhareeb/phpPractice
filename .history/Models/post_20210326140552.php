<?php
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


    //getter and setters

    /**
     * Get the id of the post
     *
     * @return  string
     */
    public function getPost_id()
    {
        return $this->post_id;
    }

    /**
     * Set the id of the post
     *
     * @param  string  $post_id  store the id of the post
     *
     */
    public function setPost_id(string $post_id)
    {
        $this->post_id = $post_id;
    }

    /**
     * Get the title of the post
     *
     * @return  string
     */ 
    public function getPost_title()
    {
        return $this->post_title;
    }

    /**
     * Set the title of the post
     *
     * @param  string  $post_title  store the title of the post
     *
     */ 
    public function setPost_title(string $post_title)
    {
        $this->post_title = $post_title;

    }
}
