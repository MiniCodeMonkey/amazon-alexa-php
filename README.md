# Amazon Alexa PHP Library

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

### Response
You can build an Alexa response with the `Response` class. You can optionally set a card or a reprompt too.

Here's a few examples.
```php
$response = new \Alexa\Response\Response;
$response->respond('Cooool. I\'ll lower the temperature a bit for you!')
	->withCard('Temperature decreased by 2 degrees');
```

```php
$response = new \Alexa\Response\Response;
$response->respond('What is your favorite color?')
	->reprompt('Please tell me your favorite color');
```

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