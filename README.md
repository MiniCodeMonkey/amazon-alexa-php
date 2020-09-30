# Amazon Alexa PHP Library - An Amazing project

This library provides provides a convient interface for developing Amazon Alexa Skills for your PHP app.

## Usage

Install via composer: `composer require minicodemonkey/amazon-alexa-php`.

### Requests
When Amazon Alexa triggers your skill, a HTTP request will be sent to the URL you specified for your app.

You can parse the `JSON` body of the request like so:
```php
$jsonDataAsArray = $request->json()->all(); // This is how you would retrieve this with Laravel
$alexaRequest = \Alexa\Request\Request::fromData($jsonDataAsArray);
```

You can determine the type of the request with `instanceof`, e.g.:
```php
if ($alexaRequest instanceof IntentRequest) {
	// Handle intent here
}
```

### Responses
You can build several Alexa responses with the `Response` class. You can optionally set cards or a reprompt, too.

Here's a few examples.

#### Simple text response
```php
$response = new \Alexa\Response\Response;
$response->respond('I\'m your response message');
```

#### With reprompt
```php
$response = new \Alexa\Response\Response;
$response->reprompt('What is your favourite color?');
```

#### Cards

For detailled informations on cards check out the following link: https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/providing-home-cards-for-the-amazon-alexa-app#creating-a-home-card-to-display-text-and-an-image

##### SingleCard
```php
$response = new \Alexa\Response\Response;
$response->respond('Cooool. I\'ll lower the temperature a bit for you!')
	->withCard('Temperature decreased by 2 degrees');
```

##### StandardCard with images
You can also show images within your card

Please note some notes on image sizing and hosting: https://developer.amazon.com/public/solutions/alexa/alexa-skills-kit/docs/providing-home-cards-for-the-amazon-alexa-app#image_size

```php
$response = new \Alexa\Response\Response;
$response->respond('Cooool. I\'ll lower the temperature a bit and show you an image!')
	->withImageCardCard('My title', 'My caption text for the image...', 'https://url.to/small-image.jpg', 'https://url.to/large-image.jpg');
```

##### LinkAccountCard
The LinkAccountCard is used for skills with enabled account linking and will show a link to your configured account linking url. As title, text etc. are set automatically there is no possibility to set random text.

```php
$response = new \Alexa\Response\Response;
$response->respond('To link the skill with your account, click the linkAccount shown in your alexa app.')
	->withLinkAccountCard();
```

#### Output the response
To output the response, simply use the `->render()` function, e.g. in Laravel you would create the response like so:
```php
return response()->json($response->render());
```

In vanilla PHP:
```php
header('Content-Type: application/json');
echo json_encode($response->render());
exit;
```

## TODO
* Verify request timestamp integrity automatically
