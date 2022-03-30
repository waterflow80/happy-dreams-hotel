<?php

/**This class contains information about saving user attempt result. */ 
class Save {
    private $saved;
    private $stateMessage;


    public function __construct($saved, $stateMessage)
    {
        $this->saved = $saved; 
        $this->stateMessage = $stateMessage;
    }

    public function setSaved($saved){
        $this->saved = $saved;
    }

    public function setStateMessage($stateMessage){
        $this->stateMessage = $stateMessage;
    }

    public function isSaved(){
        return $this->saved;
    }

    public function getStateMessage(){
        return $this->stateMessage;
    }
}
 
?>