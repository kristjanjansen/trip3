<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

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
            $browser
                ->visit("/")
                ->assertTitleContains("Trip.ee")
                ->waitForTextIn("@nav", "Trip.ee");
        });
    }
}
