<?php
class menbre
{

    protected $password;

    public function setPassword($n)
    {
        $this->password = hash('sha512', $n);
    }
    public function getPassword()
    {
        return $this->password;
    }
}
