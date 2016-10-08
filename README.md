# alfred-youversion-bible
Alfred workflow for copy&amp;paste Bible verses from Youversion. Can be used to search from english (NASB and NIV) or from finnish (1992 and 1933/38) bible versions.

#How to change the language?
```
lang
```
Tells you what is the current language. Default is english

```
lang finnish
```
Change the language to finnish

#How to use?
```
yve Joh. 3:16 
```
Copy&paste John 3:16

```
yve Joh. 3:16-18 
```
Copy&paste John 3:16-18

#How to expand to other language and/or versions?
After you have installed the workflow, open the workflow in Finder. There is a file called `functions.php`. All the changes you need to do, will be in this file. There are two things you need to do:

1. Add the YouVersion base-urls to function called `get_urls()`
2. Add new mapping-function to map abbreviations of books of the bible to the abbreviation used by YouVersion. Name your function as `map_yourlanguage_books_abbreviation_to_youversion`

Step 2. is not required, if `map_yourlanguage_books_abbreviation_to_youversion()`-function already exists. You can also add more versions to existing languages by adding more urls to `get_urls()`-function. Bear in mind though, that the more versions, the slower the workflow comes.
