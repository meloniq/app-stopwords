<?php
/**
 * Stop words.
 *
 * @Source https://github.com/digitalmethodsinitiative/dmi-tcat/tree/master/analysis/common/stopwords
 * @Source https://github.com/ekorn/Keywords/tree/master/stopwords
 * @Source https://github.com/fluxbb/langs
 * @Source http://www.ranks.nl/stopwords
 */
class APP_StopWords {


	/**
	 * Initialize class.
	 *
	 * @return void
	 */
	public static function init() {

		// load files with classes
		$languages = self::available_languages();
		foreach ( $languages as $lang_name => $class_name ) {
			if ( ! class_exists( $class_name ) ) {
				require_once( dirname( __FILE__ ) . '/app-stopwords-' . $lang_name . '.php' );
			}
		}

	}


	/**
	 * Returns an array of stop words.
	 *
	 * @param string $language (optional)
	 *
	 * @return array
	 */
	public static function stopwords( $language = 'english' ) {

		$languages = self::available_languages();
		if ( ! $language || ! isset( $languages[ $language ] ) ) {
			return array();
		}

		$class_name = $languages[ $language ];
		$stopwords = call_user_func( array( $class_name, 'stopwords' ) );

		return $stopwords;
	}


	/**
	 * Returns an array of stop words by locale code.
	 *
	 * @param string $locale (optional)
	 *
	 * @return array
	 */
	public static function stopwords_by_locale( $locale = 'en_US' ) {

		$language = self::locale_to_language( $locale );

		return self::stopwords( $language );
	}


	/**
	 * Returns an array of available languages.
	 *
	 * @return array
	 */
	public static function available_languages() {

		$languages = array(
			'czech'      => 'APP_StopWords_Czech',
			'danish'     => 'APP_StopWords_Danish',
			'dutch'      => 'APP_StopWords_Dutch',
			'english'    => 'APP_StopWords_English',
			'finnish'    => 'APP_StopWords_Finnish',
			'french'     => 'APP_StopWords_French',
			'german'     => 'APP_StopWords_German',
			'hungarian'  => 'APP_StopWords_Hungarian',
			'italian'    => 'APP_StopWords_Italian',
			'norwegian'  => 'APP_StopWords_Norwegian',
			'polish'     => 'APP_StopWords_Polish',
			'portuguese' => 'APP_StopWords_Portuguese',
			'romanian'   => 'APP_StopWords_Romanian',
			'russian'    => 'APP_StopWords_Russian',
			'slovak'     => 'APP_StopWords_Slovak',
			'spanish'    => 'APP_StopWords_Spanish',
			'swedish'    => 'APP_StopWords_Swedish',
			'turkish'    => 'APP_StopWords_Turkish',
		);

		return $languages;
	}


	/**
	 * Returns language name based on given locale code.
	 *
	 * @param string $locale (optional)
	 *
	 * @return string|bool Boolean False on failure
	 */
	public static function locale_to_language( $locale = 'en_US' ) {

		$languages = array(
			'czech'      => array( 'cs', 'cs_CZ' ),
			'danish'     => array( 'da', 'da_DK' ),
			'dutch'      => array( 'nl', 'nl_NL', 'nl_NL_formal' ),
			'english'    => array( 'en', 'en_AU', 'en_CA', 'en_GB', 'en_NZ', 'en_US', 'en_ZA' ),
			'finnish'    => array( 'fi', 'fi_FI' ),
			'french'     => array( 'fr', 'fr_BE', 'fr_CA', 'fr_FR' ),
			'german'     => array( 'de', 'de_CH', 'de_DE', 'de_DE_formal' ),
			'hungarian'  => array( 'hu', 'hu_HU' ),
			'italian'    => array( 'it', 'it_IT' ),
			'norwegian'  => array( 'nb', 'nn', 'nb_NO', 'nn_NO' ),
			'polish'     => array( 'pl', 'pl_PL' ),
			'portuguese' => array( 'pt', 'pt_BR', 'pt_PT' ),
			'romanian'   => array( 'ro', 'ro_RO' ),
			'russian'    => array( 'ru', 'ru_RU' ),
			'slovak'     => array( 'sk', 'sk_SK' ),
			'spanish'    => array( 'es', 'es_AR', 'es_CL', 'es_ES', 'es_GT', 'es_MX', 'es_PE', 'es_VE' ),
			'swedish'    => array( 'sv', 'sv_SE' ),
			'turkish'    => array( 'tr', 'tr_TR' ),
		);

		foreach ( $languages as $lang_name => $locales ) {
			if ( in_array( $locale, $locales ) ) {
				return $lang_name;
			}
		}

		return false;
	}


}

