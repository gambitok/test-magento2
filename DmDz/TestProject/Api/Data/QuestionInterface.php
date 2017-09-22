<?php

namespace DmDz\TestProject\Api\Data;

interface QuestionInterface
{

/* User information
*/

    //Id
    public function getId();

    public function setId($id);

    //Name
    public function getName();

    public function setName($name);

    //Email
    public function getEmail();

    public function setEmail($email);

    //Phone
    public function getTelephone();

    public function setTelephone($telephone);

    //Commment
    public function getComment();

    public function setComment($comment);

}