<?php
/**
 * Get verse from url
 */
function get_verse_text($url, $w){

  $response = $w->request($url);
  $verse_text = '';
  if ($response) {
      $dom = new simple_html_dom();
      $dom->load($response);

      $spans = $dom->find('span.content');
      if ($spans) {
          foreach ($spans as $span) {
              if ($span AND ! empty(trim($span->plaintext)) ) {
                $verse_text .= $span->plaintext;
              }
          }

      }
  }

  return $verse_text;
}

/**
 * Helper function that returns the urls from where we should search.
 * Notice: the more urls (versions), the slower the workflow
 *
 * @return array with url of versions
 */
function get_urls($language){
  if($language === 'english'){
    return array('NASB' => 'https://www.bible.com/ur/bible/100/',
                'NIV' => 'https://www.bible.com/ur/bible/111/');
  }
  if($language === 'finnish'){
    return array('1933/1938' => 'https://www.bible.com/ur/bible/365/',
                '1992' => 'https://www.bible.com/ur/bible/330/');
  }
}

/**
 * Helper function that maps finnish bible books abbreviation
 * with abbreviation used by Youversion
 *
 * @return array with finnish abbr. as key and Youversion abbr. as value
 */
function map_finnish_books_abbreviation_to_youversion(){
  $all_books = array(
  '1. Moos.' => 'gen',
  '2. Moos.' => 'exo',
  '3. Moos.' => 'lev',
  '4. Moos.' => 'num',
  '5. Moos.' => 'deu',
  'Joos.' => 'jos',
  'Tuom.' => 'jdg',
  'Ruut' => 'rut',
  '1. Sam.' => '1sa',
  '2. Sam.' => '2sa',
  '1. Kun.' => '1ki',
  '2. Kun.' => '2ki',
  '1. Aik.' => '1ch',
  '2. Aik.' => '2ch',
  'Esra' => 'ezr',
  'Neh.' => 'neh',
  'Est.' => 'est',
  'Job.' => 'job',
  'Ps.' => 'psa',
  'Sananl.' => 'pro',
  'Saarn.' => 'ecc',
  'Laul. l.' => 'sng',
  'Jes.' => 'isa',
  'Jer.' => 'jer',
  'Valit.' => 'lam',
  'Hes.' => 'ezk',
  'Dan.' => 'dan',
  'Hoos.' => 'hos',
  'Joel' => 'jol',
  'Aam.' => 'amo',
  'Ob.' => 'oba',
  'Joona' => 'jon',
  'Miika' => 'mic',
  'Nah.' => 'nam',
  'Hab.' => 'hab',
  'Sef.' => 'zep',
  'Hagg.' => 'hag',
  'Sak.' => 'zec',
  'Mal.' => 'mal',
  'Matt.' => 'mat',
  'Mark.' => 'mrk',
  'Luuk.' => 'luk',
  'Joh.' => 'jhn',
  'Ap.t.' => 'act',
  'Room.' => 'rom',
  '1. Kor.' => '1co',
  '2. Kor.' => '2co',
  'Gal.' => 'gal',
  'Efe.' => 'eph',
  'Fil.' => 'php',
  'Kol.' => 'col',
  '1. Tess.' => '1th',
  '2. Tess.' => '2th',
  '1. Tim.' => '1ti',
  '2. Tim.' => '2ti',
  'Tit.' => 'tit',
  'Filem.' => 'phm',
  'Hepr.' => 'heb',
  'Jaak.' => 'jas',
  '1. Piet.' => '1pe',
  '2. Piet.' => '2pe',
  '1. Joh.' => '1jn',
  '2. Joh.' => '2jn',
  '3. Joh.' => '3jn',
  'Juud.' => 'jud',
  'Ilm.' => 'rev');
  return $all_books;
}

/**
 * Helper function that maps english bible books abbreviation
 * with abbreviation used by Youversion
 *
 * @return array with english abbr. as key and Youversion abbr. as value
 */
function map_english_books_abbreviation_to_youversion(){
  $all_books = array(
   'Gen.' => 'gen',
   'Ex.' => 'exo',
   'Lev.' => 'lev',
   'Num.' => 'num',
   'Deut.' => 'deu',
   'Josh.' => 'jos',
   'Judg.' => 'jdg',
   'Ruth' => 'rut',
   '1 Sam.' => '1sa',
   '2 Sam.' => '2sa',
   '1 Kings' => '1ki',
   '2 Kings' => '2ki',
   '1 Chron.' => '1ch',
   '2 Chron.' => '2ch',
   'Ezra' => 'ezr',
   'Neh.' => 'neh',
   'Est.' => 'est',
   'Job' => 'job',
   'Ps.' => 'psa',
   'Prov.' => 'pro',
   'Eccles.' => 'ecc',
   'Song' => 'sng',
   'Isa.' => 'isa',
   'Jer.' => 'jer',
   'Lam.' => 'lam',
   'Ezek.' => 'ezk',
   'Dan.' => 'dan',
   'Hos.' => 'hos',
   'Joel' => 'jol',
   'Amos' => 'amo',
   'Obad.' => 'oba',
   'Jonah' => 'jon',
   'Mic.' => 'mic',
   'Nah.' => 'nam',
   'Hab.' => 'hab',
   'Zeph.' => 'zep',
   'Hag.' => 'hag',
   'Zech.' => 'zec',
   'Mal.' => 'mal',
   'Matt.' => 'mat',
   'Mark' => 'mrk',
   'Luke' => 'luk',
   'John' => 'jhn',
   'Acts' => 'act',
   'Rom.' => 'rom',
   '1 Cor.' => '1co',
   '2 Cor.' => '2co',
   'Gal.' => 'gal',
   'Eph.' => 'eph',
   'Phil.' => 'php',
   'Col.' => 'col',
   '1 Thess.' => '1th',
   '2 Thess.' => '2th',
   '1 Tim.' => '1ti',
   '2 Tim.' => '2ti',
   'Titus' => 'tit',
   'Philem.' => 'phm',
   'Heb.' => 'heb',
   'James' => 'jas',
   '1 Pet.' => '1pe',
   '2 Pet.' => '2pe',
   '1 John' => '1jn',
   '2 John' => '2jn',
   '3 John' => '3jn',
   'Jude' => 'jud',
   'Rev.' => 'rev');
  return $all_books;
}
