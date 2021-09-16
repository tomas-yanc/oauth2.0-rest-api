<?php 
// POST запрос

// Поддомен нужного аккаунта
$subdomain = 'tlyaonovich';

// Формируем URL для запроса
$link = 'https://' . $subdomain . '.amocrm.ru/api/v4/leads';

// Получаем access_token
$access_token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6Ijg0MTM0NDQ4YjE1Y2UxYjEwYzI1MWE3NWVlODRkNzE2YzIxMTJmNDRlMTNlYzQwZTNmNjdhOTc2ODNlYjE4Y2Q3NjgzODU3YmVjM2RkNGZjIn0.eyJhdWQiOiIwYTBmNDRkMC1lMzNkLTQwZDEtODY5OC1kMDRjMzljOWIyM2MiLCJqdGkiOiI4NDEzNDQ0OGIxNWNlMWIxMGMyNTFhNzVlZTg0ZDcxNmMyMTEyZjQ0ZTEzZWM0MGUzZjY3YTk3NjgzZWIxOGNkNzY4Mzg1N2JlYzNkZDRmYyIsImlhdCI6MTYyMjA5Njk3MiwibmJmIjoxNjIyMDk2OTcyLCJleHAiOjE2MjIxODMzNzIsInN1YiI6IjcwNzM4MzYiLCJhY2NvdW50X2lkIjoyOTQ5NDU2Nywic2NvcGVzIjpbInB1c2hfbm90aWZpY2F0aW9ucyIsImNybSIsIm5vdGlmaWNhdGlvbnMiXX0.r0CgTyN0GW_QSxd1IGKHAftBdzPupwx_Sv3jzRwadx-5Ockz_qg1sX_7BxWBnsYESv7FwPJRhb3GWAysaiXPdV9Y5HVUXaRT3myHVqZB49DHOPs7KSWEjWsuKmUcn7cvOCwtvPK2Dq1vpILzckhfsJcFN5HIfz2tkj5NkNdTvDbvQ8xLRkN_dORtr0_DF47GoRcP3J892ZQfIgsglcjCQIpYVGAZ8Bm94JXsm--EihlPGlFRKc9ZZFQPbG-eye3aEloFHiEa2nJr36G7NeNtX8oILdqnWVScnbERAY9GQXVRNy_NzA8uYMDEsEelMESjXqlZDohWjECnZDlYnwLCzg';

// Читаем json файл
$json_file = file_get_contents( __DIR__ . DIRECTORY_SEPARATOR . 'data.json' );

// Формируем заголовки
$headers = [
	'Authorization: Bearer ' . $access_token,
	'Content-Type:application/json'
];

// Нам необходимо инициировать запрос к серверу
// Воспользуемся библиотекой cURL

// Сохраняем дескриптор сеанса cURL
$curl = curl_init();

// Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, $json_file);
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);

// Инициируем запрос к API и сохраняем ответ в переменную
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
?>