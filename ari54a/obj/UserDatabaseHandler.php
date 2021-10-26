<?php


class UserDatabaseHandler
{
    private $path;

    public function __construct()
    {
        $this->path = "../data/users.csv";
    }


    private function find($email) {
        $file = fopen($this->path, "r");
        for($i = 0; ($line = fgets($file)) !== false; $i++)
            if (explode(";", $line)[0] === $email) {
                fclose($file);
                return $line;
            }
        return "false";
    }

    public function load($email) {
        $line = $this->find($email);
        return new User(explode(";", $line));
    }

    public function update(User $user) {
        $line = $this->find($user->getEmail());

        $contents = file_get_contents($this->path);
        $contents = str_replace($line, join(";", array($user->getEmail(), $user->getPassword(),
                                                        $user->getName(), $user->getBirth(),
                                                        join("|",$user->getOrders()),
                                                        $user->getAddress())), $contents);
        file_put_contents($this->path, $contents);
    }
}