<?php

    // function emptyInputRegister($uname, $email, $pwd, $pwdrepeat) {
    //     $result = false;
    //     if (empty($uname) || empty($email) || empty($pwd) || empty($pwdrepeat)) {
    //         $result = true;
    //     }
    //     else {
    //         $result = false;
    //     }

    //     return $result;
    // }

    function invalidUsername($uname) {
        $result = false;
        if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/" , $uname)) {
            $result = true;
        }
        else {
            $result = false;
        }

        return $result;
    }

    function invalidEmail($email) {
        $result = false;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        else {
            $result = false;
        }
        
        return $result;
    }

    function pwdMatch($pwd, $pwdrepeat) {
        $result = false;
        if ($pwd !== $pwdrepeat) {
            $result = true;
        }
        else {
            $result = false;
        }
        
        return $result;
    }

    function usernameExists($conn, $uname) {
        
        $sql = "SELECT username FROM users WHERE username = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=stmtfailed");
			exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $uname);
		mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }

        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    function EmailExists($conn, $email) {
        
        $sql = "SELECT username FROM users WHERE user_email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=stmtfailed");
			exit();
        }

        mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }

        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    function UnameEmailBothExist($conn, $uname, $email) {
        
        $sql = "SELECT * FROM users WHERE username = ? OR user_email = ?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=stmtfailed");
			exit();
        }

        mysqli_stmt_bind_param($stmt, "ss", $uname, $email);
		mysqli_stmt_execute($stmt);

        $resultData = mysqli_stmt_get_result($stmt);
        
        if ($row = mysqli_fetch_assoc($resultData)) {
            return $row;
        }

        else {
            $result = false;
            return $result;
        }

        mysqli_stmt_close($stmt);

    }

    function createUser($conn, $uname, $email, $pwd) {
        
        $sql = "INSERT INTO users (username, user_email, user_pwd) VALUES (?, ?, ?);";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../register.php?error=stmtfailed");
			exit();
        }

        $pwdhashed = password_hash($pwd, PASSWORD_DEFAULT);

		mysqli_stmt_bind_param($stmt, "sss", $uname, $email, $pwdhashed);
		mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../register.php?error=none");
	    exit();
    }

    // function emptyInputLogin($uname, $pwd) {
    //     $result = false;
    //     if (empty($uname) || empty($pwd)) {
    //         $result = true;
    //     }
    //     else {
    //         $result = false;
    //     }

    //     return $result;
    // }

    function loginUser($conn, $uname, $pwd) {
        $UnameEmailBothExist = UnameEmailBothExist($conn, $uname, $uname);

        if($UnameEmailBothExist === false) {
            header("Location: ../login.php?error=wrongusernameoremail");
            exit();
        }

        $pwdhashed = $UnameEmailBothExist["user_pwd"];
        $checkpwd = password_verify($pwd, $pwdhashed);

        if ($checkpwd === false) {
            header("Location: ../login.php?error=wrongpassword");
            exit();
        }
        else if ($checkpwd === true) {
            if(isset($_POST['remember'])) {
                setcookie("uname", "username", time() + 60);
            }
            session_start();
            $_SESSION["uid"] = $UnameEmailBothExist["user_id"];
            $_SESSION["uname"] = $UnameEmailBothExist["username"];
            header("Location: ../userloggedin.php");
            exit();
        }
    }

?>