# Web Page Scrapper

A PHP application used to scrap words from a web page and output the frequency of the words used. 

## Application Description
The application uses a PHP DOM parser to extract contents from the paragraph elements of a HTML page and lists the words present with their frequency. 
The application also enables the user to find english or non-english words present in the HTML page. However, this function is limited to web pages containing 100 words or less.

Tools / Toolkits used:
- WAMP server
- Visual Studio Code
- Simple HTML DOM Parser (https://simplehtmldom.sourceforge.io/)
- Detect Language API (https://detectlanguage.com/)
- Bootstrap

## How to Run
- Install a web development enviromnent.(WAMP or XAMP)
- Download the application folder as zip and extract.
- Drag the application folder to the server directory (www in WAMP/ htdocs in XAMP) 
- Start the server and input the URL on a browser: 
  http://localhost/Webpage_Word_Frequency_Counter/index.php
- Query the application
- Web pages for testing can be found in Test Web Pages folder: Webpage_Word_Frequency_Counter\Test Web pages

## Current Features
- HTML paragraph tag (p) scrapping, via URL search or file upload
- Detect language of words on the web page (English/ Non-English).

## Limitations
- The application can only extract words within a HTML (p) tag.
- The application does not differentiate between singular and plural words and may list them as different words.
  e.g the words "century" and "centuries" would be listed as 2 different words in a page.
- The detect language function(detect english or non-english words extracted from a web page), is limited to detecting 100 words per page.
  The API limits the application to 1000 requests per day(1 word = 1 request), therefore limiting the requests per page to 100 would enable a user to use multiple pages before reaching the API limit.

## Features to be added
- Scrapping words from other HTML tags besides paragraph tag (p).