<?php
/** PATCH запрос */

/** Поддомен нужного аккаунта */
$subdomain = 'tlyaonovich';

/** Формируем URL для запроса */
$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads/4196775';

$access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImI0NTI2NjcwNDdjMzY3OWFmNTNlODY3MDkwMzE4YTYyZmJjN2VmOWM4ZjgxMGJkMDg2ZmJhYmFiMmMwZjkzOGI0MDg1N2UwYjZmM2FkOWM2In0.eyJhdWQiOiIwYTBmNDRkMC1lMzNkLTQwZDEtODY5OC1kMDRjMzljOWIyM2MiLCJqdGkiOiJiNDUyNjY3MDQ3YzM2NzlhZjUzZTg2NzA5MDMxOGE2MmZiYzdlZjljOGY4MTBiZDA4NmZiYWJhYjJjMGY5MzhiNDA4NTdlMGI2ZjNhZDljNiIsImlhdCI6MTYyMTk1NjI4MCwibmJmIjoxNjIxOTU2MjgwLCJleHAiOjE2MjIwNDI2ODAsInN1YiI6IjcwNzM4MzYiLCJhY2NvdW50X2lkIjoyOTQ5NDU2Nywic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.UR7poR3FbzFLrNeYF1M13v67fponpjEWbpu0PARPCdKk03NxYuqHRwya9LtgzLHsVCSygDgU688DlXwAm0t3iyu3DJy53_3Zc-pSgH923XVmP33DyPzqOzScycqtU03YLTIN83FVG7jr13Hkw4apcI_-Xw0EvPzFbc3MPOmsv_BQDaupsQnaYxA2LbXM9Y7VJ8JO850Gljx9uH7BSTN3-aqqubGnmfWSdcD3pNJdP2IXB3i5g0k2tZAno0fTUKPTTLDD9EtZ74Hv9i5Spo5pX4c-FXtFQlx3JnTloMi89MWgEuvu7lalr1TZuWNiUo35I850bD-qbeJZbgETUmOnCQ';

/** Читаем json файл */
$json_file = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'data.json' );

/** Формируем заголовки */
$headers = [
	'Authorization: Bearer ' . $access_token,
	'Content-Type:application/json-patch+json',
	'X-HTTP-Method-Override: PATCH'
];

/**
 * Нам необходимо инициировать запрос к серверу
 * Воспользуемся библиотекой cURL
 */

/** Сохраняем дескриптор сеанса cURL */
$curl = curl_init($link);

/** Устанавливаем необходимые опции для сеанса cURL */
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_FOLLOWLOCATION, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl,CURLOPT_HTTPGET, false);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_PATCH, true);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'PATCH');
curl_setopt($curl,CURLOPT_POSTFIELDS, $json_file);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, false);

/** Инициируем запрос к API и сохраняем ответ в переменную */
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
?>
