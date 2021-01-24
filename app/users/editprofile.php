<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

// $user = $_SESSION['loggedIn'];
if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $username = $_SESSION['loggedIn']['username'];

    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $imageName = $user['username'] . "id" . $user['id'] . ".png";
    $destination = __DIR__ . '/uploads/' . $imageName;

    move_uploaded_file($avatar['tmp_name'], $destination);

    $statement = $pdo->prepare('UPDATE users SET avatar = :image WHERE id = :id');
    $statement->bindParam(':image', $imageName, PDO::PARAM_STR);
    $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
    $statement->execute();
    header('Location: ../../profile.php');
}



if (isset($_POST['password'])) {
    $password = trim(filter_var($_POST['password'], FILTER_SANITIZE_STRING));
    $username = $_SESSION['loggedIn']['username'];

    $statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $_SESSION['noUser'] = "Couldn't find any user with that username";
        header('Location: ../../login.php');
    }

    if (password_verify($password, $user['password'])) {
        //Changing Username
        if (isset($_POST['newUsername']) && $_POST['newUsername'] !== "") {
            $username = trim(filter_var($_POST['newUsername'], FILTER_SANITIZE_STRING));

            if ($username !== $user['username']) {
                $statement = $pdo->prepare('UPDATE users SET username = :username WHERE id = :id');
                $statement->bindParam(':username', $username, PDO::PARAM_STR);
                $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
                $statement->execute();
                // $_SESSION['loggedIn']['username'] = $username;
            }
        }
        //Changing Email
        if (isset($_POST['newEmail']) && $_POST['newEmail'] !== "") {
            $email = trim(filter_var($_POST['newEmail'], FILTER_SANITIZE_EMAIL));

            if ($email !== $user['email']) {
                $statement = $pdo->prepare('UPDATE users SET email = :email WHERE id = :id');
                $statement->bindParam(':email', $email, PDO::PARAM_STR);
                $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
                $statement->execute();
                // $_SESSION['loggedIn']['email'] = $email;
            }
        }
        // Changing Biography
        if (isset($_POST['newBiography']) && $_POST['newBiography'] !== "") {
            $biography = trim(filter_var($_POST['newBiography'], FILTER_SANITIZE_STRING));

            if ($biography !== $user['biography']) {
                $statement = $pdo->prepare('UPDATE users SET biography = :biography WHERE id = :id');
                $statement->bindParam(':biography', $biography, PDO::PARAM_STR);
                $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
                $statement->execute();
                // $_SESSION['loggedIn']['biography'] = $biography;
            }
        }
        // Changing password
        if (isset($_POST['newPassword']) && $_POST['newPassword'] !== "") {
            $password = password_hash(trim(filter_var($_POST['newPassword'], FILTER_SANITIZE_STRING)), PASSWORD_DEFAULT);

            if ($password !== $user['password']) {
                $statement = $pdo->prepare('UPDATE users SET password = :password WHERE id = :id');
                $statement->bindParam(':password', $password, PDO::PARAM_STR);
                $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
                $statement->execute();
                // $_SESSION['loggedIn']['password'] = $password;
            }
        }
        unset($_SESSION['loggedIn']);

        $statement = $pdo->prepare('SELECT * FROM users WHERE id = :id');
        $statement->bindParam(':id', $user['id'], PDO::PARAM_INT);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $_SESSION['loggedIn'] = $user;
        $_SESSION['message'] = "You've successfully updated your profile!";
        header('Location: ../../profile.php');
    } else {
        $_SESSION['errorMessage'] = "Wrong password";
        header('Location: ../../editprofile.php');
    }
}




// if (password_verify($password, $user['password'])) {




//     }
// } else {
//     $_SESSION['errorMessage'] = "Wrong password!";
//     header('Location: ../../editprofile.php');
// }
