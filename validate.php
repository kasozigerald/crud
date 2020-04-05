 <?php
class validate{
    public static $input_err = "";
    public static $name_err = "";
    public static $string_err = "";
    public static $email_err = "";
    public static $digits_err = "";
    public static $tel_err = "";
    public static $comment_err = "";
    public static $password_err = "";
    public static $date_err = "";
    public static $select_err = "";
   //'/^[a-zA-Z0-9\s]+$/'  :letters, numbers and white space... 


        public static function validate_select($e){
            $entry = trim($e);
            if(empty($entry)){
                self::$select_err = "Select one of the options";
            }else{
                return $entry;
            }
        }

   		// Validate name
		   public static function validate_name($e){
        $entry = trim($e);
        if(empty($entry)){
            self::$input_err = "Error: fill all fields in the form";
            return false;
        } elseif(!filter_var($entry, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$/")))){
            self::$name_err = 'Invalid name format';
            return false;
        } else{
           
            return  $entry;
        }   
    }


   		// Validate string
		   public static function validate_string($e){
        $entry = trim($e);
        if(empty($entry)){
            self::$input_err = "Error: fill all fields in the form";
            return false;
        } elseif(!filter_var($entry, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9\s]+$/")))){
            self::$string_err = 'Invalid string entered';
            return false;
        } else{
           
            return  $entry;
        }   
    }



   // Validate number
    public static function validate_digits($e){
    $entry = trim($e);
    if(empty($entry)){
        self::$input_err  = "Error: fill all fields in the form";     
    } elseif(!ctype_digit($entry)){
        self::$digits_err = 'Enter a positive integer value.';
    } else{
        return $entry;
    }
}


	//validate email
    	public static function validate_email($e){
        $entry = trim($e);
        if(empty($entry)){
            self::$input_err = "Error: fill all fields in the form";
        } elseif(!filter_var($entry, FILTER_VALIDATE_EMAIL)){
            self::$email_err = 'Invalid email.';
        } else{
            return  $entry;
        }  
    }

    	// Validate phone number
       public static function validate_phone($e){
        $entry = trim(filter_var($e,FILTER_SANITIZE_NUMBER_INT));
        if(empty($entry)){
            self::$input_err = "Error: fill all fields in the form";
        } elseif(!(strlen($entry) >= 10 && strlen($entry) <= 14 )){
            self::$tel_err = 'Invalid phone number';
            // /^\d{12}$/
        } else{
            return  $entry;
        }  
    }

        // Validate password
        public static function validate_password($e){
        $entry = trim($e);
        if(empty($entry)){
            self::$input_err  = "Error: fill all fields in the form";
        } elseif(!filter_var($entry, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.*(?=.{3,})(?=.*[0-9])(?=.*[a-z]).*$/")))){
            self::$password_err = 'Password should be at least one digit';
        } else{
            return  $entry;
        }  
    }

        // Validate date
    	public static function validate_date($e){
        $entry = trim($e);
        if(empty($entry)){
            self::$input_err = "Error: fill all fields in the form";
        } elseif(!filter_var(entry, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[0-9]{4}-[0-9]{1,2}-[0-9]{1,2}$/")))){
            self::$date_err = 'Date should depict this format "YYYY-MM-DD"';
        } else{
            return  $entry;
        }  
    }

    	        // Validate largetext
       public static function validate_largetext($e){
        $input_name = trim($e);
        if(empty($input_name)){
           self::$input_err = "Error: fill all fields in the form";
        } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^.{1,300}$/")))){
            self::$comment_err = 'Invalid entery';
        } else{
            return  $input_name;
        }  
    }

   public static function errors(){

    if(self::$name_err==="" && self::$string_err==="" && self::$email_err==="" && self::$digits_err==="" && self::$tel_err==="" && self::$comment_err==="" && self::$password_err==="" && self::$date_err==="" && self::$select_err===""){
        
        return true;
    }else{

        return false;
    }
}

//function to display errors
public static function error_log(){
            $err_log = array(self::$input_err,self::$name_err, self::$string_err, self::$email_err,self::$digits_err,self::$tel_err,self::$comment_err,self::$password_err, self::$date_err,self::$select_err);

        foreach($err_log as  $value) {

            if(!empty($value)){
                echo '<p class="text-danger">'.$value.'</p>';
            }else{
                echo "";
            }
            
        }


}

}

class Upload{
    public $name;
    public $tmpName;
    public $size;
    public $error;
    public $type;
    public $ext = [];
    public $sizeLimit;
    public $errorMsg = [];
    public $path;

    public function uploads($e,$s,$p){

                $this->ext = $e;
                $this->sizeLimit = $s;
                $this->path = $p;

                    function f($e){
                        return implode(' / ', $e);
                    }

                $file = $_FILES['file'];

                $this->name = $file["name"];
                $this->tmpName= $file["tmp_name"];
                $this->size = $file["size"];
                $this->error = $file["error"];
                $this->type = $file["type"];

                $ext1 = explode('.', $this->name);
                $ext2 = strtolower(end($ext1));

                if (in_array($ext2, $this->ext)) {

                    // if($this->error === 0){
                        if($this->size < $this->sizeLimit){

                            $finalName = uniqid('',true).".".$ext2;
                            $destFolder = $this->path.$finalName;
                            move_uploaded_file($this->tmpName, $destFolder);
                            return  $destFolder;

                        }else{$this->errorMsg[] = "This file to too big it should be ".$this->sizeLimit." or less";}

                    // }else{$this->errorMsg[] = "An error occured while uploading your file please try again";}
                    
                }else{$this->errorMsg[] = "Invalid file type extension! please choose a file with; ".f($this->ext);}

    }
}



