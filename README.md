# Laravel 8
## some tinker commands to generate fake data 
    *  \App\Models\User::factory()->times(3)->create();
    *  \App\Models\BlogPost::factory()->times(10)->create();
    *  \App\Models\Review::factory()->times(20)->create();
    *  $user=\Auth::loginUsingId(1)
    *  \Mail::to($user)->send(new App\Mail\HelloThere);
