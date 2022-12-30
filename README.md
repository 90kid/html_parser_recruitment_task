# Requirements
1. composer
2. php 8.1.x

# Description
Recruitment task. HTML parser.

# Installation guide
1. `git clone git@github.com:90kid/html_parser_recruitment_task.git`
2. `cd html_parser_recruitment_task`
3. `composer install`

# How it works?
In CLI run `php src/parseHtmlToCsv.php file_path.html`. You can run it with default argument.
`php src/parseHtmlToCsv.php` then it takes `example.html` as default file. Output will be in `output.csv`.

# Final thoughts
1. Shouldn't store money as float. PHP Money is a better way.
2. Not unique id elements (location_address).
3. Phone number `<a>` tag has different text value and different `href` attribute value. ```<a href="tel:440-878-3000" target="_blank" style="color: black; display: inline-block;" id="location_phone">999-111-2233</a>```
4. Missing `head` and `body` in HTML file.
5. Store phone number as float isn't good idea. 