<?php
// Запрос на авторизацию и получение токенов

// Поддомен нужного аккаунта
$subdomain = 'tlyaonovich';

// Формируем URL для запроса
$link = 'https://' . $subdomain . '.amocrm.ru/oauth2/access_token';

// Соберем данные для запроса
$data = [
	'client_id' => '0a0f44d0-e33d-40d1-8698-d04c39c9b23c',
	'client_secret' => 'RpS4t6kAkhWQrAvBHfFVVEoHDT8dT8Gb0AVx5I2k3NF6Cv80liglFdYlMIAQovyE',
	'grant_type' => 'authorization_code',
	'code' => 'def50200667704f7f0f5bc1519694d950d540a9368aa99d1c4c89e1ce6d98c08599fc16f2b2aa8384f99be547dbb842d7e6877b10a2d2fa9ad0fe6d3b582dd70b7c9047de66188bac169d7229769c8a36de6ac30c9c98ccb50a44a2aa2540b391e0fec68687a3e1a7bde9963237b50a3a8b02043316b30f2cacf42f2cf49abadd58374072fdffe6ddb4d32923bf5a10d672742dd56311be5d427a22a9612f31165750d3d683a5896f2f7d503c2f0b5f676c16e7555be3834effa19a0589e71e8dea03c601377a9e3895da03adf716ccb1c664e763185b12e16354fed2e7f4a6e3eb0a208193f6046d80e556aad42569d6cf4851f9212538280691e586b0187142580c34d4d8072a00d418c902557a62d92431fa151da3ba3acf4fa828d82e152a8a88ca45758af635e0db5bf7f29be6a870c3104bd7a29d23250848244baa2de763de987ee49e31f6f8a6b52ae47316cb8000c97da1d1c00a1fe49e58f6693e60fb0be205b72314fd17f2f9c4cfdc148fca48d5727fe6d6b5d2a58b63618dfcadee1cdf35dc271e270fe79173a4fd815ea78c45394ac9579f472c3a8f6e2275af24a525e690280f80fe8879b01a63b2ecb11039f35e7aa490bafcdc8d9a6f7ba2b8e05',
	'redirect_uri' => 'https://example.com/',
];

// Нам необходимо инициировать запрос к серверу
// Воспользуемся библиотекой cURL

// Сохраняем дескриптор сеанса cURL
$curl = curl_init();

// Устанавливаем необходимые опции для сеанса cURL
curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl,CURLOPT_USERAGENT,'amoCRM-oAuth-client/1.0');
curl_setopt($curl,CURLOPT_URL, $link);
curl_setopt($curl,CURLOPT_HTTPHEADER,['Content-Type:application/json']);
curl_setopt($curl,CURLOPT_HEADER, false);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, 1);
curl_setopt($curl,CURLOPT_SSL_VERIFYHOST, 2);

// Инициируем запрос к API и сохраняем ответ в переменную
$out = curl_exec($curl);
$code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);
?>