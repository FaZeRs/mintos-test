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

        $popularWords = [];
        $ignoredWords = $this->ignoredWords();
        foreach($feedItems as $item) {
            $string = $item['description'];
            $words = $this->most_frequent_words($string, $ignoredWords, str_word_count($string));
            foreach($words as $i => $k){
                if(isset($popularWords[$i])) {
                    $popularWords[$i] += $k;
                } else {
                    $popularWords[$i] = $k;
                }
            }
        }
        arsort($popularWords);

        return Inertia::render('Dashboard/Index', [
            'feedItems' => $feedItems,
            'popularWords' => array_slice($popularWords, 0, 10),
        ]);
    }

    protected function most_frequent_words($string, $stop_words = [], $limit = 10) {
        $string = strtolower($string); // Make string lowercase

        $words = str_word_count($string, 1); // Returns an array containing all the words found inside the string
        $words = array_diff($words, $stop_words); // Remove black-list words from the array
        $words = array_count_values($words); // Count the number of occurrence

        arsort($words); // Sort based on count

        return array_slice($words, 0, $limit); // Limit the number of words and returns the word array
    }

    protected function ignoredWords(): array
    {
//         Get 50 most common words
//        $html = view()->make('https://en.wikipedia.org/wiki/Most_common_words_in_English')->render();
//        $html = file_get_contents('https://en.wikipedia.org/wiki/Most_common_words_in_English');
//        $dom = new \DOMDocument;
//        $dom->loadHTML($html);
//        $dom->preserveWhiteSpace = false;
//        $tables = $dom->getElementsByTagName('table');
//        $rows = $tables->item(0)->getElementsByTagName('tr');
//        $records = collect($rows)->slice(0, 51)->all();
//        $array = [];
//        foreach ($records as $row) {
//            $cols = $row->getElementsByTagName('td');
//            if ($cols->item(0)) {
//                $array[] = $cols->item(0)->nodeValue;
//            }
//        }
//        dd($array);

        return [
            "the",
            "be",
            "to",
            "of",
            "and",
            "a",
            "in",
            "that",
            "have",
            "I",
            "it",
            "for",
            "not",
            "on",
            "with",
            "he",
            "as",
            "you",
            "do",
            "at",
            "this",
            "but",
            "his",
            "by",
            "from",
            "they",
            "we",
            "say",
            "her",
            "she",
            "or",
            "an",
            "will",
            "my",
            "one",
            "all",
            "would",
            "there",
            "their",
            "what",
            "so",
            "up",
            "out",
            "if",
            "about",
            "who",
            "get",
            "which",
            "go",
            "me",
        ];
    }
}
