<?php
namespace Vis\Callback;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Response;

use Vis\MailTemplates\MailT;

class CallbackController extends Controller
{

    public function doSend()
    {
        parse_str(Input::get('filds'), $data);

        $rules['phone_callback'] = 'required';

        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Response::json(
                    array(
                        "status"=>"error",
                        "errors_messages"=>$validator->messages()
                    ));
        }

        $mail = new MailT(Config::get('callback::config.template_mail'), $data);
        $mail->to = Config::get('callback::config.email_send');
        $mail->send();

        return Response::json(
            array(
                "status"=>"success",
                "text"=>"Спасибо. Скоро с Вами свяжуться "
            ));
    }
}