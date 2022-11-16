<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\Contact\StoreRequest;
use DateTime;

class ContactService
{
    protected $contactRequest;
    //TODO: refaktoring

    public function sendContact(StoreRequest $contactStoreRequest)
    {
        $this->contactRequest = $contactStoreRequest;
        $this->sendMail();
        $this->sendToTelegram();
    }

    public function sendMail()
    {
        $date = new DateTime();
        $date_for_name = $date->format('Y_m_d');
        $to = "<".config( 'app.mail_for_spam_to' ).">";
        $subject = "Formularz kontaktowy – ".config('url_of_page')." - ".htmlspecialchars($this->contactRequest->company);

        $message = "
					<html>
					<head>
					 <title>Formularz kontaktowy – ".config('url_of_page')." - ".htmlspecialchars($this->contactRequest->company)."</title>
					</head>
					<body>
					<p>
<b>Firma:</b> ".htmlspecialchars($this->contactRequest->company)."<br>
<b>Imię, nazwisko:</b> ".htmlspecialchars($this->contactRequest->name)."<br>
<b>E-mail:</b> ".htmlspecialchars($this->contactRequest->email)."<br>
<b>Tel:</b> ".htmlspecialchars($this->contactRequest->phone)."<br>
<b>Miasto:</b> ".htmlspecialchars($this->contactRequest->city)."<br>
<b>Treść:</b> ".htmlspecialchars($this->contactRequest->description)."<br>
                     </p>
					<br>
					</body>
					</html>";

        /* Для отправки HTML-почты вы можете установить шапку Content-type. */
        $headers= "MIME-Version: 1.0"."\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8"."\r\n";
        $headers .= "Content-Transfer-Encoding: base64" . "\r\n";

        $headers .= "From:  <".config( 'app.mail_for_spam_from' ).">"."\r\n";
        try {
            mail($to, $subject, base64_encode($message), $headers);
        }
        catch (\Exception $e)
        {
            $file = public_path('errors_contact\\'.rand().'_'.$date_for_name.'.txt');
            file_put_contents($file, $message);
        }
    }

    private function sendToTelegram()
    {
        try {
            $messageTg = new Collection();
            $messageTg->message = htmlspecialchars($this->contactRequest->description);
            $messageTg->name = htmlspecialchars($this->contactRequest->name);
            $messageTg->company = htmlspecialchars($this->contactRequest->company);
            $messageTg->email = htmlspecialchars($this->contactRequest->email);
            $messageTg->phone = htmlspecialchars($this->contactRequest->phone);
            $messageTg->city = htmlspecialchars($this->contactRequest->city);
            (new TelegramService)->sendContact($messageTg);
        }
        catch (\Exception $e)
        {
            //TODO : tg exception
        }
    }
}