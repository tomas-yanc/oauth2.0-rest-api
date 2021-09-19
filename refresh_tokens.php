<?php
/** Получение новой пары токенов */

/** Поддомен нужного аккаунта */
$subdomain = 'tlyaonovich';

/** Формируем URL для запроса */
$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token';

/** Соберем данные для запроса. Используем refresh_token */
$data = [
	'client_id' => '0a0f44d0-e33d-40d1-8698-d04c39c9b23c',
	'client_secret' => 'RpS4t6kAkhWQrAvBHfFVVEoHDT8dT8Gb0AVx5I2k3NF6Cv80liglFdYlMIAQovyE',
	'grant_type' => 'refresh_token',
	'refresh_token' => 'def502001bf9d258f712593c999cfb6563d8f3e2a21738694d59b19b7a48e25d9f7f01547b66a983a75d817adcc2d74459b613e75275a7c44b9a931b63d621f01ace051affca241c16edec77f0272c192e00ab598396c8991ae0ded32109ee46550350f14358b82c74346f0cba8d5fdf61912bd74ed2599d3e84596ac267b1e93a35680631288076e3e8decef84552599de80a28c21f26190b4ad341ca6fdab40157e5eba01345db3fc56f05f78281b03d7718c92939a1dd6cf10fbabc820bc5cd415a625e7374b6571a8e61a3bd99088e6de208e66782288fac1567600e8e831773302caac6d23ad0d276f9723afcf35b09402601065762dc2b742de827f2d922925e8350d8535779c82d54c99f365d05df897a27cb4a59329852992a1d0d1f384f4d752a9c0a6398280d742ab5e67605fcec15f841f1af435ef1c8af5489a4d12be1ba35ccfeb1ed75ac14e0abfce04f86efdcbe4ef7545d602fe6ac74609ee927c29cd546cfb84807ce3cf029019b55ba5c484347caf0ace7f179c34594d7bc3fa137dac8055e203d042e55bc983c9afcdffcf4452374e57feb267e8e10ddd37ffc0306deb7f7c33fbec42df11ae15af520eca534e95b9767652e9657d54412d2966f04d370a7e0d6',
	'redirect_uri' => 'https://example.com/',
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
curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);

/** Инициируем запрос к API и сохраняем ответ в переменную */
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

/** Данные о токенах */
$response = json_decode($out, true);
$access_token = $response['access_token']; //Access токен
$refresh_token = $response['refresh_token']; //Refresh токен
$token_type = $response['token_type']; //Тип токена
$expires_in = $response['expires_in']; //Через сколько действие токена истекает
?>
