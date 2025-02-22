<?php

namespace Todo\Controller;

use Todo\Entity\User;
use Todo\Helper\FlashMessagesTrait;
use Todo\Repository\TaskRepository;
use Todo\Repository\UserRepository;

class UserController
{
    use FlashMessagesTrait;

    #private TaskRepository $taskRepository;
    private UserRepository $userRepository;

    public function __construct(array $repository)
    {
        $this->userRepository = $repository['userRepository'];

    }

    // Renderizar formulários de cadastro e Login
    public function userCadForm(): void
    {
        require_once __DIR__ . '/../../view/register.php';
    }

    public function userLoginForm(): void
    {
        require_once __DIR__ . '/../../view/login.php';
    }
    public function updatePage(): void
    {
        $id = $_GET['id'];
        $userLoggedId = $_SESSION['id'];

        if($id != $userLoggedId){
            header('Location: /profile?id=' . $userLoggedId);
        }


        $user = $this->userRepository->findById($id);

        require_once __DIR__ . "/../../view/profile.php";
    }

    public function updatePWDForm(): void
    {
        require_once __DIR__ . "/../../view/edit-userpwd.php";
    }

    /*
     * Controllers de CRUD:
     * */

    public function deleteUser(): void
    {
        $id = $_GET['id'];

        if($this->userRepository->delete($id)){
            header('Location: /home?sucesso=1');
        } else {
            $this->errorMessages('Erro ao Deletar Usuário');
            header('Location /home');
        }
    }




//    TODO: implementar update de senhas ===============================================================================
    public function updatePWD(): void
    {
        $id = $_SESSION['id'];
        $currentPassword = filter_input(INPUT_POST, 'current_password');
        $password = filter_input(INPUT_POST, 'password');
        $confirm_password =  filter_input(INPUT_POST, 'confirm_password');

        if ($password !== $confirm_password) {
            $this->errorMessages('As senhas não coincidem');
            header("Location: /profile?id=" . $id);
            exit;
        }

        if (!empty($password)) {
            $encrypted = password_hash($password, PASSWORD_BCRYPT);


            if($this->userRepository->updatePWD($id, $encrypted)){
                $_SESSION['update'] = 'Usuário atualizado com sucesso!';
                header('Location: /admin?sucesso=1');
                exit;
            } else {
                $this->errorMessages('Erro ao atualizar a senha');
                header("Location: /profile?id=" . $id);
                exit;
            }
        }
    }



    public function updateUser(): void
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $user = new User($name, $email);

        if($this->userRepository->update($id, $user)){
            $_SESSION['update'] = 'Usuário atualizado com sucesso!';
            header('Location: /profile?id=' . $id);
            exit;
        } else {
            $this->errorMessages('Erro ao atualizar dados do usuário');
            header("Location: /profile?id=" . $id);
            exit;
        }
    }

}
