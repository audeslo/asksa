<?php
/**
 * Created by IntelliJ IDEA.
 * User: Anselme. H
 * Date: 04/12/2019
 * Time: 08:16
 */

namespace App\Entity;


class ShowroomSearch
{

    private $showroom;

    /**
     * @return int|null
     */
    public function getShowroom(): ?int
    {
        return $this->showroom;
    }

    /**
     * @param int|null $showroom
     * @return ShowroomSearch
     */
    public function setShowroom( $showroom): ShowroomSearch
    {
        $this->showroom = $showroom;
        return $this;
    }
}