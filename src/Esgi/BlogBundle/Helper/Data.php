<?php
// src/Esgi/BlogBundle/Helper/Data.php

namespace Esgi\BlogBundle\Helper;

class Data
{
    /**
     * Get post statuses as array
     * @return array $statuses Statuses available for posts
     */
    public function getPostStatuses()
    {
        $statuses = array(
            'Publié' => 'Published',
            'En attente de validation' => 'Pending for validation',
            'Supprimé' => 'Deleted',
        );
        return $statuses;
    }

    /**
     * Get post comments allowed values
     *
     * @return array $values Values for comments allowed's field
     */
    public function getPostCommentsAllowedValues()
    {
        $values = array(
            '0' => 'Authorized',
            '1' => 'Refused',
        );

        return $values;
    }
}