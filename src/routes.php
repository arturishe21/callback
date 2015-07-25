<?php

if (Request::ajax()) {
    Route::post('/callback/send', array(
            'uses' => 'Vis\Callback\CallbackController@doSend')
    );
}