
# Web Page Scrapper

A PHP application used to scrap words from a web page and output the frequency of the words used. 

## Application Description
The application uses a PHP DOM parser to extract contents from the elements of a HTML page and lists the words present with their frequency.


Tools used:
- WAMP server
- Visual Studio Code
- Simple HTML DOM Parser (https://simplehtmldom.sourceforge.io/)


## Current Features
-HTML paragraph tag (p) scrapping, via URL search or file upload

## Limitations
The application can only extract words within a HTML (p) tag.
The application does not differentiate between singular and plural words and may list them as different words.
e.g the words "century" and "centuries" would be listed as 2 different words in a page.

## Features to be added
-UI styling
-Scrapping words from other HTML tags besides (p).