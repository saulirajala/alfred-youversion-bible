# alfred-youversion-bible
Alfred workflow for copy&amp;paste Bible verses from Youversion. Can be used to search from english (NASB and NIV) or from finnish (1992 and 1933/38) bible versions.

##How to install workflow?
Download [`youversion-bible.alfredworkflow`](https://github.com/saulirajala/alfred-youversion-bible/raw/master/youversion-bible.alfredworkflow) from github. Double click the file and Alfred will install it.

##How to change the language?
```
lang
```
Tells you what is the current language. Default is english

```
lang finnish
```
Change the language to finnish

##How to use?
```
yve Joh. 3:16
```
Copy&paste John 3:16

```
yve Joh. 3:16-18
```
Copy&paste John 3:16-18

##How to expand to other language and/or versions?
After you have installed the workflow, open the workflow in Finder. There is a file called `functions.php`. All the changes you need to do will be in this file. There are two things you need to do:

1. Add the YouVersion base-urls to function called `get_urls()`
2. Add new mapping-function to map abbreviations of books of the bible to the abbreviation used by YouVersion. Name your function as `map_yourlanguage_books_abbreviation_to_youversion`

Step 2. is not required, if `map_yourlanguage_books_abbreviation_to_youversion()`-function already exists. You can also add more versions to existing languages by adding more urls to `get_urls()`-function. Bear in mind though: The more versions, the slower workflow.

##Abbreviation mapping
Because YouVersion use different abbreviation than is common in English (and definitely in Finnish), I made a function that automatically maps common English/Finnish abbreviation with the ones used by YouVersion. Here are the complete list of abbreviations:

###Abbreviations in English
```
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
   'Rev.' => 'rev'
```

###Abbreviations in Finnish
```
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
  'Ilm.' => 'rev'
```
