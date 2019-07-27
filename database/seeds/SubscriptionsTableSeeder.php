<?php

use Infrastructure\Subscriptions\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subs = factory(Subscription::class, 2)->create();
    }
}
