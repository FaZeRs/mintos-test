<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use SimplePie;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $feed = new SimplePie();
        $feed->set_item_class();
        $feed->enable_cache(true);
        $feed->set_cache_duration(3600);
        $feed->set_cache_location(storage_path('framework/cache'));
        $feed->set_feed_url('https://www.theregister.co.uk/software/headlines.atom');
        $feed->init();
        $feed->handle_content_type();

        $feedItems = collect($feed->get_items())->map(function (\SimplePie_Item $item) {
            return [
                'title' => $item->get_title(),
                'description' => strip_tags($item->get_description()),
                'date' => Carbon::parse($item->get_date())->diffForHumans(),
                'link' => $item->get_link(),
            ];
        });

        return Inertia::render('Dashboard/Index', [
            'feedItems' => $feedItems
        ]);
    }
}
