<?php

function get_users_image($user_id)
    {
        $users = DB::table('users')
            ->where('id', '=', $users_id)
            ->first();

        return $users->user_images;
    }
