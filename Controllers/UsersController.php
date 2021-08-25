<?php

namespace App\Controllers;

use App\Entities\User;
use App\Models\UserModel;

class UsersController extends Controller
{
    public function login()
    {
        $error = "";

        if (isset($_POST['submited'])) {


            $user = new User();

            $user->setUserEmail($_POST['email']);
            $user->setUserPassword($_POST['password']);

            $userModel = new UserModel();

            $databaseUser = $userModel->getUserByEmail($user->getUserEmail());

            if ($databaseUser) {
                $theUser = new User();

                $theUser->setUserId($databaseUser->user_id);
                $theUser->setUserUsername($databaseUser->user_username);
                $theUser->setUserIsAdmin($databaseUser->user_isAdmin);
                $theUser->setUserEmail($databaseUser->user_email);
                $theUser->setUserPassword($databaseUser->user_password);

                if (password_verify($user->getUserPassword(), $theUser->getUserPassword())) {

                    $theUser->setUserPassword("");
                    $_SESSION['user'] = $theUser;

                    header("Location: index.php?controller=films&action=filmList");
                } else {
                    $error = "Wrong credentials";
                }
            } else {
                $error = "Wrong credentials";
            }
        }


        $this->render('users/login', ["error" => $error], "usersAuth");
    }
    public function signup()
    {
        $error = "";

        if (isset($_POST['submited'])) {
            $user = new User();

            var_dump($_POST);
            $user->setUserIsAdmin(false);
            $user->setUserUsername($_POST['username']);
            $user->setUserEmail($_POST['email']);

            $hsdPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->setUserPassword($hsdPassword);

            $userModel = new UserModel();

            $exists = $userModel->getUserByEmail($user->getUserEmail());
            if ($exists) {
                $error = "It alredy exists an account using this email";
            } else {
                if ($userModel->createUser($user)) {

                    $_SESSION['user'] = $user;
                    
                    header("Location: index.php?controller=films&action=filmList");
                    return;
                }
                $error = "Error creating user";
            }
        }

        $this->render('users/signup', ["error" => $error], "usersAuth");
    }
}
