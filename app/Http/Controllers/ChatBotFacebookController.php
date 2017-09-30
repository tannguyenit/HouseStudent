<?php

namespace App\Http\Controllers;

use App\Conversations\ExampleConversation;
use BotMan\BotMan\BotMan;

// use BotMan\BotMan\Messages\Attachments\Image;
// use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;

class ChatBotFacebookController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');
        $botman->hears('{slug}', function ($bot, $slug) {
            // $url = "https://api.giphy.com/v1/gifs/random?api_key=a89c66e48519481ab448a3f8356e635c&tag=" . $slug;

            // $resp_json  = file_get_contents($url);
            // $resp       = json_decode($resp_json, true);
            // $url        = $resp['data']['image_original_url'];
            // $attachment = new Image($url, ['custom_payload' => true]);
            // $message    = OutgoingMessage::create('This is my text')->withAttachment($attachment);
            $bot->reply($slug);
            // $bot->reply(ButtonTemplate::create('Do you want to know more about BotMan?')
            //         ->addButton(ElementButton::create('Tell me more')->type('postback')->payload('tellmemore'))
            //         ->addButton(ElementButton::create('Show me the docs')->url('http://botman.io/')));
        });
        $botman->listen();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }

    /**
     * Loaded through routes/botman.php
     * @param  BotMan $bot
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new ExampleConversation());
    }
}
