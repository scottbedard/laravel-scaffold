<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthenticationTest extends DuskTestCase
{
    use DatabaseMigrations;

    public function test_creating_an_account()
    {
        $this->browse(function (Browser $browser) {
            $browser
                ->logout()
                ->visit('/register')
                ->type('input[name="name"]', 'Jane Doe')
                ->type('input[name="email"]', 'foo@bar.com')
                ->type('input[name="password"]', 'password')
                ->type('input[name="password_confirmation"]', 'password')
                ->press('button[type="submit"]')
                ->assertRouteIs('home')
                ->assertSee('Jane Doe');
        });
    }

    public function test_logging_into_an_account()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser
                ->logout()
                ->visit('/login')
                ->type('input[name="email"]', $user->email)
                ->type('input[name="password"]', 'password')
                ->press('button[type="submit"]')
                ->assertRouteIs('home')
                ->assertSee($user->name);
        });
    }
}
