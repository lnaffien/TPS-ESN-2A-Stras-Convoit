<?php

// TODO : Vérifier le format des informations côté client
/*
 * js = client, php = serveur
 */

if(isset($_POST['action_login_submit']))
{
    if(Login_ViewModel::check_login())
    {
        print("<form id='form' name='back_to_index_form' action='index.php' method='POST'>
                    <input type='hidden' name='action' value='homepage'>
                </form>
                <script type='text/javascript'>
                    document.back_to_index_form.submit();
                </script>
            ");
    }
}

// TODO
class Login_ViewModel
{
    // TODO
    public static function execute()
    {
        include('src/View/header_anonymous.php');
        require_once('src/View/login_page.php');
    }

    public static function check_login()
    {

        // Get data from the form
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = filter_input(INPUT_POST, 'mdp', FILTER_DEFAULT);

        // Check mail format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $_SESSION['error'] = 'Mail : Incorrect format.';
            return false;
        }

        // Fetch user data
        require_once('src/Model/Database_manager.php');
        $user_data = Database_manager::get_data('UTILISATEUR', '*', "WHERE email=\"$email\"");

        // Check if the given email is associated to an existing user
        if($user_data->rowcount() == 0)
        {
            $_SESSION['error'] = 'Unknown user, please register.';
            return false;
        }
        
        // Transforms SQL result into an array
        $user_row_data = $user_data->fetch(\PDO::FETCH_ASSOC);

        // Check if the password is correct
        if(!password_verify($password, $user_row_data['motDePasse']))
        {
            $_SESSION['error'] = 'Incorrect email or password.';
            return false;
        }

        // Store logged user info into cookies
        require_once('src/Model/User.php');
        $user = new User($user_row_data['idUser'],
                            $user_row_data['nom'],
                            $user_row_data['prenom'], 
                            $user_row_data['email'],
                            $user_row_data['telephone'],
                            $user_row_data['nagenda'],
                            null);
        $_SESSION['user'] = $user;

        return true;

       // unset($_SESSION['user']);
    }

}

/*
                    // Vérification si la variable $_SESSION['error'] est définie
                    if(isset($_SESSION['error'])) {
                        echo '<p class="error">' . $_SESSION['error'] . '</p>';
                        unset($_SESSION['error']); // Suppression de la variable $_SESSION['error']
                    }*/
?>