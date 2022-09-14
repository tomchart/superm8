<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use DOMDocument;
use DOMXPath;

class Cse implements EbertApi
{
    public function searchTitle(String $title)
    {
        // search for an ebert review for $title 
        $response = Http::get(config('services.cse.base_uri'), [
            'cx' => config('services.cse.cx'),
            'key' => config('services.cse.key'),
            'q' => $title,
        ]);

        // get body of first result's link
        $link = $response->object()->items[0]->link;
        $ebertResponse = Http::get($link);
        $ebertBody = $ebertResponse->body();

        // create DOMDocument of body of ebert review
        $ebertDOM = new DOMDocument('1.0', 'UTF-8');
        $internalErrors = libxml_use_internal_errors(true);
        $ebertDOM->loadHTML($ebertBody);
        libxml_use_internal_errors($internalErrors);

        // search for main star rating in DOM
        $finder = new DOMXPath($ebertDOM);
        $classname="star-rating _large";
        $nodes = $finder->query("//*[contains(concat(' ', normalize-space(@class), ' '), ' $classname ')]");
        $tmp_dom = new DOMDocument(); 
        $innerHTML = null;
        foreach ($nodes as $node) 
            {
            $tmp_dom->appendChild($tmp_dom->importNode($node,true));
            }
        $innerHTML.=trim($tmp_dom->saveHTML());

        // count rating from full & half stars
        $fullStars = substr_count($innerHTML, "icon-star-full");
        $halfStars = substr_count($innerHTML, "icon-star-half");
        if ($halfStars) {
          $ebertRating = $fullStars + 0.5;
        } else {
          $ebertRating = $fullStars;
        }
        return [$link, $ebertRating];
    }
}
