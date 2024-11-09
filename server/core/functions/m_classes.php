<?php

    class Seq {

        // Properties
        public $name;
        public $color;

        //database information
        public $__servername;
        public $__username;
        public $__password;
        public $__dbname;
        public $__tbname;

        //form information
        public $__uemail;
        public $__upassword;
        public $__formType;
        public $__conn;

        // Methods
        function __construct($servername, $username, $password, $dbname, $tbname) {

            $this->__servername = $servername;
            $this->__username = $username;
            $this->__password = $password;
            $this->__dbname = $dbname;
            $this->__tbname = $tbname;
            $this->__uemail;// = validate($_POST["email"]);
            $this->__upassword;// = validate($_POST["password"]);
            $this->__formType;// = validate($_POST["formtype"]);
            //echo "<p>Object constructor loaded.</p>";
        }
        
    }

    class Client{

        private $name;
        private $company;
        private $mobile;
        private $regDate;

    }

    class Control{

        private $client_list;

    }


    class MainAdmin{

        private $userName = "ADMIN";
        private $password = "ADMIN";
        private $uniqueID;
        private $name = "ADMIN";
        private $company_name;

    }

    class User{

        private $name;
        private $password;
        private $uniqueID;
        private $admin = false;
        private $bank = false;
        private $bio = "Write your bio";
        private $cover = "https://image.freepik.com/free-vector/cute-astronaut-working-laptop-cartoon-vector-icon-illustration_138676-3472.jpg";
        private $email = "mhd1@gmail.com";
        private $pfp = "https://image.freepik.com/free-vector/cute-astronaut-working-laptop-cartoon-vector-icon-illustration_138676-3472.jpg";
        private $phone = "0915227784";
        private $token = null;
        private $uId = "2MFdr0QjKKPYSTCtP5oVUdqplz83";

    }

    class Admin extends User{

    }

    class Group{

        private $admin  ="2MFdr0QjKKPYSTCtP5oVUdqplz83";
        private $members =  ["2MFdr0QjKKPYSTCtP5oVUdqplz83", "RGWVuYDao1dOxxV0qBNlorRkT1e2"];
        private $name = "mhd";

    }

    class Post{

        private $publishDate = "3 November 2021 at 15:19:40 UTC+2";
        private $userImage = "https://firebasestorage.googleapis.com/v0/b/erp-system-71ca9.appspot.com/o/users%2Fimage_picker3253471874502410856.jpg?alt=media&token=9bf85413-5531-479c-a71b-8f9248fd43ec";
        private $userName="Mahmoud Eshelli";
        private $postImage="https://firebasestorage.googleapis.com/v0/b/erp-system-71ca9.appspot.com/o/posts%2Fimage_picker9019192437655024795.jpg?alt=media&token=43881857-89c3-4e5f-8e2b-bf0c70c7fa1c";
        private $content="hi";
        private $uId="WP3k0m7oFMfnSbvjtm4gamSrcif1";

    }

    class Task{

        private $adminName = "Mahmoud Eshelli";
        private $adminImage = "https://firebasestorage.googleapis.com/v0/b/erp-system-71ca9.appspot.com/o/users%2Fimage_picker3253471874502410856.jpg?alt=media&token=9bf85413-5531-479c-a71b-8f9248fd43ec";
        private $publishDate = "3 November 2021 at 15:54:10 UTC+2";

        private $is_deleted = false;
        private $is_complete = true;
        private $is_selected = true;

        private $groupName = "mhd";
        private $postImage = "";

        private $taskTitle = "اهلا";
        private $taskDesc = "وااابيبن";
        //IDs
        private $uId = "WP3k0m7oFMfnSbvjtm4gamSrcif1";
        private $uIdAdmin = "WP3k0m7oFMfnSbvjtm4gamSrcif1";
        private $uIdGroup = "zlK3YBCOnQK6J5uZNs5t";

    }

?>
