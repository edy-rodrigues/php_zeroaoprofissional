<?php
namespace Controllers;

use \Core\Controller;
use \Models\Following;
use \Models\User;

class UserController extends Controller {
    public function follow($id_user_passive) {
        if(!empty($_SESSION['twLogin'])) {
            $id_user_passive = addslashes($id_user_passive);
            $id_user_active = $_SESSION['twLogin'];
            $Following = new Following();
            $User = new User($_SESSION['twLogin']);
            if($Following->follow($id_user_active, $id_user_passive)) {
                $_SESSION['script'] = "<script>var toastHTML = '<span>Agora você está seguindo ". ucfirst($User->getName($id_user_passive)) ."</span><a href=\"". BASE_URL ."user/unfollow/". $id_user_passive ."\" class=\"btn-flat toast-action\">Desfazer</a>';
                M.toast({html: toastHTML, classes: 'rounded', outDuration: 700});</script>";
            } else {

            }
        } else {
            header("Location: ". BASE_URL .'login');
        }

        header("Location: ". BASE_URL);
    }

    public function unfollow($id_user_passive) {
        if(!empty($_SESSION['twLogin'])) {
            $id_user_passive = addslashes($id_user_passive);
            $id_user_active = $_SESSION['twLogin'];
            $Following = new Following();
            $User = new User($_SESSION['twLogin']);
            if($Following->unfollow($id_user_active, $id_user_passive)) {
                $_SESSION['script'] = "<script>var toastHTML = '<span>Deixando de seguir ". ucfirst($User->getName($id_user_passive)) ."</span><a href=\"". BASE_URL ."user/follow/". $id_user_passive ."\" class=\"btn-flat toast-action\">Desfazer</a>';
                M.toast({html: toastHTML, classes: 'rounded', outDuration: 700});</script>";
            } else {

            }
        } else {
            header("Location: ". BASE_URL .'login');
        }

        header("Location: ". BASE_URL);
    }
}
?>