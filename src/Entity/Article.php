<?php
namespace Entity;

/**
 * Article
 * 
 * @Table()
 * @Entity() 
 */
class Article 
{
    /**
     * @var integer
     *
     * @Column(name="id", type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @Column(name="title", type="string", length=255)
     */
    protected $title;

    /**
     * @var string
     *
     * @Column(name="slug", type="string", length=255, unique=true)
     */
    protected $slug;

    /**
     * @var string
     *
     * @Column(name="excerpt", type="text")
     */
    protected $excerpt;

    /**
     * @var string
     *
     * @Column(name="image", type="string", length=255)
     */
    protected $image;

    /**
     * @var string
     *
     * @Column(name="content", type="text")
     */
    protected $content;

    /**
     * @var \DateTime
     *
     * @Column(name="date_creation", type="datetime")
     */
    protected $dateCreation;

    /**
     * @var \DateTime
     *
     * @Column(name="date_publication", type="datetime")
     */
    protected $datePublication;

    /**
     * @var \DateTime
     *
     * @Column(name="date_update", type="datetime", nullable=true)
     */
    protected $dateUpdate;

    /**
     * @var integer
     *
     * @Column(name="status", type="integer")
     */
    protected $status;

    /**
     * @var string
     *
     * @Column(name="video", type="string", length=255, nullable=true)
     */
    protected $video;

    /**
     * @var boolean
     *
     * @Column(name="home_push", type="boolean", nullable=true)
     */
    protected $homePush;

    /**
     * @var integer
     *
     * @Column(name="home_push_order", type="integer", nullable=true)
     */
    protected $homePushOrder;

    /**
     * @var string
     *
     * @Column(name="lang", type="string", length=2)
     */
    protected $lang;

    /**
     * Construct
     */
    public function __construct(){
        $this->dateCreation = new \DateTime();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set excerpt
     *
     * @param string $excerpt
     * @return Article
     */
    public function setExcerpt($excerpt)
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    /**
     * Get excerpt
     *
     * @return string 
     */
    public function getExcerpt()
    {
        return $this->excerpt;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Article
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Article
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateCreation
     *
     * @param \DateTime $dateCreation
     * @return Article
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get dateCreation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set datePublication
     *
     * @param \DateTime $datePublication
     * @return Article
     */
    public function setDatePublication($datePublication)
    {
        $this->datePublication = $datePublication;

        return $this;
    }

    /**
     * Get datePublication
     *
     * @return \DateTime 
     */
    public function getDatePublication()
    {
        return $this->datePublication;
    }

    /**
     * Set dateUpdate
     *
     * @param \DateTime $dateUpdate
     * @return Article
     */
    public function setDateUpdate($dateUpdate)
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * Get dateUpdate
     *
     * @return \DateTime 
     */
    public function getDateUpdate()
    {
        return $this->dateUpdate;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Article
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set video
     *
     * @param string $video
     * @return Article
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return string 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set homePush
     *
     * @param boolean $homePush
     * @return Article
     */
    public function setHomePush($homePush)
    {
        $this->homePush = $homePush;

        return $this;
    }

    /**
     * Get homePush
     *
     * @return boolean 
     */
    public function getHomePush()
    {
        return $this->homePush;
    }

    /**
     * Set homePushOrder
     *
     * @param integer $homePushOrder
     * @return Article
     */
    public function setHomePushOrder($homePushOrder)
    {
        $this->homePushOrder = $homePushOrder;

        return $this;
    }

    /**
     * Get homePushOrder
     *
     * @return integer 
     */
    public function getHomePushOrder()
    {
        return $this->homePushOrder;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return Article
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string 
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Article
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}
