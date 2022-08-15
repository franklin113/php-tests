<?php 

  class Message {
    public $message;
    public function __construct($message) {
      $this->message = $message;
    }
    public function writeToFile($filename) {
      file_put_contents($filename, $this->message);
    }
    static function readMessageFromFile($filename) {
      // $file = fopen($filename, 'r');
      return file_get_contents($filename);
    }
  }

  class FB_Message extends Message {
    public $targetOp;
    public $sourceNode;

    public function __construct($message) {
      $this->message = $message;
      // check if valid json
    
      try {
        $jsonData = json_decode($message);
        $this->targetOp = $jsonData->targetOp;
        $this->sourceNode = $jsonData->sourceNode;
      }
      catch(\Throwable $th) {
        echo "Error: " . $th;
      }
    }
  }

  $message = new Message("Hello World");
  $fbMessage = new FB_Message('{"targetOp":"target","sourceNode":"source"}');

  $fileMessage = Message::readMessageFromFile("message.txt");
  $message2 = new Message($fileMessage);
  
  echo $fileMessage;


  $bothMessages = [$message, $fbMessage];



  // foreach ($bothMessages as $msg) {
  //   echo $msg->message;
  // }
?>