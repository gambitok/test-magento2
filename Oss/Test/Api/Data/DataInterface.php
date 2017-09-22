<?php
namespace Oss\Test\Api\Data;

interface DataInterface
{
    /**
     * Constants for keys of data array.
     */
    const DATA_ID           = 'data_id';
    const DATA_TITLE        = 'data_title';
    const DATA_DESCRIPTION  = 'data_description';
    const IS_ACTIVE         = 'is_active';
    const CREATED_AT        = 'created_at';
    const UPDATED_AT        = 'updated_at';

    /**
     * Get ID
     */
    public function getId();

    /**
     * Set ID
     */
    public function setId($id);

    /**
     * Get Data Title
     */
    public function getDataTitle();

    /**
     * Set Data Title
     */
    public function setDataTitle($title);

    /**
     * Get Data Description
     */
    public function getDataDescription();


    /**
     * Set Data Description
     */
    public function setDataDescription($description);


    /**
     * Get is active
     */
    public function getIsActive();


    /**
     * Set is active
     */
    public function setIsActive($isActive);

    /**
     * Get created at
     */
    public function getCreatedAt();

    /**
     * set created at
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated at
     */
    public function getUpdatedAt();

    /**
     * set updated at
     */
    public function setUpdatedAt($updatedAt);
}