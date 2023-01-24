<?php
function is_logged_in()
{
    $ci = get_instance();
    $session = $ci->session->userdata();
    if (!$session['session']) {
        redirect('Login');
    }
}
