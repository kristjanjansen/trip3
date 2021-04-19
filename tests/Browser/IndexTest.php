<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

// @TODO https://protone.media/en/blog/a-package-for-laravel-dusk-to-wait-for-inertiajs-events?ref=laravelnews
// @TODO https://laravel.com/docs/8.x/dusk#running-tests-on-github-actions

class IndexTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testIndex()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->pause(2000)
                ->assertSourceHas('Uudised');
        });
    }
}
