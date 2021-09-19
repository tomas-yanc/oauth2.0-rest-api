<?php
/** GET запрос */

/** Поддомен нужного аккаунта */
$subdomain = 'tlyaonovich';

/** Формируем URL для запроса */
$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads?limit=3';

$access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjZkMTkwNzNiMjUyNzEzM2MyYTE2OTY4MGM2ODU5YzlhZjhlZWNiZGFmM2QyYjk1MDRiZDQxYjBjMDgzNzZmZmFlNWRiNGZmMGQ1NmE4MDkxIn0.eyJhdWQiOiIwYTBmNDRkMC1lMzNkLTQwZDEtODY5OC1kMDRjMzljOWIyM2MiLCJqdGkiOiI2ZDE5MDczYjI1MjcxMzNjMmExNjk2ODBjNjg1OWM5YWY4ZWVjYmRhZjNkMmI5NTA0YmQ0MWIwYzA4Mzc2ZmZhZTVkYjRmZjBkNTZhODA5MSIsImlhdCI6MTYyMTg2ODI1OSwibmJmIjoxNjIxODY4MjU5LCJleHAiOjE2MjE5NTQ2NTksInN1YiI6IjcwNzM4MzYiLCJhY2NvdW50X2lkIjoyOTQ5NDU2Nywic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.iCKPVWOpG4C8R3rSt_Og7nMjOlVyt2zRigoEbo7bVf_3ozpm2kWqbVwDI3jijfktaiNV4aO6OJV2KgTcJIXLzxVh6pMVmpWID6ihJ9IKFHkWYmiQmQ9FGlS3NmBkQczH8L--1B9YoMZEKEVjrpmCdaNUq_Bkc754Nx5NtqOgj2DzthgqsY2C-7g29fbQuHM7acXTrQREpdw0NsOMe6x43oymvfpWiX6BCMBycVeOZHTL-1dAmEHHTbkI6lc83HRiaIWvt8QrpnMDyZbltsn5HAJdOBnt8UcaUkTaofuffYjwj4XS-6nNJSHya38cjigSDgGAxBSbUzKNPWfFpEzcwA';

/** Формируем заголовки */
$headers = [
	'Authorization: Bearer ' . $access_token
];

/**
 * Нам необходимо инициировать запрос к серверу
 * Воспользуемся библиотекой cURL
 */

/** Сохраняем дескриптор сеанса cURL */
$curl = curl_init();

/** Устанавливаем необходимые опции для сеанса cURL */
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);

/** Инициируем запрос к API и сохраняем ответ в переменную */
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
?>
