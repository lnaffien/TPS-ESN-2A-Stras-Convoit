<?php
/**
 * TODO Auto-generated comment.
 */
class Home_ViewModel
{
    public static function execute()
    {   
        require_once('src/Model/User.php');
        require_once('src/Model/Agenda_manager.php');

        include('src/View/header_connected.php');

        // Load agenda for 7 days starting from the current date
        // TODO : Timezone
        $currentDate = (new \DateTime((string)date('Y-m-d H:i:s')))->setTimezone(new \DateTimeZone('Europe/Paris'));
        $_SESSION['dateSelected'] = $currentDate->format('Y-m-d');
        
        require_once('src/View/home_page.php');
        $calendarFull = Agenda_manager::get_full_agenda($_SESSION['user']->__get('nagenda'));
        $calendarWeek = Agenda_manager::filter_date($calendarFull, $currentDate, 7);
        
        foreach($calendarWeek as $day)
        {
            print_r('Date : ' . $day->__get_date()/*->format('Y-m-d')*/ . "<br/>");
            print_r('Heure de début : ' . $day->__get_start_time()->format('H:i:s') . "<br/>");
            print_r('Heure de fin : ' . $day->__get_end_time()->format('H:i:s') . "<br/>");

            print_r("<br/>");
        }
    }
}
/*
 // Vérification si la variable $_SESSION['error'] est définie
 if(isset($_SESSION['error'])) {
    echo '<p class="error">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']); // Suppression de la variable $_SESSION['error']
}
*/
?>
