<?php
namespace Lufficc\Post;

use App\Post;


trait PostHelper
{
    /**
     * onPostShowing, clear this post's unread notifications.
     *
     * @param Post $post
     */
    public function onPostShowing(Post $post)
    {
        $user = auth()->user();
        if (!isAdmin($user)) {
            $post->increment('view_count');
        }
        if (auth()->check()) {
            $unreadNotifications = $user->unreadNotifications;
            foreach ($unreadNotifications as $notifications) {
                $comment = $notifications->data;
                if ($comment['commentable_type'] == 'App\Post' && $comment['commentable_id'] == $post->id) {
                    $notifications->markAsRead();
                }
            }
        }
    }
}