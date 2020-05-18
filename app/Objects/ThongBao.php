<?php
namespace App\Objects;

class ThongBao {
	protected $id;	
	protected $img;
	protected $title;
	protected $content;
	protected $quote;


    /**
     * Class Constructor
     * @param    $id   
     * @param    $img   
     * @param    $title   
     * @param    $content   
     * @param    $quote   
     */
    public function __construct($id, $img, $title, $content, $quote)
    {
        $this->id = $id;
        $this->img = $img;
        $this->title = $title;
        $this->content = $content;
        $this->quote = $quote;
    }


    /**
     * @return mixed
     */
    public function getQuote()
    {
        return $this->quote;
    }

    /**
     * @param mixed $quote
     *
     * @return self
     */
    public function setQuote($quote)
    {
        $this->quote = $quote;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * @param mixed $img
     *
     * @return self
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     *
     * @return self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}