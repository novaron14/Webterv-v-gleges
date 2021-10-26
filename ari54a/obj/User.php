<?php


class User
{
    private $db;
    private $email = "";
    private $password = "";
    private $name = "";
    private $birth = "";
    private $address = "";
    private $orders = "";
    private $profile_picture;

    public function __construct($userdata)
    {
        $this->db = new UserDatabaseHandler();
        $this->email = $userdata[0];
        $this->password = $userdata[1];
        $this->name = $userdata[2];
        $this->birth = $userdata[3];
        $this->orders = $userdata[4];
        $this->address = $userdata[5];
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getBirth()
    {
        return $this->birth;
    }

    public function getOrders()
    {
        if($this->orders == "") return false;
        return explode("|", $this->orders);
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function getProfilePicture()
    {
        $imageFileTypes = array(".jpg", ".jpeg", ".png");
        $image = "img/profilepics/default.png";
        $isFirst = true;

        foreach ($imageFileTypes as $imageFileType){
            $current = "img/profilepics/" . $this->getName() . $imageFileType;
            if(file_exists($current)){
                if($isFirst) {
                    $image = $current;
                    $isFirst = false;
                }
                else unlink($current);
            }
        }
        return $image;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        $this->db->update($this);
    }

    public function setBirth($birth)
    {
        $this->birth = $birth;
        $this->db->update($this);
    }

    public function setAddress($address)
    {
        $this->address = $address;
        $this->db->update($this);
    }

    public function setProfilePicture($profile_picture)
    {
        $this->profile_picture = $profile_picture;
        $this->db->update($this);
    }

    public function addOrder($id, $date, $total) {
        $this->orders .= ($this->orders == "" ? "" : "|") . join("-", array($id, $date, $total));
        $this->db->update($this);
    }
}
