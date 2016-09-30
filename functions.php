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
 * Helper function that maps finnish bible books abbreviation
 * with abbreviation used by Youversion
 *
 * @return array with finnish abbr. as key and Youversion abbr. as value
 */
function map_fi_books_abbreviation_to_youversion(){
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
  'Luuk.' => 'lke',
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
