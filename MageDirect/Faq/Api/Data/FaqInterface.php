<?php

// app/code/[Vendor]/[Module]/Api/Data/FaqInterface.php

namespace MageDirect\Faq\Api\Data;

interface FaqInterface {

    /**
     * Constants for keys of data array.
     */
    const FAQ_ID = 'faq_id';
    const TITLE = 'title';
    const CONTENT = 'content';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const IS_ACTIVE = 'is_active';

    /**
     * Get id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set id
     *
     * @param int $id
     * @return $this
     */
    public function setId($id);

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set title
     *
     * @param string $title
     * @return $this
     */
    public function setTitle($title);

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Set content
     *
     * @param string $content
     * @return $this
     */
    public function setContent($content);

    /**
     * Get created date
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created date
     *
     * @param string $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated date
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated date
     *
     * @param string $updatedAt
     * @return $this
     */
    public function setUpdatedAt($updatedAt);

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return $this
     */
    public function setIsActive($isActive);
}