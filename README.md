# PHP Coding Challenge
## Think you're a PHP wizard? Prove it! We're hiring developers who can not only write clean code but also solve complex problems.<br/><br/>
###

Develop a PHP command-line application that processes the [sample-logs.txt](https://github.com/pdsc-ph/php-coding-challenge/blob/main/sample-log.txt) file above. The program should extract and output specific data from the file according to the following specifications:

```
<ID>
Position: 1
Length: 12

<UserID>
Position: 13
Length: 6

<BytesTX>
Position: 19
Length: 8

<BytesRX>
Position: 27
Length: 8

<DateTime>
Position: 35
Length: 17
```

Conditions:
* Whitespaces should be removed from the field values
* BytesTX and BytesRX fields must be formatted with commas as thousand separators
* DateTime field should be in the following format: ``Tue, 04 March 2025 00:00:00``

The program must create an output.txt file and contain the following details (see [sample-output.txt](https://github.com/pdsc-ph/php-coding-challenge/blob/main/sample-output.txt) file):
1. A pipe delimited version of the log in the following format: ``<UserID>|<BytesTX|<BytesRX|<DateTime>|<ID>``
2. A list of IDs sorted in ascending order. Review the sorting properly. Below is an example of an improper sorting:
```
.
.
1000VM-B28F
1000WQ-H99P
1000XY-K42Z
100AS-V5X
100BT-T92V
.
.
```
4. A list of unique UserIDs sorted in ascending order with a result id enclosed in [ ] (Example: ``[1] <UserID>``)

##
## To submit your application, please send your program, the generated output file, and your Curriculum Vitae (CV) or Resume to <ins>**careers.it@pds.dbello.com**</ins>. Kindly provide your mobile phone number within the email so that we may contact you.<br/><br/>

Qualifications
* Bachelor's degree in computer science, Information Technology, or a related field (or equivalent experience).
* 3+ years of experience in PHP development.
* Filipino citizen residing the in the Philippines

Required Skills:
* Strong proficiency in PHP and backend programming.
* Solid understanding of MySQL databases.
* Familiarity with version control systems (Git).
* Excellent problem-solving and debugging skills.
* Strong communication and teamwork skills.
* Familiarity with front-end technologies is a plus (HTML, CSS, JavaScript and front-end technologies such jQuery, Bootstrap, and other libraries).
