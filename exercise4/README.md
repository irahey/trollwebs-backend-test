# Exercise 04

## Command-line tool

Create a command-line tool that implements as much of the following functionality as you can.

### Commands

Given any input, return

* a MD5 hash. ---> YES
* a SHA1 hash. ---> YES

Given a valid date in any format, return

* the unix timestamp. YES
* the date in the format of the second argument. ---> YES? I have a few questions around here
        ---> What is the "second" argument here? I just assumed that the second argument was the default format of Carbon::now();
'
* the time difference in human readable format (eg: Carbon). ---> YES

Given a length as integer, return

* a random string with the integer as length. ---> YES
* a random password with the integer as length. ---> YES? I have a few questions around here as well
        --->I think that the random string and random password means the same thing. 
            So I just assumed that random string is just a random string and a random password is already is hash form

### Requirements

* Name the tool anything you want. --->YES, the name is Appy
* Use any existing open-source packages. ---> YES, Carbon 
* 
### Extra credit

* Use composer to include packages. ---> YES
* Create the tool with TDD.
* Generate a PHP Archive (PHAR) of the tool.
* 

-----------------------
