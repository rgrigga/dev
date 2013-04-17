<?php
class Notify_Task {

    public function run($arguments)
    {
        return $arguments;
        die("DIE!");// Do awesome notifying...
    }

    public function urgent($arguments)
    {
        // This is urgent!
    }

}