<?
function postNotifications()
{
    return App\Models\PostNotification::orderBy('id', 'desc')->take(3)->get();
}
