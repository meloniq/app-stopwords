# Stop words

Set of PHP classes that returns language specific stop words.

Stop words are words which are filtered out before or after processing of natural language data. [Read more](https://en.wikipedia.org/wiki/Stop_words)


## Available languages:

* Czech
* Danish
* Dutch
* English
* Finnish
* French
* German
* Hungarian
* Italian
* Norwegian
* Polish
* Portuguese
* Romanian
* Russian
* Slovak
* Spanish
* Swedish
* Turkish


## Usage:

Load set of classes

```php
require_once( dirname( __FILE__ ) . '/stopwords/app-stopwords.php' );
APP_StopWords::init();
```


Get an array of stop words by language name

```php
$stopwords = APP_StopWords::stopwords( 'english' );
```


Get an array of stop words by locale code

```php
$stopwords = APP_StopWords::stopwords_by_locale( 'english' );
```


Example results

```
Array
(
	[0] => и
	[1] => в
	[2] => во
	[3] => не
	[4] => что
	...
	[146] => более
	[147] => всегда
	[148] => конечно
	[149] => всю
	[150] => между
)
````
