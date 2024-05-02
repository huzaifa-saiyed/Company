<?php

namespace Kitchen\Company\Api;


interface CustomInterface
{

/**
 * @return array
 */
    public function getCustomer();



    /**
     * @param string $name
     * @param string $desc
     * @param int $is_active
     * @param int $a_id
     * @return string
     */
    public function postCustomer($name, $desc, $is_active, $a_id);

    /**
     * @param int $id
     * @param string $name
     * @param string $desc
     * @param int $is_active
     * @param int $a_id
     * @return string
     */
    public function putCustomer($id, $name, $desc, $is_active, $a_id);

    /**
     * @param int $id
     * @return string
     */
    public function delCustomer($id);




}