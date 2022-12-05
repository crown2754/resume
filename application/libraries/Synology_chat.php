<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Synology_chat
{

    public $synology_basrurl = "https://cs.jinzdm.com/webapi/entry.cgi?api=SYNO.Chat.External&method=incoming&version=2&token=";

    function getBr()
    {
        return '
';
    }

    function sendToJscAll($text)
    {
        $token = '%223VtlFQou4KjuCCVWll1xEbHnzSc6XByw6HESauN5Wzcds6b3i5LY16g3tTNrABUA%22';
        $this->singlCurl($text, $token);
    }

    function sendToJscMidea($text)
    {
        $token = '%228vJsOmtHAgby8DHlb6Nc2DbCUbw55yQsz7UWg6lbghXc0yrFhhdi5990YBjRJQF7%22';
        $this->singlCurl($text, $token);
    }

    function sendToJscSocial($text)
    {
        $token = '%22pxmNuerPlgXtGrl9DRErR4dnrvC8G6Fl1cuq3gX9U1oD2vetCsRNCOMGlBVYzxEa%22';
        $this->singlCurl($text, $token);
    }

    function sendToJscSystem($text)
    {
        $token = '%227KwEaWyQosq1xaEfQssg7uRiiNZqwHTGEjv4rTPFjadK0q1oSCGnZxWNBhR3BTC7%22';
        $this->singlCurl($text, $token);
    }


    function sendToJscAllAndSystem($text)
    {
        $tokens = array(
            '1' => '%223VtlFQou4KjuCCVWll1xEbHnzSc6XByw6HESauN5Wzcds6b3i5LY16g3tTNrABUA%22',
            '0' => '%227KwEaWyQosq1xaEfQssg7uRiiNZqwHTGEjv4rTPFjadK0q1oSCGnZxWNBhR3BTC7%22'
        );
        $this->multipleCurl($text, $tokens);
    }

    function sendToJscAllAndMidea($text)
    {
        $tokens = array(
            '0' => '%228vJsOmtHAgby8DHlb6Nc2DbCUbw55yQsz7UWg6lbghXc0yrFhhdi5990YBjRJQF7%22',
            '1' => '%223VtlFQou4KjuCCVWll1xEbHnzSc6XByw6HESauN5Wzcds6b3i5LY16g3tTNrABUA%22'
        );
        $this->multipleCurl($text, $tokens);
    }

    function sendToJscAllAndSocial($text)
    {
        $tokens = array(
            '0' => '%22pxmNuerPlgXtGrl9DRErR4dnrvC8G6Fl1cuq3gX9U1oD2vetCsRNCOMGlBVYzxEa%22',
            '1' => '%223VtlFQou4KjuCCVWll1xEbHnzSc6XByw6HESauN5Wzcds6b3i5LY16g3tTNrABUA%22'
        );
        $this->multipleCurl($text, $tokens);
    }

    function singlCurl($text, $token)
    {
        $url = $this->synology_basrurl . $token;
        $data = 'payload=' . json_encode(["text" => $text]);
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-type: application/json"));
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_exec($curl);
        curl_close($curl);
    }

    function multipleCurl($text, $tokens)
    {
        for ($i = 0; $i < count($tokens); $i++) {
            $url = $this->synology_basrurl . $tokens[$i];
            $header = array("Content-type: application/json");
            $data = 'payload=' . json_encode(["text" => $text]);
            $context = stream_context_create([
                'http' => [
                    'ignore_errors' => true,
                    'method' => 'POST',
                    'header' => implode("\r\n", $header),
                    'content' => $data,
                ],
            ]);
            sleep(2);
            file_get_contents($url, false, $context);
        }
    }
}
